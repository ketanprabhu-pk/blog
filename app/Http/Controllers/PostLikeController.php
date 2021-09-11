<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Posts $post, Request $request)
    {
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        return back();
    }
    public function destroy(Posts $post, Request $request)
    {
        $request->user()->likes()->where('posts_id', $post->id)->delete();
        return back();
    }
}
