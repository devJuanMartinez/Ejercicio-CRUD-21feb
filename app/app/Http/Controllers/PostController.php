<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        if ($post->user_id != Auth::id()) { 
            return redirect()->route('posts.index');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id != Auth::id()) { 
            return redirect()->route('posts.index');
        }

        $post->update($request->only('title', 'content'));

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id != Auth::id()) { 
            return redirect()->route('posts.index');
        }

        $post->delete();
        return redirect()->route('posts.index');
    }
}
