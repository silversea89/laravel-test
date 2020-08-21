<?php

namespace App\Listeners;

use App\Events\taskhasgot;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class taskhasgotListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  taskhasgot  $event
     * @return void
     */
    public function handle(taskhasgot $event)
    {
        //
    }
}
