<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    public function userPosts()
    {
        $userPosts = Post::where('user_id', Auth::id())->get();
        return view('posts.userposts', compact('userPosts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.userposts');
    }

    public function edit(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.userposts');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('posts.userposts');
    }
}
