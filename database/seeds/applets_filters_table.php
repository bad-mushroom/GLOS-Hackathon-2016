<?php

use Illuminate\Database\Seeder;

class applets_filters_table extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// --- APPLET: waveheight

		// boater
		DB::table('applets_filters')->insert([
			'applet_id' => 1,
			'filter_id' => 1,
		]);

		// swimmer
		DB::table('applets_filters')->insert([
			'applet_id' => 1,
			'filter_id' => 2,
		]);

		// fisher
		DB::table('applets_filters')->insert([
			'applet_id' => 1,
			'filter_id' => 3,
		]);

		// --- APPLET: watertemp

		// swimmer
		DB::table('applets_filters')->insert([
			'applet_id' => 2,
			'filter_id' => 2,
		]);

		// fisher
		DB::table('applets_filters')->insert([
			'applet_id' => 2,
			'filter_id' => 3,
		]);
		
		// Beachgoer
		DB::table('applets_filters')->insert([
			'applet_id' => 2,
			'filter_id' => 4,
		]);

		// --- APPLET: windspeed

		// boater
		DB::table('applets_filters')->insert([
			'applet_id' => 4,
			'filter_id' => 1,
		]);

		// --- APPLET: watervelocity

		// swimmer
		DB::table('applets_filters')->insert([
			'applet_id' => 3,
			'filter_id' => 2,
		]);

		// fisher
		DB::table('applets_filters')->insert([
			'applet_id' => 3,
			'filter_id' => 3,
		]);
	}
}
