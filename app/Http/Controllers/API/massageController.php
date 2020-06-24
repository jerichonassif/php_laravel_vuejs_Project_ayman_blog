<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Massage;
use Illuminate\Http\Request;

use Validator;
use auth;

class massageController extends BaseController
{

    public function index()
    {

        $massges = Massage::all();
        return $this->sendResponse($massges->toArray(), 'this is data');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator =
            Validator::make($input, [

                'name' => 'required',
            ]);

        if ($validator->fails()) {
            # code...
            return $this->sendError('error validation', $validator->errors());
        }

        $massge = new Massage();
        $massge->name = $request->name;


        $massge->save();
        return $this->sendResponse($massge->toArray(), 'massge create succesfully');

    }


    public function show($id)
    {
        $massge = Massge::find($id);
        if (is_null($massge)) {
            return $this->sendError('massge not found');
        }
        return $this->sendResponse($massge->toArray(), 'massge read succesfully');

    }
//
    public function update(Request $request, Massage $massge)
    {
        $input = $request->all();

        $validator =
            Validator::make($input, [
                'name' => 'required',


            ]);

        if ($validator->fails()) {
            # code...
            return $this->sendError('error validation', $validator->errors(),400);
        }
//
//
        $massge->name = $input['name'];


        $massge->save();
        return $this->sendResponse($massge->toArray(), 'massge updateed succesfully');

    }
//
    public function destroy(Massage $massge)
    {
        $massge->delete();
        return $this->sendResponse($massge->toArray(), 'post deleted succesfully');
    }
}
