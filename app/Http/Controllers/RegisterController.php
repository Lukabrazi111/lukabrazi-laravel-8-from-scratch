<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller {
    public function create() {
        return view('register.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|max:255|min:7',
        ]);

        $user = User::create($attributes);

        // log the user in
        auth()->login($user); // <-- this = Auth::login($user)


        session()->flash('success', 'Your account has been created!');

        return redirect('/');
    }
}
