<?php

namespace App\Listeners;

use App\Mail\BrandMail;
use App\Mail\WelcomeMail;
use App\Events\BrandCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotification
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
     * @param  \App\Events\BrandCreated  $event
     * @return void
     */
    public function handle(BrandCreated $event)
    {
        $data = request()->all();
        Mail::to('badhonkhan2033@gmail.com')->send(new BrandMail($data));
    }
}
