<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;

use App\Book;

use Validator;



class BookController extends BaseController
{
    public function index(){
        $books = book::all();
        return $this->sendResponse($books->toArray(), 'this is data');

    }

    public function store(Request $request){
        $input = $request->all();
$validator = 
Validator::make($input, [
    
    'name'=> 'required',
    'details'=> 'required'
]);

if ($validator->fails()) {
    # code...
    return $this->sendError('error validation' , $validator->errors());
}

$book = Book::create($input);
return $this->sendResponse($book->toArray(), 'book create succesfully');

        
    }

    public function show($id){
        $book = Book::find($id);
        if(is_null($book)){
            return $this->sendError('book not found');
        }
        return $this->sendResponse($book->toArray(), 'book read succesfully');

    }

    public function update(Request $request, Book $book){
        $input = $request->all();
$validator = 
Validator::make($input, [
    
    'name'=> 'required',
    'details'=> 'required'
]);

if ($validator->fails()) {
    # code...
    return $this->sendError('error validation' , $validator->errors());
}

$book->name = $input['name'];
$book->details = $input['details'];
$book->save();
return $this->sendResponse($book->toArray(), 'book updateed succesfully');



    }

    public function destroy(Book $book){
        $book->delete();
        return $this->sendResponse($book->toArray(), 'book deleted succesfully');
    }
}
