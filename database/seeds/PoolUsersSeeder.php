<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PoolUsersSeeder extends Seeder
{
    public function run()
    {
        factory(Nhlpool\User::class, 50)->create()->each(function($u) {
            $u->pools()->save(factory(Nhlpool\Pool::class)->make());
        });
    }
}
