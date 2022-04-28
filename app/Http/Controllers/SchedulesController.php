<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Log;

class SchedulesController extends Controller
{
    // Laravel課題3 - 問題①
    public function showPracticeSchedules(Schedule $schedule)
    {
        $allSchedule = $schedule->allSchedule();
        Log::info(json_encode($allSchedule, JSON_UNESCAPED_UNICODE));
        return 'test';
    }

    // Laravel課題3 - 問題②
    public function showPracticeDetails(Schedule $schedule)
    {
        $featurePracticeList = $schedule->featurePracticeList();
        Log::info(json_encode($featurePracticeList, JSON_UNESCAPED_UNICODE));
        return 'test';
    }
}
