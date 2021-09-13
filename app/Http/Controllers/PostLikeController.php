<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function store(Posts $post, Request $request)
    {
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
        return back();
    }
    public function destroy(Posts $post, Request $request)
    {
        $request->user()->likes()->where('posts_id', $post->id)->delete();
        return back();
    }
}
