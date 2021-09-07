<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    }
    public function logout()
    {
        return view('auth.index');
    }
}
