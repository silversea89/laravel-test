<?php

namespace App\Events;

use App\Notification;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class applicate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $from;
    public $username;
    public $message;
    public $target;
    public $time;
    public $title;
    public $href;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($from, $target,$task)
    {
        $username = $from->name;
        $this->message = $username." 想成為您的工具人!前往委託細項查看!";
        $this->target = $target;
        $this->time=Carbon::now()->toDateTimeString();
        $this->title=$task->Title;
        $this->href=$task->Tasks_id;
        Notification::create([
            'from' => $from->student_id,
            'to' => $target,
            'message' => $this->message,
            'href'=>$task->Tasks_id,
            'title'=>$task->Title,
            'read' => false,
            'created_at' => $this->time
        ]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['applicate.' . $this->target];
    }
}
