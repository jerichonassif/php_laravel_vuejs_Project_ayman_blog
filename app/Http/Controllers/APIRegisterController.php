<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Validator;

use App\User;

use JWTAuth;

use JWTFactory;

use Response;

class APIRegisterController extends Controller
{
    public function Login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:250',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return Response()->json($validator->errors());

        }

        $credential = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credential)) {

                return response()->json(['error' => 'invalde username and password '], 401);

            }
        } catch (JWTExcption $e) {
            return response()->json(['error' => 'could not create token'], 500);

        }

//        return Response()->json(compact('token'));

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()
//            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function Register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:250|unique:users',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return Response()->json($validator->errors());

        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

//        $user = User::first();
//        $token = JWTAuth::fromUser($user);

//        return Response::json(compact('token'));


        return $this->login(request());

    }
}
