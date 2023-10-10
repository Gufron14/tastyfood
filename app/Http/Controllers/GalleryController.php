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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $image = $request->file('image');
        $image_extension = $image->extension();
        $image_name = date('ymdhis') . '.' . $image_extension;
        $image->move(public_path('image'), $image_name);

        Gallery::create([
            'image' => $image_name,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Image Added.');
    }

    public function edit(Gallery $gallery)
    {
        $galleries = Gallery::find($gallery->id);

        return view('admin.resources.gallery.edit', compact('galleries'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        if ($request->hasFile('image')) {
            // upload new image
            $image = $request->file('image');
            $image_extension = $image->extension();
            $image_name = date('ymdhis') . '.' . $image_extension;
            $image->move(public_path('image'), $image_name);

            // delete old image
            Storage::delete(public_path('image' . $gallery->id));

            $gallery->update([
                'image' => $image_name
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Image Updated.');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete('public/galleries' . $gallery->image);

        $gallery->delete();

        return redirect()
            ->back()
            ->with('success', 'Image Deleted.');
    }
}
