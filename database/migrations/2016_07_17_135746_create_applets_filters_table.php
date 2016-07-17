<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppletsFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applets_filters', function (Blueprint $table) {
            // PK
            $table->increments('id');
            // Applets
            $table->integer('applet_id')->references('id')->on('applets')->unsigned();
            // Filters
            $table->integer('filter_id')->references('id')->on('filters')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applets_filters');
    }
}
