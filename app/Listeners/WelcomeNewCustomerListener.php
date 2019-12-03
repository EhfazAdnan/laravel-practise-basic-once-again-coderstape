<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCustomerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(10);

        // full process of queue
        // listener class implements ShouldQueue
        // run queue:table and create table
        // migrate
        // queue connect sync to database in env
        // run queue:work

        // need to run php artisan config:cache command for working the queue

        // send mail to new user
        Mail::to($event->customer->email)->send(new WelcomeNewUserMail());
    }
}
