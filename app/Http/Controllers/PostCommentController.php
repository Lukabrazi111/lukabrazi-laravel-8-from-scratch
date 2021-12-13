<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentControllerRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
	public function store(Post $post, PostCommentControllerRequest $request)
	{
		$attributes = $request->validated();

		$post->comments()->create([
			'user_id' => $request->user()->id,
			'body'    => $attributes['body'],
		]);

		return back();
	}
}
