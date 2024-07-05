<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $credentials = $request->only('login', 'password');
        $user = User::where('email', $credentials['login'])->orWhere('phone', $credentials['login'])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
        $credentials['email'] = $user->email;
        unset($credentials['login']);
        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors('Invalid credentials');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.form');
    }
}
