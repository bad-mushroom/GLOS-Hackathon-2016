<?php

use Illuminate\Database\Seeder;

class filters_table extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('filters')->insert([
			'id'		=> 1,
			'shortname'	=> 'boater',
			'fullname'	=> 'Boater',
		]);

		DB::table('filters')->insert([
			'id'		=> 2,
			'shortname' => 'swimmer',
			'fullname' 	=> 'Swimmer',
		]);

		DB::table('filters')->insert([
			'id'		=> 3,
			'shortname' => 'fisher',
			'fullname' 	=> 'Sport Fisher',
		]);

		DB::table('filters')->insert([
			'id'		=> 4,
			'shortname' => 'beach',
			'fullname' 	=> 'Beachgoer',
		]);

		DB::table('filters')->insert([
			'id'		=> 5,
			'shortname' => 'citizen',
			'fullname' 	=> 'Concerned Citizen',
		]);
	}
}
