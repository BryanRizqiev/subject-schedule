<?php

namespace App\Http\Controllers\Reglog;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $r)
    {
        $validatedData = $r->validate([
            'classId'=> ['required'], 
            'name' => ['required'], 
            'username' => ['required', 'unique:users,username'], 
            'password' => ['required'], 
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login');
    }
}
