<?php

namespace App\Services;

use App\Events\SendMessage;
use App\Models\Message;

class MessageService
{
    public function sendMessage($data)
    {
        $message = Message::create([
            'sender_id' => auth()->user()->id,
            'body' => $data['body'],
            'channel_id' => $data['channel']
        ]);

        event(new SendMessage($message));

        return $message;
    }


}

