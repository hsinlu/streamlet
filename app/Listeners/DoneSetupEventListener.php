<?php

namespace App\Listeners;

use App\Events\DoneSetupEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class DoneSetupEventListener
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
     * @param  DoneSetupEvent  $event
     * @return void
     */
    public function handle(DoneSetupEvent $event)
    {
        file_put_contents(storage_path('/steup.lock'), 'done');
        Cache::forget('settings');
    }
}
