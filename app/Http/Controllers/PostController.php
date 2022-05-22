<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::where('published', 1)->latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(5)->withQueryString(),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }

    public function show(Post $post)
    {
        abort_if($post->published != 1, 404);

        return view('posts.show', [
            'post' => $post
        ]);
    }
}
