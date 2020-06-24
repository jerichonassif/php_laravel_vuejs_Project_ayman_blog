<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Comment;
use Illuminate\Http\Request;

use Validator;
use auth;

class commentsController extends BaseController
{

    public function index()
    {
       
        $comments = Comment::all();    
        return $this->sendResponse($comments->toArray(), 'this is data');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
dd($input);
        $validator =
        Validator::make($input, [

            'comment' => 'required',
            
        ]);

        if ($validator->fails()) {
            # code...
            return $this->sendError('error validation', $validator->errors());
        }
      
        $comment = new Comment;
        $comment->comment = $request->comment;
        // $post->slug = $request->slug;
        // $post->category_id = $request->category_id;
       
       
        $comment->save();
        return $this->sendResponse($comment->toArray(), 'comment create succesfully');

    }

    public function show($id)
    {
        $comment = Comment::find($id);
        if (is_null($comment)) {
            return $this->sendError('post not found');
        }
        return $this->sendResponse($comment->toArray(), 'comment read succesfully');

    }

    public function update(Request $request, Comment $comment)
    {
        $input = $request->all();
        $validator =
        Validator::make($input, [
            'comment' => 'required',
           
         
        ]);

        if ($validator->fails()) {
            # code...
            return $this->sendError('error validation', $validator->errors());
        }
        $comment ->user_id = Auth::id();

        $comment->title = $input['comment'];
      
        
        $comment->save();
        return $this->sendResponse($comment->toArray(), 'comment updateed succesfully');

    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return $this->sendResponse($comment->toArray(), 'comment deleted succesfully');
    }
}
