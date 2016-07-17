<?php

use Illuminate\Database\Seeder;

class applets_table extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('applets')->insert([
			'id'                 => 1,
			'shortname'          => 'waveheight',
			'fullname'           => 'Wave Height',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 2,
			'shortname'          => 'watertemp',
			'fullname'           => 'Water Temperature',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 3,
			'shortname'          => 'watervelocity',
			'fullname'           => 'Water Velocity',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 4,
			'shortname'          => 'windspeed',
			'fullname'           => 'Wind Knots',
			'distance_range'     => 50,
		]);
	}
}
