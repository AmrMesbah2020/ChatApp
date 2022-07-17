<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'body',
        'channel_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
