<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $data['posts'] = Posts::latest()->with(['user', 'likes'])->paginate(10);
        return view('posts.index', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        // Posts::create([
        //     'user_id' => auth()->user()->id,
        //     'body' => $request->body,
        // ]);

        $request->user()->posts()->create($request->only('title', 'body'));
        return back();
    }
    public function destroy(Posts $post, Request $request)
    {
        $post->delete();
        return back();
    }
}
