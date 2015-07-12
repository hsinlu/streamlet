<?php

namespace App\Listeners;

use App\Events\SettingsChangedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class SettingsChangedEventListener
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
     * @param  SettingsChangedEvent  $event
     * @return void
     */
    public function handle(SettingsChangedEvent $event)
    {
         Cache::forget('settings');
    }
}
