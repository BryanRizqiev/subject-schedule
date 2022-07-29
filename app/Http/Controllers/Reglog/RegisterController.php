<?php

namespace App\Http\Controllers\Reglog;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $r)
    {
        // return $r->ngentod;

        $validatedData = $r->validate([
            'classId'=> ['required'], 
            'name' => ['required'], 
            'username' => ['required', 'unique:users,username'], 
            'password' => ['required'], 
        ]);

        // dd($validatedData['class_id']);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login');
    }
}
