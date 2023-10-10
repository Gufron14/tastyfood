<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();

        return view('admin.resources.slider.list', compact('sliders'));
    }

    public function create()
    {
        return view('admin.resources.slider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg|max:10000',
            'description' => 'required',
            'status' => 'required|in:0,1'
        ]);

        $image = $request->file('image');
        $image_extension = $image->extension();
        $image_name = date('ymdhis') . '.' . $image_extension;
        $image->move(public_path('slider'), $image_name);

        Slider::create([
            'image' => $image_name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Image Added.');
    }

    public function edit(Slider $slider)
    {
        $sliders = Slider::find($slider->id);

        return view('admin.resources.slider.edit', compact('sliders'));
    }

    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'description' => 'min:3',
            'status' => 'in:0,1'
        ]);

        if($request->hasFile('image')) {

            // upload new image
            $image = $request->file('image');
            $image_extension = $image->extension();
            $image_name = date('ymdhis') . '.' . $image_extension;
            $image->move(public_path('slider'), $image_name);

            // delete old image
            Storage::delete(public_path('slider' . $slider->id));

            $slider->update([
                'image' => $image_name,
                'description' => $request->description,
                'status' => $request->status
            ]);
            
        } else {
            $slider->update([
                'description' => $request->description,
                'status' => $request->status
            ]);
        }

        return redirect()->route('slider')->with('success', 'Slider Updated.');
    }

    public function destroy(Slider $slider)
    {
        Storage::delete('public/sliders'.$slider->image);

        $slider->delete();

        return redirect()->back()->with('success', 'Slider Deleted.');
    }
    
}
