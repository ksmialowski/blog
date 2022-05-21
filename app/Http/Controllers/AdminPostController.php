<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::orderBy('id', 'desc')->paginate(8),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'image' => request()->file('image')->store('images'),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/admin/posts')->with('success','Post dodany');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['image'] ?? false) {
            $attributes['image'] = request()->file('image')->store('images');
        }

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post zaktualizowany!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post usunięty!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'image' => $post->exists ? ['image'] : ['image'],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'published' => ['boolean','required'],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
