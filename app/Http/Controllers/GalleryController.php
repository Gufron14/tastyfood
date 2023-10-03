<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();

        return view('admin.resources.gallery.list', compact('galleries'));
    }

    public function create()
    {
        return view('admin.resources.gallery.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/galleries', $image->hashName());

        Gallery::create([
            'image' => $image->hashName()
        ]);

        return redirect()->back()->with('success', 'Image Added.');
    }

    public function edit(Gallery $gallery)
    {
        $galleries = Gallery::find($gallery->id);

        return view('admin.resources.gallery.edit', compact('galleries'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('image')) {

            // upload new image
            $image = $request->file('image');
            $image->storeAs('public/galleries', $image->hashName());

            // delete old image
            Storage::delete('public/galleries'.$gallery->image);

            $gallery->update([
                'image' => $image->hashName()
            ]);
        }

        return redirect()->back()->with('success', 'Image Updated.');
    } 

    public function destroy(Gallery $gallery)
    {
        Storage::delete('public/galleries'.$gallery->image);

        $gallery->delete();

        return redirect()->back()->with('success', 'Image Deleted.');
    }
}
