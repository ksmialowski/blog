<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:64',
            'username' => 'required|min:7|max:32|unique:users,username',
            'email' => 'required|email|max:64|unique:users,email',
            'password' => 'required|min:7|max:64',
        ]);

        auth()->login(User::create($attributes));

        return redirect('/')->with('success', 'Twoje konto zostało stworzone.');
    }
}
