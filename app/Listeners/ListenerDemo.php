<?php

namespace App\Listeners;

use App\Events\EventDemo;
use App\Jobs\JobDemo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenerDemo
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
     * @param  \App\Events\EventDemo  $event
     * @return void
     */
    public function handle(EventDemo $event)
    {
        $data = ["âa", "bb", "cc", "dd"];
        for ($i = 0; $i < count($data); $i++) {
            $rs = [
                'email' => "minhphung485@gmail.com",
                "content" => $data[$i]
            ];
            JobDemo::dispatch($rs);
        }
    }
}
