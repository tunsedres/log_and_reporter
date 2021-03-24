<?php

namespace Database\Seeders;

use App\Models\Meditation;
use Illuminate\Database\Seeder;

class MeditationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meditation::factory()
            ->count(50)
            ->create();
    }
}
