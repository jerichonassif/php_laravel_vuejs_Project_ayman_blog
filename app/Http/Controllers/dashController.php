<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class dashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::all();
        $posts = Post::all();
        // dd($posts);

        return view('admin.index')->with([
            'users' => $users,
            'posts' => $posts

            ]);
    }

}
