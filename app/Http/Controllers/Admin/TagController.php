<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateTagRequest;
use App\Http\Requests\Admin\EditTagRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::paginate(20);

        return view('admin.tags.index', [
            'tags' => $tags,
        ]);
    }

    public function create(): View
    {
        return view('admin.tags.create');
    }

    public function store(CreateTagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());

        return redirect()->route('admin.tags.index')
            ->with('status', __('Tag created successfully.'));
    }

    public function edit(Tag $tag): View
    {
        return view('admin.tags.edit', [
            'tag' => $tag,
        ]);
    }

    public function update(EditTagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->validated());

        return redirect()->route('admin.tags.index')
            ->with('status', __('Tag updated successfully.'));
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        foreach ($tag->posts as $post) {
            $post->tags()->detach();
        }

        $tag->delete();

        return redirect()->route('admin.tags.index')
            ->with('status', __('Tag deleted successfully.'));
    }
}
