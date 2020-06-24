<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Http\Request;

use Validator;
use auth;

class userController extends BaseController
{

    public function index()
    {

        $users = User::all();
        return $this->sendResponse($users ->toArray(), 'this is data');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator =
            Validator::make($input, [

               'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'isadmin' => 'required',


            ]);

        if ($validator->fails()) {

            return $this->sendError('error validation', $validator->errors());
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->isadmin = $request->input('isadmin');






        $user ->save();
        return $this->sendResponse(  $user ->toArray(), 'user create succesfully');

    }

    public function show($id)
    {
        $user  = User::find($id);
        if (is_null(  $user )) {
            return $this->sendError('user not found');
        }
        return $this->sendResponse(  $user ->toArray(), 'user read succesfully');

    }

    public function update(Request $request)
    {
        auth()->user()->update($request->all());
        return response()->json([
            'status' => 'user profile was updated',
            'user' => auth()->user()
        ], 200);
    }


    public function destroy(User $user){
        $user->delete();
        return $this->sendResponse($user->toArray(), 'user deleted succesfully');
    }
}
