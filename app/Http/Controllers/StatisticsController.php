<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;
use App\Models\Statistic;


class StatisticsController extends Controller
{
    protected $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index()
    {
        $statistics = $this->statisticService->getUsersHighestTaskCount();

        return view('statistics.index', compact('statistics'));
    }
}
