<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ForgetCacheEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * ForgetCacheEvent constructor.
     * @param $model
     * @param $relation
     */
    public function __construct($model, $relation = array())
    {
        $this->model = $model;
        $this->relation = $relation;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
