<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(PoolTypeTableSeeder::class);
        $this->call(PoolTableSeeder::class);
        $this->call(PoolUsersSeeder::class);

        Model::reguard();
    }
}
