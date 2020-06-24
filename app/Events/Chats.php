<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Chats implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $sender_id;
    public $receiver_id;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {

        $this->message = $message['message'];
        $this->sender_id = $message['sender_id'];
        $this->receiver_id = $message['receiver_id'];

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('message.'.$this->message->from_user_id.'.'.$this->message->to_user_id);

        return new PrivateChannel('private-channel-chat');
    }

    public function broadcastAs()
    {
        return 'event-chat';
    }
}
