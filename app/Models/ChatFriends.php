<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatFriends extends Model
{
    protected $table = "chat_friends";

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
