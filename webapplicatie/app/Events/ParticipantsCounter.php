<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ParticipantsCounter implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $playersAllowed;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($playersAllowed)
    {
        $this->playersAllowed = $playersAllowed;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|arrays
     */
    public function broadcastOn()
    {
        return new Channel('team-list-count');
    }

    public function broadcastAs() 
    {
        return 'players-allowed';
    }
}
