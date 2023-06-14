<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
        {
            $posts = Post::take(6)->get();
            $data = compact('posts');
            return view("frontend.index")->with($data);
        }
}
