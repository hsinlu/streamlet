<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

use App\Events\DoneSetupEvent;
use App\Events\SettingsChangedEvent;

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
        file_put_contents(storage_path('app/steup.lock'), 'done');
        event(new SettingsChangedEvent);
    }
}
