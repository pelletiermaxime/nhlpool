<?php

use Illuminate\Database\Seeder;

class PoolUsersSeeder extends Seeder
{
    public function run()
    {
        factory(Nhlpool\User::class, 50)->create()->each(function ($u) {
            $u->pools()->save(factory(Nhlpool\Pool::class)->make());
        });
    }
}
