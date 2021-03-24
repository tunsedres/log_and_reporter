<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeditationLogRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'duration' => 'required|integer'
        ];
    }
}
