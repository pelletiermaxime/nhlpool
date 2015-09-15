<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

use Nhlpool\PoolTypes\TeamsScoreType;

class PoolTypeTableSeeder extends Seeder
{
    public function run()
    {
        factory(Nhlpool\PoolType::class, 5)->create();
        $teamScoreType = new TeamsScoreType();
        $rulesArray = $teamScoreType->getProperties();
        $poolType = Nhlpool\PoolType::first();
        $poolType->setRules($rulesArray);
    }
}
