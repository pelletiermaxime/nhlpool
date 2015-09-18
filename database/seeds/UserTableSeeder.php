<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory(Nhlpool\User::class, 50)->create();
    }
}
