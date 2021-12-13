<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPostControllerRequest;
use App\Models\Category;
use App\Models\Post;

class AdminPostController extends Controller
{
	public function index()
	{
		return view('admin.posts.index', [
			'posts' => Post::paginate(50),
		]);
	}

	public function create()
	{
		return view('admin.posts.create', ['categories' => Category::all()]);
	}

	public function store(AdminPostControllerRequest $request)
	{
		$attributes = $request->validated();

		$attributes['user_id'] = auth()->id();
		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

		Post::create($attributes);

		return redirect(route('home'));
	}

	public function edit(Post $post)
	{
		return view('admin.posts.edit', [
			'post'       => $post,
			'categories' => Category::all(),
		]);
	}

	public function update(Post $post, AdminPostControllerRequest $request)
	{
		$attributes = $request->validated();

		if (isset($attributes['thumbnail']))
		{
			$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}

		$post->update($attributes);

		return back()->with('success', 'Post Updated!');
	}

	public function destroy(Post $post)
	{
		$post->delete();

		return back()->with('success', 'Post Deleted!');
	}
}
