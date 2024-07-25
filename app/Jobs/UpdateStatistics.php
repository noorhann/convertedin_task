<?php

namespace App\Jobs;

use App\Models\Statistic;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::chunk(1000, function ($users) {
            foreach ($users as $user) {
                Statistic::updateOrCreate(
                    ['user_id' => $user->id],
                    ['task_count' => $user->tasks()->count()]
                );
            }
        });
    }
}
