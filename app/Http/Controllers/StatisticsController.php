<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        // Get top 10 users with the highest task count
        $users = User::withCount('tasks')
        ->orderBy('tasks_count', 'desc')
        ->take(10)
            ->get();

        return view('statistics.index', compact('users'));
    }
}
