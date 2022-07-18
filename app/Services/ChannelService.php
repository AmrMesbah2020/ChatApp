<?php

namespace App\Services;

use App\Models\Channel;

class ChannelService
{
    public function fetchUserChannels($user)
    {
        return $user->channels;
    }

    public function fetchChannel($channelId)
    {
        return Channel::find($channelId);
    }

    public function store($data)
    {
       return Channel::create($data);
    }


}

