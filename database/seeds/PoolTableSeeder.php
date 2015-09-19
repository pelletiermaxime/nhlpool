<?php

use Illuminate\Database\Seeder;
use Nhlpool\PoolType;

class PoolTableSeeder extends Seeder
{
    public function run()
    {
        $poolTypes = PoolType::all();
        factory(Nhlpool\Pool::class, 5)->create([
            'pool_type_id' => $poolTypes->random()->id,
        ]);
        factory(Nhlpool\Pool::class, 5)->create([
            'pool_type_id' => $poolTypes->random()->id,
        ]);
        factory(Nhlpool\Pool::class, 5)->create([
            'pool_type_id' => $poolTypes->random()->id,
        ]);
        factory(Nhlpool\Pool::class, 5)->create([
            'pool_type_id' => $poolTypes->random()->id,
        ]);
        factory(Nhlpool\Pool::class, 5)->create([
            'pool_type_id' => $poolTypes->random()->id,
        ]);
    }
}
