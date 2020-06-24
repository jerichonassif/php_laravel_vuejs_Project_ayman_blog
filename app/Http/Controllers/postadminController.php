<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $posts = Post::latest()->paginate(4);
        $posts = Post::latest()->paginate(4);
        //  dd($posts);

        return view('admin.postadmin.index')->with('posts' , $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'         => 'required|max:255',
            // 'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            // 'category_id'   => 'required|integer',
            'content'          => 'required'
        ));
        // store in the database
        $post = new Post;
        $post->title = $request->title;
        // $post->slug = $request->slug;
        // $post->category_id = $request->category_id;
        $post->content = $request->input('content');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/posts/" , $filename );

            $post->image = "uploads/posts/" .$filename;
        }
        $post ->user_id = Auth::id();
       // dd($post);
        $post->save();

        return redirect('admin/postadmin')->with('msgadd', 'this post added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // dd($post);
        return view('admin.postadmin.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->validate($request, array(
            'title'         => 'required|max:255',
            // 'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            // 'category_id'   => 'required|integer',
            'content'          => 'required'
        ));
        // store in the database

        $post->title = $request->title;
        // $post->slug = $request->slug;
        // $post->category_id = $request->category_id;
        $post->content = $request->input('content');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/posts/" , $filename );

            $post->image = "uploads/posts/" .$filename;
        }
        $post ->user_id = Auth::id();

        $post->save();


        return redirect('admin/postadmin')->with('msgedit', 'Good post is edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('kkk');
        $post = Post::find($id);

        $post->delete($id);
        return redirect('admin/postadmin')->with('msgdeleted', 'good post is deleted');
    }
}
