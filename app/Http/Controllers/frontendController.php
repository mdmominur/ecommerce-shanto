<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function frontend()
    {
        $products = Post::all();
        return view('frontend.home', compact('products'));
    }
}
