<?php

namespace App\Events;

use App\Notification;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class givetask implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $from;
    public $username;
    public $message;
    public $target;
    public $time;
    public $href;
    public $title;
    public $photo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($from, $target,$task)
    {
        $username = $from->name;
        $this->message  = "{$username} 同意您擔任工具人了!";
        $this->target = $target;
        $this->photo=$from->photo;
        $this->time=Carbon::now()->toDateTimeString();
        $this->title=$task->Title;
        $this->href=$task->Tasks_id;
        Notification::create([
            'from' => $from->student_id,
            'to' => $target,
            'message' => $this->message,
            'read' => false,
            'created_at' => $this->time,
            'href'=>$task->Tasks_id,
            'photo'=>$from->photo,
            'title'=>$task->Title
        ]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['givetask.' . $this->target];
    }
}
