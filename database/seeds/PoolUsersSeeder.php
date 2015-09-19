<?php

use Illuminate\Database\Seeder;

class PoolUsersSeeder extends Seeder
{
    public function run()
    {
        // Create 10 pools
        $pools = factory(Nhlpool\Pool::class, 10)->make();

        // Insert 50 users randomly into those 10 pools
        factory(Nhlpool\User::class, 50)->create()->each(function ($u) use ($pools) {
            $u->pools()->save($pools->random());
        });
    }
}
