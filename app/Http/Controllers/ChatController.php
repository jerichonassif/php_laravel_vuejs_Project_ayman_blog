<?php

namespace App\Http\Controllers;


use App\Events\Chats;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get(['id', 'name']);
//        dd( $users);
//        return view('chats', compact('users'));
        return view('chats')->with('users', $users);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Pusher\PusherException
     */
    public function store(Request $request)
    {


        $a = [
            'message' => $request['message'],
            'sender_id' => Auth::id(),
            'receiver_id' => $request['receiver_id']
        ];
//        $options = array(
//            'cluster' => 'eu',
//            'useTLS' => true
//        );


//        $pusher = new Pusher(
//            env('PUSHER_APP_ID'),
//            env('PUSHER_APP_KEY'),
//            env('PUSHER_APP_SECRET')
//            , $options);
//
//
//        $data = ['from' => $a['sender_id'], 'to' => $a['receiver_id']];
//        $pusher->trigger('channel - chat', 'event - chat', $data);


     $w=   event(new Chats($a));
dd($w);
        return Response()->json($a, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function auth(Request $request)
    {
        csrf_token();
        return Pusher::socket_auth($request->get('channel_name'), $request->get('socket_id'));
    }
}
