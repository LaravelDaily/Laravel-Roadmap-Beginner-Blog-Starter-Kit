<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('tags', 'category')->latest()->simplePaginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($id): View
    {
        $post = Post::with('tags', 'user')->findOrFail($id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
