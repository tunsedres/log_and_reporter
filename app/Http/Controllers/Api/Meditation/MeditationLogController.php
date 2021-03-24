<?php

namespace App\Http\Controllers\Api\Meditation;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeditationLogRequest;
use App\Http\Resources\CompletedMeditationResource;
use App\Http\Resources\GeneralResponseResource;
use App\Http\Resources\MeditationLogCollection;
use App\Http\Resources\MeditationLogResource;
use App\Repositories\MeditationLogInterface;
use App\Services\MeditationLogService;

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

        try {
            $meditationLog = $this->meditationLogRepo->create($request->only(['duration', 'meditation_id']));
            return new CompletedMeditationResource($meditationLog);

        }
        catch (\Exception $e) {
            return new GeneralResponseResource(null,401,'An error occured',false);
        }

    }

    public function getMeditationLogs(MeditationLogService $meditationLogService)
    {
        $meditationLogs = $this->meditationLogRepo->getByDate();

        return new MeditationLogResource($meditationLogs, $meditationLogService);
    }

    public function getMeditationStatistics()
    {
        $meditationLogs = $this->meditationLogRepo->getLastDays();
        return new MeditationLogCollection($meditationLogs);
    }
}
