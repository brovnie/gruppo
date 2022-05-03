<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ParticipatedUpdate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $participated;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($participated)
    {
        $this->participated = $participated;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('update-participated');
    }

    public function broadcastAs() 
    {
        return 'count-participated';
    }
}
