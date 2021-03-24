<?php

namespace Database\Seeders;

use App\Models\Meditation;
use App\Models\MeditationLog;
use App\Models\User;
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
        User::factory()
            ->hasMeditationLogs(10)
            ->create([
                'email' => 'test@test.com',
                'password' => '$2y$10$PSedGaKbTC1e1vAhWActou.GGAR9CR4uLKCHiP4GNK/xP1N1ig13.' //123456
            ]);

        Meditation::factory()
            ->count(50)
            ->create();

    }
}
