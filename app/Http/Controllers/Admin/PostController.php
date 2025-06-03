<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Requests\Admin\EditPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('category')->paginate(20);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories,
        ]);
    }

    public function store(CreatePostRequest $request): RedirectResponse
    {
        $tags = explode(',', $request->input('tags'));

        if ($request->has('image')) {
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }

        $post = auth()->user()->posts()->create([
            'title' => $request->string('title'),
            'image' => $filename ?? null,
            'post' => $request->string('post'),
            'category_id' => $request->integer('category'),
        ]);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
        }

        return redirect()->route('admin.posts.index')
            ->with('status', __('Post created successfully.'));
    }

    public function edit(Post $post): View
    {
        $categories = Category::all();
        $tags = $post->tags->implode('name', ', ');

        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => $tags,
            'categories' => $categories,
        ]);
    }

    public function update(EditPostRequest $request, Post $post): RedirectResponse
    {
        $tags = explode(',', $request->input('tags'));

        if ($request->has('image')) {
            Storage::delete('public/uploads/'.$post->image);

            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }

        $post->update([
            'title' => $request->string('title'),
            'image' => $filename ?? $post->image,
            'post' => $request->string('post'),
            'category_id' => $request->integer('category'),
        ]);

        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $post->tags()->sync($newTags);

        return redirect()->route('admin.posts.index')
            ->with('status', __('Post updated successfully.'));
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->image) {
            // We should not forget to delete the image from the storage
            Storage::delete('public/uploads/'.$post->image);
        }

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('status', __('Post deleted successfully.'));
    }
}
