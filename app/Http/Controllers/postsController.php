<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

use Illuminate\Pagination\Paginator;

class postsController extends Controller
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
        $posts = Post::latest()->paginate(6);
        //dd($posts);

        //  dd($posts);

        return view('posts.index')->with('posts' , $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required|max:255',
            'content'          => 'required'
            ]

      );
        // store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->input('content');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/posts/" , $filename );

            $post->image = "uploads/posts/" .$filename;
        }
        $post ->user_id = Auth::id();

        $post->save();


        return redirect('posts')->with('msgadd', 'this post added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        //dd($post->comments);
        return view('posts.show')->with('post', $post);


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
        // dd('$post');
        return view('posts.edit')->with('post', $post);
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

        $post = Post::find($id);


        $this->validate($request, [
                'title'         => 'required|max:255',
                // 'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                // 'category_id'   => 'required|integer',
                'content'          => 'required'
            ]

        );
        // store in the database
//        dd(["i"=>(Post::where('id' , $id)->first()->user_id ), 'auth'=>Auth::id(), "id"=>$id]);
//        dd((Post::where('id' , $id)->first()->user_id ) == Auth::id());


        $post->title = $request->input('title');
        // $post->slug = $request->slug;
        // $post->category_id = $request->category_id;
        $post->content = $request->input('content');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/posts/" , $filename );

            $post->image = "uploads/posts/" .$filename;
        }


    //    $post ->user_id = Auth::id();
        $post->save();

        return redirect('posts')->with('msgedit', 'Good post is edited');
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
        return redirect('posts')->with('msgdeleted', 'good post is deleted');

    }
}
