<?php

namespace App\Http\Controllers\Reglog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $r)
    {
        $credentials = $r->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $r->session()->regenerate();

            return redirect()->intended(route('schedule.index'));
        }

        return back();
    }

    public function logout(Request $r)
    {
        Auth::logout();

        $r->session()->invalidate();

        $r->session()->regenerateToken();

        return redirect()->route('login');
    }
}
