<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class profilController extends Controller
{
    public function index($userid)
    {

        // $posts = Post::latest()->paginate(4);
        $user = User::findOrFail( $userid);

        return view('profile')->with('user' , $user);
    }
}
