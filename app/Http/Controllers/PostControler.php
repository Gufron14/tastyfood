<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostControler extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('admin.resources.post.list', compact('posts'));
    }

    public function create()
    {
        return view('admin.resources.post.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        //upload image
        $thumbnail = $request->file('thumbnail');
        $thumbnail_extension = $thumbnail->extension();
        $thumbnail_name = date('ymdhis') . '.' . $thumbnail_extension;
        $thumbnail->move(public_path('thumbnail'), $thumbnail_name);

        //create post
        Post::create([
            'thumbnail' => $thumbnail_name,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        //redirect to index
        return redirect()
            ->back()
            ->with(['success' => 'Post Saved.']);
    }

    public function edit(Post $post)
    {
        $posts = Post::find($post->id);

        return view('admin.resources.post.edit', compact('posts'));
    }

    public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        //check if image is uploaded
        if ($request->hasFile('thumbnail')) {

            //upload new image
            $thumbnail = $request->file('thumbnail');
            $thumbnail_extension = $thumbnail->extension();
            $thumbnail_name = date('ymdhis') . '.' . $thumbnail_extension;
            $thumbnail->move(public_path('thumbnail'), $thumbnail_name);

            Storage::delete(public_path('thumbnail' . $post->id));

            //update post with new image
            $post->update([
                'thumbnail' => $thumbnail_name,
                'title' => $request->title,
                'content' => $request->content,
            ]);
        } else {
            //update post without image
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        //redirect to index
        return redirect()
            ->route('posts')
            ->with(['success' => 'Post Updated.']);
    }

    public function destroy(Post $post)
    {
        Storage::delete('public/thumbnail' . $post->id);

        $post->delete();

        return redirect()
            ->back()
            ->with('success', 'Deleted Successfully.');
    }
}
