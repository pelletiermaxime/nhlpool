<?php

use Illuminate\Database\Seeder;

class PoolTableSeeder extends Seeder
{
    public function run()
    {
        factory(Nhlpool\Pool::class, 30)->create();
    }
}
