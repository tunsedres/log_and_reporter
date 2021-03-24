<?php

namespace App\Http\Controllers\Api\Meditation;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeditationLogRequest;
use App\Http\Resources\MeditationLogCollection;
use App\Http\Resources\MeditationLogResource;
use App\Repositories\MeditationLogInterface;

class MeditationLogController extends Controller
{
    /**
     * @var MeditationLogInterface
     */
    protected $meditationLogRepo;

    /**
     * MeditationLogController constructor.
     * @param MeditationLogInterface $meditationLogRepo
     */
    public function __construct(MeditationLogInterface $meditationLogRepo)
    {
        $this->meditationLogRepo = $meditationLogRepo;
    }

    public function endMeditation(MeditationLogRequest $request)
    {
        //validate request
        $request->validated();

        $meditationLog = $this->meditationLogRepo->create($request->only(['duration', 'meditation_id']));

        return new MeditationLogResource($meditationLog);
    }

    public function getMeditationLogs()
    {
        $meditationLogs = $this->meditationLogRepo->getByDate();

        return new MeditationLogResource($meditationLogs);
    }

    public function getMeditationStatistics()
    {
        $meditationLogs = $this->meditationLogRepo->getLastDays();
        return new MeditationLogCollection($meditationLogs);
    }
}
