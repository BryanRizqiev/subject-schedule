<?php

namespace App\Http\Controllers\Reglog;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $r)
    {
        $validatedData = $r->validate([
            'classId'=> ['required', 'numeric'], 
            'name' => ['required', 'min:6'], 
            'username' => ['required', 'unique:users,username'], 
            'password' => ['required'], 
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return response()->json([
            'succes' => true,
            'data' => $validatedData,
        ], 201);
    }
}
