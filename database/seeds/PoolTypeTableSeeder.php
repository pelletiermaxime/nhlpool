<?php

use Illuminate\Database\Seeder;
use Nhlpool\PoolTypes\TeamsScoreType;

class PoolTypeTableSeeder extends Seeder
{
    public function run()
    {
        $rules = factory(Nhlpool\PoolTypes\TeamsScoreType::class)->make()->getProperties();
        factory(Nhlpool\PoolType::class, 50)->create()->each(function ($poolType) use ($rules) {
            $poolType->setRules($rules);
        });
    }
}
