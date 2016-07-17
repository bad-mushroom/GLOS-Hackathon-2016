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
            'shortname' => 'waveheight',
            'fullname' => 'Wave Height',
        ]);

        DB::table('applets')->insert([
            'shortname' => 'watertemp',
            'fullname' => 'Water Temperature',
        ]);
    }
}
