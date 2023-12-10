<?php

namespace App\Listeners;

use App\Events\EventDemo;
use App\Jobs\JobDemo;
use App\Mail\MailDemo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        try {
            Mail::to($event->data['email'])->send(new MailDemo($event->data['content']));
            Log::info("Đã gửi nha bạn !");
        } catch (\Exception $e) {
            // Ghi log lỗi
            Log::error("Lỗi rồi phujg ơi");
        }
    }
}
