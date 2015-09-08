<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_users', function (Blueprint $table) {
            $table->timestamps();

            $table->unsignedInteger('pool_id');
            $table->unsignedInteger('user_id');

            $table->foreign('pool_id')->references('id')->on('pools')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pool_users');
    }
}
