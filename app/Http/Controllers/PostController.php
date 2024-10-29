<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Faker\Factory as Faker;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

        return Inertia::render('Dashboard', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Post/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $faker = Faker::create();

        $validatedRequest = $request->validate([
            'title'=> 'required',
            'content'=> 'required',
        ]);

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title'=> $validatedRequest['title'],
            'content'=> $validatedRequest['content'],
            'image' => 'https://picsum.photos/seed/' . $faker->word() . '/360/240'
        ]);

        return Redirect::route('posts.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user');

        return Inertia::render('Post/Show', [
            'post'=> $post,
            'isFollowing' => $post->user->isFollowedBy(auth()->user())
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->load('user');

        return Inertia::render('Post/Edit', [
            'post'=> $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedRequest = $request->validate([
            'title'=> 'required',
            'content'=> 'required',
        ]);

        $post->update([
            'title' => $validatedRequest['title'],
            'content'=> $validatedRequest['content'],
        ]);

        return Redirect::route('posts.edit', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return Redirect::route('dashboard');
    }
}
