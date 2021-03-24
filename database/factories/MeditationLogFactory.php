<?php

namespace Database\Factories;

use App\Models\Meditation;
use App\Models\MeditationLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeditationLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MeditationLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meditation_id' => Meditation::factory()->create()->id,
            'duration' => rand(30, 150)
        ];
    }
}
