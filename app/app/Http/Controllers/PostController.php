<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa Auth

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar todos los posts del usuario autenticado
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get(); // Usamos Auth::id()
        return view('posts.index', compact('posts'));
    }

    // Mostrar formulario de creación de post
    public function create()
    {
        return view('posts.create');
    }

    // Almacenar el post en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // Usamos Auth::id()
        ]);

        return redirect()->route('posts.index');
    }

    // Mostrar formulario de edición de post
    public function edit(Post $post)
    {
        if ($post->user_id != Auth::id()) { // Usamos Auth::id()
            return redirect()->route('posts.index');
        }

        return view('posts.edit', compact('post'));
    }

    // Actualizar el post
    public function update(Request $request, Post $post)
    {
        if ($post->user_id != Auth::id()) { // Usamos Auth::id()
            return redirect()->route('posts.index');
        }

        $post->update($request->only('title', 'content'));

        return redirect()->route('posts.index');
    }

    // Eliminar el post
    public function destroy(Post $post)
    {
        if ($post->user_id != Auth::id()) { // Usamos Auth::id()
            return redirect()->route('posts.index');
        }

        $post->delete();
        return redirect()->route('posts.index');
    }
}
