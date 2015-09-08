<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->unsignedInteger('pool_type_id');
            $table->foreign('pool_type_id')->references('id')->on('pool_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pools');
    }
}
