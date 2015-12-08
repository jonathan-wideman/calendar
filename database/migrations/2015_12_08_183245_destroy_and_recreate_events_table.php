<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DestroyAndRecreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('events');

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->string('icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('timeranges_id');
            $table->bigInteger('calendars_id');
            $table->bigInteger('colors_id');
            $table->bigInteger('icons_id');
            $table->timestamps();
        });
    }
}
