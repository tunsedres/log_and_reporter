<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Lang;

class MeditationLogCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['data' => $this->collection->transform(function ($mdt){
            return [
                'total_time' => $mdt->sum('duration'),
            ];
        })
        ];
    }

    public function with($request)
    {
        return Lang::get('messages.success');
    }
}
