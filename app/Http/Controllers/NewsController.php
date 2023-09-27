<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::latest();

        return view('admin.berita', ['news'=> $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.addnews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
                'title'=> 'required',
                'content'=> 'required',
                'image'=> 'required|mimes:jpeg,png'
            ]);

            $image = $request->file('image');
            $image->storeAs('public/img', $image->hashName());

            News::create([
                'title'=> $request->title,
                'content'=> $content = strip_tags ($request->content),
                'image'=> Storage::url('public/img/' . $image->hashName()),
            ]);


            return redirect()->route('berita')->with('success','Berhasil menambahkan Berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('berita.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('berita.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'title'=> 'required',
            'content'=> 'required',
            'image'=> 'required|mimes:jpeg,png'
        ]);

        if  ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/img', $image->hashName());

            Storage::delete('public/img'.$news->image);

            $news->update([
                'title'=> $request->title,
                'content'=> $content = strip_tags ($request->content),
                'image'=> Storage::url('public/img/' . $image->hashName()),
            ]);

        } else {
            $news->update([
                'title'=> $request->title,
                'content'=> $content = strip_tags ($request->content),
            ]);
        }

        return redirect()->route('berita')->with('success','Berita berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
