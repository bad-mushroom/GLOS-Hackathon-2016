<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applets', function (Blueprint $table) {
            // PK
            $table->increments('id');
            // Short name for internal use
            $table->string('shortname', 25)->unique();
            // Full 'human friendly' name
            $table->string('fullname', 50)->unique();
            // Distance in miles from user's location where this is valid
            $table->integer('distance_range');
            // Time data is valid for
            $table->integer('time_range');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applets');
    }
}
