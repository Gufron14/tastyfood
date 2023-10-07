<?php

namespace App\Http\Controllers;

use App\Events\NewMessageNotification;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Post;
use App\Models\Slider;
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
        $posts = Post::latest()->limit(2)->get();
        $postsCard = Post::first()->limit(6)->get();

        return view('news', compact('posts', 'postsCard'));
    }

    public function galery()
    {   
        $galleries = Gallery::all();
        $sliders =  Slider::all();

        return view('galery', compact('galleries', 'sliders'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function viewberita(Post $post)
    {
        $posts = Post::find($post->id);
        $thumbnails = Post::all();
        $galleries = Gallery::latest()->limit(3)->get();

        return view('viewberita', compact('posts', 'thumbnails', 'galleries'));
    }

}
