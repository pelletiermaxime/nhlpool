<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoolUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_user', function (Blueprint $table) {
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
        Schema::drop('pool_user');
    }
}
