<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Message;
use App\Models\Post;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countPost = Post::count();
        $countGallery = Gallery::count();
        $countSlider = Slider::count();
        $countMessage = Message::count();

        return view('admin.dashboard', compact('countPost', 'countGallery', 'countSlider', 'countMessage'));
    }

}
