<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Lang;

class MeditationLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'meditation_completed' => $this->count(),
            'most_frequent_meditation_days_count' => $this->calculateMostFrequentDays($this->resource),
            'total_meditation_time' => $this->sum('duration')
        ];
    }

    public function with($request)
    {
        return Lang::get('messages.success');
    }

    private function calculateMostFrequentDays($meditationLogs)
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
