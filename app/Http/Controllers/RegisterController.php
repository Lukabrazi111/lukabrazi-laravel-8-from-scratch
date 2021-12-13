<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterControllerRequest;
use App\Models\User;

class RegisterController extends Controller
{
	public function create()
	{
		return view('register.create');
	}

	public function store(RegisterControllerRequest $request)
	{
		$attributes = $request->validated();

		$user = User::create($attributes);

		auth()->login($user);

		session()->flash('success', 'Your account has been created!');

		return redirect(route('home'));
	}
}
