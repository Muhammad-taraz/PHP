<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('home');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->hasRole('admin')) {
                return redirect()->route('posts.create');
            } elseif ($user->hasRole('editor')) {
                return redirect()->route('posts.create');
            } else {
                return redirect()->route('posts.index');
            }
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // return redirect('/');
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}