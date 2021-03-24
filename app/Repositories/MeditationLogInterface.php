<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;


/**
 * Interface MeditationLogInterface
 * @package App\Repositories
 */

interface MeditationLogInterface
{
    public function all(): Collection;

    public function create(array $attributes);

}
