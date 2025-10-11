<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\userRegMail;
use App\Mail\OtpMail;
use App\Models\Goal;
use App\Models\Task;
use App\Models\Otp;
use Carbon\Carbon;



class UserController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            $user = Auth::user();
            $role = $user->role;

            if ($role == 1) {
                return redirect()->intended('/')
                    ->with('success', 'Login successful!');
            } else if ($role == 2) {
                return redirect()->intended('/user')
                    ->with('success', 'Login successful!');
            }

        } else {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Invalid email or password.']);
        }
    }

    public function register(Request $request)
    {
        // dd($request->all());

        // Validation rules
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'selectrole' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Try to create the user
        try {
            $user = User::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'Username' => $request->username,
                'email' => $request->email,
                'role' => $request->selectrole,
                'password' => Hash::make($request->password),
            ]);

            $data = [
                'password' => $request->password
            ];

            Mail::to($request->email)
                ->send(new userRegMail($data));

            return response()->json(['success' => 'User created successfully!', 'user' => $user], 201);
        } catch (\Exception $e) {
            // Return specific error message for debugging
            return response()->json([
                'error' => 'User creation failed!',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function getalluser(Request $request)
    {

        $users = User::where('email', '!=', 'admin@example.com')->get();
        return view('Listuser', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => 'User deleted successfully']);
    }

    public function dashboardDataload(Request $request)
    {
        $goalCount = Goal::count();
        $taskCount = Task::count();
        $now = now();
        $formattedTime = Carbon::parse($now)->format('g:i A');

        $mytasks = Task::where('user_id', Auth::user()->id)->get();
        $mytaskcount = $mytasks->count();


        return view('user.Dashboard', compact('goalCount', 'taskCount', 'formattedTime', 'mytaskcount'));
    }

    // Send OTP for password reset
    public function sendOtp(Request $request)
    {
        // Validate email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Email not found in our system.'
            ], 404);
        }

        try {
            // Find user by email
            $user = User::where('email', $request->email)->first();

            // Generate 6-digit OTP
            $otpCode = sprintf("%06d", mt_rand(1, 999999));

            // Delete any existing OTPs for this user
            Otp::where('user_id', $user->id)->delete();

            // Create new OTP record (expires in 10 minutes)
            Otp::create([
                'user_id' => $user->id,
                'email' => $request->email,
                'otp' => $otpCode,
                'expires_at' => Carbon::now()->addMinutes(10),
                'is_used' => false
            ]);

            // Send OTP via email
            $data = [
                'otp' => $otpCode,
                'name' => $user->fname . ' ' . $user->lname
            ];

            Mail::to($request->email)->send(new OtpMail($data));

            return response()->json([
                'success' => true,
                'message' => 'OTP sent to your email successfully!',
                'otp' => $otpCode // Remove this in production
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to send OTP',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Verify OTP
    public function verifyOtp(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|size:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Find user
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return redirect()->back()
                    ->with('error', 'User not found.')
                    ->withInput();
            }

            // Find OTP record
            $otpRecord = Otp::where('user_id', $user->id)
                ->where('email', $request->email)
                ->where('otp', $request->otp)
                ->where('is_used', false)
                ->where('expires_at', '>', Carbon::now())
                ->first();

            if (!$otpRecord) {
                return redirect()->back()
                    ->with('error', 'Invalid or expired OTP. Please try again.')
                    ->withInput();
            }

            // Mark OTP as used
            $otpRecord->update(['is_used' => true]);

            // Redirect to reset password page with email in session
            return redirect('/reset-password')
                ->with('email', $request->email)
                ->with('success', 'OTP verified successfully! Please set your new password.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Verification failed: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Update password after OTP verification
    public function updatePassword(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Check if there's a verified OTP for this email
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return redirect('/login')
                    ->with('error', 'User not found.');
            }

            // Verify that user has a used OTP (means they verified)
            $verifiedOtp = Otp::where('user_id', $user->id)
                ->where('email', $request->email)
                ->where('is_used', true)
                ->where('expires_at', '>', Carbon::now()->subMinutes(15)) // Valid within 15 mins
                ->latest()
                ->first();

            if (!$verifiedOtp) {
                return redirect('/forgot-password')
                    ->with('error', 'Session expired. Please request a new OTP.');
            }

            // Update password
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            // Delete all OTPs for this user
            Otp::where('user_id', $user->id)->delete();

            return redirect('/login')
                ->with('success', 'Password reset successfully! Please login with your new password.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to reset password: ' . $e->getMessage())
                ->withInput();
        }
    }
}
