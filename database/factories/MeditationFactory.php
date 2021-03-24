<?php

namespace Database\Factories;

use App\Models\Meditation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MeditationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meditation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::random(10)
        ];
    }
}
