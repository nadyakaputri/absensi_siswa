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

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->level === 'guru') {
                return redirect()->route('dashboard-guru');
            } elseif ($user->level === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->level === 'siswa') {
                return redirect()->route('dashboard-siswa');
            }
        }

        return back()->with('loginError', 'Login failed, please try again');
    }

    public function logout (Request $request):RedirectResponse 
        
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}