<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class applicate_mail extends Mailable
{
    use Queueable, SerializesModels;
    public $params;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("有人想當您的工具人囉!")
            ->view('notimail')
            ->with([
                'params' => $this->params,
            ]);
    }
}
