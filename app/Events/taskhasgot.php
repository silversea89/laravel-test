<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class taskhasgot implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;

    public $message;

    public $target;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username,$target)
    {
        $this->username = $username;
        $this->message  = "{$username} 接受了你的委託";
        $this->target = $target;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['taskhasgot.'.$this->target];
    }
}
