<?php

namespace App\Console\Commands;

use App\Task;
use Illuminate\Console\Command;

class UpdateDuration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sprightly:update_durations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tasks = Task::all()->where('type', 'progress')->where('active', 1);
        foreach($tasks as $task){
            $task->duration = $task->duration + 60;
            $task->update();
        }
    }
}
