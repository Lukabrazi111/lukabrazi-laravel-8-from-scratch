<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterControllerRequest;
use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
	public function __invoke(Newsletter $newsletter, NewsletterControllerRequest $request)
	{
		$attributes = $request->validated();

		try
		{
			$newsletter->subscribe($attributes('email'));
		}
		catch (Exception $e)
		{
			throw ValidationException::withMessages([
				'email' => 'This email could not be added to our newsletter list.',
			]);
		}

		return redirect(route('home'))->with('success', 'You are now signed up for our newsletter');
	}
}
