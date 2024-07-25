<?php
namespace App\Services;

use App\Models\User;
use App\Models\Admin;
use App\Models\Statistic;

class StatisticService
{
    public function getUsersHighestTaskCount()
    {
        return Statistic::orderBy('task_count', 'desc')
            ->take(10)
            ->get();

    }

}