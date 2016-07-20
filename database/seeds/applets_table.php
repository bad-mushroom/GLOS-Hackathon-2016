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
			'shortname'          => 'WVHT',
			'fullname'           => 'Wave Height',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 2,
			'shortname'          => 'WTMP',
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
			'shortname'          => 'WSPD',
			'fullname'           => 'Wind Knots',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 5,
			'shortname'          => 'ATMP',
			'fullname'           => 'Air Temperature',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 6,
			'shortname'          => 'PH',
			'fullname'           => 'Water pH Level',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 7,
			'shortname'          => 'RH1',
			'fullname'           => 'Relative Humidity',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 8,
			'shortname'          => 'SPCOND',
			'fullname'           => 'Water Conductivity',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 9,
			'shortname'          => 'WDIR',
			'fullname'           => 'Wind Direction',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 10,
			'shortname'          => 'YTURBI',
			'fullname'           => 'Water Clarity',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 11,
			'shortname'          => 'YBGALG',
			'fullname'           => 'Blue Green Algae (phycocyanin)',
			'distance_range'     => 50,
		]);

		DB::table('applets')->insert([
			'id'                 => 12,
			'shortname'          => 'YCHLOR',
			'fullname'           => 'Chlorophyll',
			'distance_range'     => 50,
		]);
	}
}
