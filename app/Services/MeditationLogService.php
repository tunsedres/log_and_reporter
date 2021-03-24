<?php


namespace App\Services;


use Carbon\Carbon;

class MeditationLogService
{

    public function calculateMostFrequentDays($meditationLogs)
    {
        $mostFrequentDayCount = 1;
        $counter = $meditationLogs->count() ? 1 : 0;
        foreach ($meditationLogs as $meditationLog) {

            if(isset($previousDate) && Carbon::parse($meditationLog->created_at)->diffInDays($previousDate) == 1) {
                $counter++;
                $mostFrequentDayCount = $counter;
            }
            else {
                $counter = 1;
            }

            $previousDate = $meditationLog->created_at;
        }

        return $mostFrequentDayCount;
    }
}
