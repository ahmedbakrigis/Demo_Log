<?php

namespace App\Listeners;

use App\Events\myproject_envent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;
class projectListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  myproject_envent  $event
     * @return void
     */
    public function handle(myproject_envent $event)
    {
        Storage::put('testdata.txt',$event->testevent);

    }
}
