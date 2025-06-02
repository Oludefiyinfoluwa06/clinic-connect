<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginPage() {
        return view('app.pages.auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if (!$admin) {
            return back()->withErrors([
                'email' => 'The email does not match an admin account',
            ]);
        }

        if (!Hash::check($credentials['password'], $admin->password)) {
            return back()->withErrors([
                'password' => 'The password provided is incorrect',
            ]);
        }

        Auth::login($admin);
        $request->session()->regenerate();

        return redirect()
            ->intended(route('dashboard'))
            ->with('message', 'Welcome back, '.$admin->name.'!');
    }

    public function register(Request $request) {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $hashed_password = Hash::make($credentials['password']);

        $admin = Admin::create([
            'name' => 'Super Admin',
            'email' => $credentials['email'],
            'password' => $hashed_password,
        ]);

        return $admin;
    }
}
