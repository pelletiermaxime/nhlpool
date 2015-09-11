<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
