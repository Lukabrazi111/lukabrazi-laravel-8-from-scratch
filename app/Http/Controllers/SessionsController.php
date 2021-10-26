<?php

namespace App\Http\Controllers;

class SessionsController extends Controller {
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // based on the provided credentials
        if (auth()->attempt($attributes)) {
            session()->regenerate();

            // redirect with a success flash message
            return redirect('/')->with('success', 'Welcome back!');
        }

        // auth failed
        return back()
            ->withInput()
            ->withErrors(['email' => ' You provided credentials could not be verified.']);
    }

    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
