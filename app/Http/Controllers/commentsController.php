<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Comment;
use auth;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class commentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $comments = Comment::latest()->paginate(4);
        //  dd($posts);

        return view('posts.show')->with('comments' , $comments);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.403');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd('asd');
      //  dd($request->all()) ;

        $this->validate($request, [
             'comment' => 'required'

        ]);
        $data = $request->all();
        //ata['post_id'] = Auth::id();
        //dd($data) ;
        $comment = Comment::create($data);
        //dd($comment);
        return redirect()->route('posts.show', $data['post_id']);
            //view('posts.show', compact(['msg' => 'this comment added']));


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
