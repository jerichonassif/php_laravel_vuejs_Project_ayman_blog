<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;

use illuminate\Support\Facades\Auth;

use Tymon\JWTAuth\Excption\JWTExcption;

use Validator;

use App\User;

use JWTAuth;

use JWTFactory;

use Response;

class APIlogoutController extends Controller
{
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

}
