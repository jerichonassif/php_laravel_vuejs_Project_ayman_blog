<?php

namespace App\Http\Controllers\API;

//use illuminate\Http\Request;

use App\Http\Controllers\Controller as Controller;





class BaseController extends Controller
{
    public function sendResponse($resault , $message){
        $response = [
            'seccess' => true,
            'data' => $resault,
            'message' => $message,

        ];
     
        return response()->json($response, 200);
        
    }

    public function sendError($error , $errorMessages = [], $code= 404){
        $response = [
            'seccess' => false,
            'errorMessages' => $error 

        ];


     if(!empty($errorMessages)){
         
         return $response['errorMessages'] = $errorMessages;
         
     }
        return response()->json($response, $code);
        
    }


}
