<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/')
                             ->with('success', 'Login successful!');
        } else {
            return redirect()->back()
                             ->withInput($request->only('email'))
                             ->with('error', 'Invalid email or password.');

        }
    }
}
