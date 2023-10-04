<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function news()
    {
        $posts = Post::latest()->limit(3)->get();

        return view('news', compact('posts'));
    }

    public function galery()
    {   
        $galleries = Gallery::all();

        return view('galery', compact('galleries'));
    }

    public function contact()
    {
        return view('contact');
    }

}
