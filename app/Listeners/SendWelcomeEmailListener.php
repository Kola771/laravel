<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Mail\UserCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailListener
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
    public function handle(UserCreatedEvent $event): void
    {
        // dd("Bonjour depuis le listener");
        // envoyer des mails
        Mail::to($event->user->email)->send(new UserCreatedMail());
    }
}
