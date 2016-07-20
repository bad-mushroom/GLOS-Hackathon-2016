<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensors', function (Blueprint $table) {
			$table->increments('id');
			$table->string('sensor_id', 25)->unique();
			$table->integer('buoy_id')->references('id')->on('buoys')->unsigned();
			$table->string('shortName', 25);
			$table->string('name', 100);
			$table->string('description');
			$table->string('measurement', 100);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensors');
	}
}
