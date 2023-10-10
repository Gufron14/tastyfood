<?php

namespace App\Http\Controllers;


use App\Models\Gallery;
use App\Models\Post;
use App\Models\Slider;

class ViewController extends Controller
{

    public function index()
    {   
        $latests = Post::latest()->limit(1)->get();
        $posts = Post::latest()->limit(4)->get();
        $galleries = Gallery::latest()->limit(6)->get();


        return view('index', compact('latests', 'posts', 'galleries'));
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
        $thumbnails = Post::latest()->limit(4)->get();
        $galleries = Gallery::latest()->limit(4)->get();

        return view('viewberita', compact('posts', 'thumbnails', 'galleries'));
    }

}
