<?php


namespace App\Repositories;


use App\Models\MeditationLog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class MeditationLogRepository extends BaseRepository implements MeditationLogInterface
{
    public function __construct(MeditationLog $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->all();
    }

    public function create(array $attributes)
    {
        $attributes['user_id'] = auth()->id();

        return $this->createNew($attributes);
    }

    public function getByDate()
    {
        $query = $this->model->whereYear('created_at', request('year', Carbon::now('Y')));


        if(request('month')) {
            $query->whereMonth('created_at', request('month'));
        }

        return $query->where('user_id', auth()->id())
            ->orderBy('created_at')
            ->get();


    }

    public function getLastDays()
    {
        $currentDate = Carbon::now();
        $pastDayPoint = $currentDate->subDays(request('days'));

        if(!request('days'))
            $pastDayPoint = $currentDate->firstOfMonth();


        return $this->model->select('created_at', 'duration')
            ->whereDate('created_at', '>=', $pastDayPoint)
            ->get()->groupBy(function($mdt){
                return Carbon::parse($mdt->created_at)->format('Y-m-d');
            });
    }

}
