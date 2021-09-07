<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required|max:30',
            'lname' => 'required|max:30',
            'email' => 'required|email|max:30',
            'password' => 'required|confirmed',
        ]);
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
    public function logout()
    {
        return view('auth.index');
    }
}
