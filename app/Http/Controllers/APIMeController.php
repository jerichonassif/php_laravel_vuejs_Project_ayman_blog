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

class APIMeController extends Controller
{
    public function me()
    {
        return response()->json(auth()->user());
    }
}
