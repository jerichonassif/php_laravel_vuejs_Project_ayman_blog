<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Post;
use Illuminate\Http\Request;
use Validator;
use auth;

class postsController extends BaseController
{

    public function index()
    {
       
        $posts = Post::all();    
        return $this->sendResponse($posts->toArray(), 'this is data');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
    
        $validator =
        Validator::make($input, [

            'title' => 'required',
            'content' => 'required',  
        ]);

        if ($validator->fails()) {
            # code...
            return $this->sendError('error validation', $validator->errors());
        }
      
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
       
        $post->save();
        return $this->sendResponse($post->toArray(), 'post create succesfully');

    }

    public function show($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return $this->sendError('post not found');
        }
        return $this->sendResponse($post->toArray(), 'post read succesfully');

    }

    public function update(Request $request, Post $post)
    {
        $input = $request->all();

        $validator =
        Validator::make($input, [
            'title' => 'required',
            'content' => 'required',
         
        ]);

        if ($validator->fails()) {
            # code...
            return $this->sendError('error validation', $validator->errors(),400);
        }

        $post->title = $input['title'];
        $post->content = $input['content'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move("uploads/posts/" , $filename );

            $post->image = "uploads/posts/" .$filename;
        }
        $post ->user_id = Auth::id();


        $post->save();
        return $this->sendResponse($post->toArray(), 'post updateed succesfully');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return $this->sendResponse($post->toArray(), 'post deleted succesfully');
    }
}
