<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\News;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function news()
    {
        $berita = Berita::latest()->limit(3)->get();

        return view('news', compact('berita'));
    }

}
