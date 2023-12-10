<?php

namespace App\Console\Commands;

use App\Events\EventDemo;
use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TashSchudele extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Lấy ngày giờ hiện tại và format theo định dạng "Y-m-d H:i"
        $currentDateTime = now()->format('Y-m-d H:i');

        // Lấy các bản ghi có trường 'time' bằng với ngày giờ hiện tại (không tính giây)
        $tasks = Task::whereRaw("DATE_FORMAT(time, '%Y-%m-%d %H:%i') = ?", [$currentDateTime])->get();

        foreach ($tasks as $key => $task) {
            Log::info("sff");
            event(new EventDemo(['email' => $task->email, 'content' => $task->content]));
        }
    }
}
