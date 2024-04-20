<?php

namespace App\Listeners;

use App\Events\MailSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
class SubcribeMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MailSent $event): void
    {
        $mail= $event->email;
        Mail::send('mailhome',$mail,function($massage) use($mail){
            $massage->to($mail);
           
            $massage->subject('Event Testing');
           });
    }
}
