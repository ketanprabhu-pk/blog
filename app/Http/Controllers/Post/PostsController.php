<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
    public function store(Request $request)
    {
        dd('ok');
    }
}
