<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChannelResource;
use App\Models\Channel;
use App\Services\ChannelService;
use Illuminate\Http\Request;

class ChannelController extends Controller
{

  public function index(ChannelService $channelService)
  {
    $channels = $channelService->fetchUserChannels(auth()->user());
    $channels->load(['lastMessage']);
    return ChannelResource::collection($channels);
  }

  public function show($channelId,ChannelService $channelService)
  {
    $channel = $channelService->fetchChannel($channelId);
    $channel->load(['messages']);
    $channel->messages->update(['is_seen' => 1]);
    return new ChannelResource($channel);
  }

  public function store(Request $request,ChannelService $channelService)
  {
    $channel = $channelService->store($request->only(['name','logo']));
    return new ChannelResource($channel);
  }
}
