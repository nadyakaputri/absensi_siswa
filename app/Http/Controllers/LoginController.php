<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function authenticate(Request $request):RedirectResponse
    {
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }
        return back()->with('loginError', 'Login failed, please try again');

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);

     
    }

    public function logout (Request $request):RedirectResponse 
        
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}