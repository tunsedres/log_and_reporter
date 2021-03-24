<?php

namespace App\Http\Resources;

use App\Services\MeditationLogService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Lang;

class MeditationLogResource extends JsonResource
{
    /**
     * @var MeditationLogService
     */
    private $meditationLogService;

    /**
     * MeditationLogResource constructor.
     * @param $resource
     * @param MeditationLogService $meditationLogService
     */
    public function __construct($resource, MeditationLogService $meditationLogService)
    {
        parent::__construct($resource);
        $this->meditationLogService = $meditationLogService;
    }

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
            'most_frequent_meditation_days_count' => $this->meditationLogService->calculateMostFrequentDays($this->resource),
            'total_meditation_time' => $this->sum('duration')
        ];
    }

    public function with($request)
    {
        return Lang::get('messages.success');
    }

}
