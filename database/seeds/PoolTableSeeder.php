<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PoolTableSeeder extends Seeder
{
    public function run()
    {
        factory(Nhlpool\Pool::class, 30)->create();
    }
}
