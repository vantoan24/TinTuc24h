<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Newsletter;
use App\Events\EventNewsleters;
use App\Jobs\SendEmail;
use App\Mail\TestMail;

class ListenerNewsleters
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
     * @param  \App\Events\EventNewsleters  $event
     * @return void
     */
    public function handle(EventNewsleters $event)
    {
        // $new = $event->new->title;
        $mails = Newsletter::all();

        foreach ($mails as $mail){
            
            $email = $mail->email;
            $TestMail = new TestMail($email);
            dispatch(new SendEmail($TestMail));
        }
    }
}
