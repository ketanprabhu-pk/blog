<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $data['posts'] = Posts::get();
        return view('posts.index', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);
        // Posts::create([
        //     'user_id' => auth()->user()->id,
        //     'body' => $request->body,
        // ]);

        $request->user()->posts()->create($request->only('body'));
        return back();
    }
}
