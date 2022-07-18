<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'sender' => $this->whenLoaded('user'),
            'body' => $this->body,
            'channel' => new ChannelResource($this->whenLoaded('channel')),
            'time' => $this->created_at
        ];
    }
}
