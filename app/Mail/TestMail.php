<?php

namespace App\Mail;

use App\Models\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mail;

    public function __construct($mail){
        $this->mail = $mail;

    }

    public function build()
    {
        return $this->to($this->mail)->view('mails.test');
    }
}
