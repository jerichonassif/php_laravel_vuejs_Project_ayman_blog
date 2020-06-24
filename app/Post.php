<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table="posts";

    protected $fillable = [
        'title','content' , 'user_id', 'image'
    ];

    public static function findOrFail(int $id)
    {
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
