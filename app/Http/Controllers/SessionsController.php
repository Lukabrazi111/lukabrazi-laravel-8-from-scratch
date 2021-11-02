<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.create');
	}

	public function store()
	{
		// validate the request
		$attributes = request()->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);

		// based on the provided credentials
		if (!auth()->attempt($attributes))
		{
			// auth failed
			throw \Illuminate\Validation\ValidationException::withMessages([
				'email' => 'Your provided credentials could not be verified.',
			]);
		}

		session()->regenerate();

		// redirect with a success flash message
		return redirect('/')->with('success', 'Welcome back!');
	}

	public function destroy()
	{
		auth()->logout();

		return redirect('/')->with('success', 'Goodbye!');
	}
}
