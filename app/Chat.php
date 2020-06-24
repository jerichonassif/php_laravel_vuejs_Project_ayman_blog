<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{


    protected $fillable = ['message', 'sender_id', 'receiver_id'];


    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

    public function receiver()
    {
        return $this->hasOne(User::class, 'id', 'receiver_id');
    }


}
