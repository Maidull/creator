<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $creator;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($creator)
    {
        $this->creator = $creator;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ProENDからの確認メール')->view('creator.confirm_email')->with(['creator' => $this->creator]);
    }
}
