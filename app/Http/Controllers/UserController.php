<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\userRegMail;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $role = $user->role;

            if($role == 1) {
                return redirect()->intended('/')
                             ->with('success', 'Login successful!');
            } else if($role == 2) {
                return redirect()->intended('/user')
                             ->with('success', 'Login successful!');
            }

        } else {
            return redirect()->back()
                             ->withInput($request->only('email'))
                             ->with('error', 'Invalid email or password.');

        }
    }

    public function register(Request $request){
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
        // Return error message
        return response()->json(['error' => 'User creation failed!'], 500);
    }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function getalluser(Request $request){

        $users = User::where('email', '!=', 'admin@example.com')->get();
        return view('Listuser', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => 'User deleted successfully']);
    }
}
