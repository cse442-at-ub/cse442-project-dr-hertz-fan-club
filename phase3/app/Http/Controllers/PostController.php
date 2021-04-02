<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController
{
    public function index()
    {
        $posts = User::get();

        return view('dashboard', [
            'posts' => $posts
        ]);
    }

    public function show(Request $posts)
    {
        return view('dashboard', [
            'post' => $posts
        ]);
    }
}
