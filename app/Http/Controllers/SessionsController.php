<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.create');
	}

	public function store(Request $request)
	{
		// validate the request
		$attributes = $request->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);

		// based on the provided credentials
		if (!auth()->attempt($attributes))
		{
			// auth failed
			throw ValidationException::withMessages([
				'email' => 'Your provided credentials could not be verified.',
			]);
		}

		session()->regenerate();

		// redirect with a success flash message
		return redirect(route('home'))->with('success', 'Welcome back!');
	}

	public function destroy()
	{
		auth()->logout();

		return redirect(route('home'))->with('success', 'Goodbye!');
	}
}
