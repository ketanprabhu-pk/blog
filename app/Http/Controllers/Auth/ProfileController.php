<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $data['user'] = auth()->user();
        $data['posts'] = auth()->user()->posts()->with(['user', 'likes'])->paginate(20);
        return view('posts.index', $data);
    }
}
