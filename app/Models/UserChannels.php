<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChannels extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'channel_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function channels()
    {
        return $this->belongsTo(Channel::class);
    }
}
