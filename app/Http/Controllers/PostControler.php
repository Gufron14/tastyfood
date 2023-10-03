<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostControler extends Controller
{
    public function index()
    {
        $posts = Post::all();

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
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('thumbnail');
        $image->storeAs('public/thumbnail', $image->hashName());

        //create post
        Post::create([
            'thumbnail' => $image->hashName(),
            'title'     => $request->title,
            'content'   => strip_tags($request->content),
        ]);

        //redirect to index
        return redirect()->back()->with(['success' => 'Post Saved.']);
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
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('thumbnail')) {

            //upload new image
            $image = $request->file('thumbnail');
            $image->storeAs('public/thumbnail', $image->hashName());

            //delete old image
            Storage::delete('public/thumbnail/'.$post->thumbnail);

            //update post with new image
            $post->update([
                'thumbnail' => $image->hashName(),
                'title'     => $request->title,
                'content'   => strip_tags($request->content),
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->back()->with(['success' => 'Post Updated.']);

    }

    public function destroy(Post $post)
    {
        Storage::delete('public/thumbnail' . $post->id);

        $post->delete();

        return redirect()->back()->with('success', 'Deleted Successfully.');
    }
}
