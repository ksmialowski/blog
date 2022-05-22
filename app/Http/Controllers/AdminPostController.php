<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(8),
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

        return redirect('/admin/posts')->with('success', 'Post dodany');
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
            $this->deleteImage($post->image);
            $attributes['image'] = request()->file('image')->store('images');
        }

        if ($attributes['thumbnail'] ?? false) {
            $this->deleteImage($post->thumbnail);
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post zaktualizowany!');
    }

    public function destroy(Post $post)
    {
        $this->deleteImage($post->image);
        $this->deleteImage($post->thumbnail);
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
            'published' => ['boolean', 'required'],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }

    public function deleteImage($image)
    {
        if (Storage::exists($image)) {
            Storage::delete($image);
        }
    }
}
