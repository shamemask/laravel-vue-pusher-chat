<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


use App\Models\User;
use App\Models\MessageS;



class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $username, $message, $id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username, $message, $id)
    {
        $this->username = $username;
        $this->message = $message;
        $this->id = $id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat');
    }
    public function broadcastAs()
    {
        return 'message';
    }
}
