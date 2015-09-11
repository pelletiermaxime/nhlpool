<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PoolTypeTableSeeder extends Seeder
{
    public function run()
    {
        factory(Nhlpool\PoolType::class, 5)->create();
    }
}
