<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChannelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'channel_name' => $this->name,
            'logo' => $this->logo,
            'last_message' => new MessageResource($this->whenLoaded('lastMessage')),
            'messages' => MessageResource::collection($this->whenLoaded('messages')),
            'pending_messages' => $this->unSeenMessagesCount->count()
        ];
    }
}
