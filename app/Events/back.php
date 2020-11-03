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

class back implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $from;
    public $username;
    public $message;
    public $target;
    public $photo;
    public $time;
    public $href;
    public $title;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($from, $target,$task)
    {
        $username = $from->name;
        $this->message = $username." 正在前往面交地點";
        $this->photo=$from->photo;
        $this->target = $target;
        $this->time= Carbon::today()->toDateTimeString();
        $this->title=$task->Title;
        $this->href=$task->Tasks_id;
        Notification::create([
            'from' => $from->student_id,
            'to' => $target,
            'message' => $this->message,
            'read' => false,
            'created_at' => $this->time,
            'photo'=>$from->photo,
            'href'=>$task->Tasks_id,
            'title'=>$task->Title
        ]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['back.' . $this->target];
    }
}
