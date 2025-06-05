<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // READ - Dapat diakses siapa saja
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // CREATE - Hanya user yang login
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255'
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
    }

    // UPDATE - Hanya user yang login
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255'
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post berhasil diupdate!');
    }

    // DELETE - Hanya user yang login
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }
}