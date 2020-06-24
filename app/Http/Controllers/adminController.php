<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use auth;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        $users = User::paginate(4);
        //  dd($posts);

        return view('admin.users.index')->with('users' , $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

            'email' => 'required|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);


        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        //dd($data) ;
        User::create($data);

        return redirect('admin/users')->with('msgadd', 'This User Added');
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
        $user = User::find($id);
        // dd($user);
        return view('admin.users.edit')->with('user', $user);
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
        $this->validate($request, [
            'name' => 'required',
            'isadmin'  => 'required',
            'email' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        //$data = $request->all();
        // $data['user_id'] = Auth::id();

        //  Post::update($data);

        $data= $request->all();
        $data['user_id'] = Auth::id();
        $user = User::findOrFail($id);
        $data['password'] = Hash::make($data['password']);

        $user->update($data);


        return redirect('admin/users')->with('msgedit', 'Good User is Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       // dd($id)
        // dd('kkk');
        $user = User::find($id);

        $user->delete($id);
        return redirect('admin/users')->with('msgdeleted', 'Good User is Deleted');
    }
}
