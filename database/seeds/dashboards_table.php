<?php

use Illuminate\Database\Seeder;

class dashboards_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Demo/Testing
        DB::table('dashboards')->insert([
            'name' => 'demo',
        ]);
        
        // Swim
        DB::table('dashboards')->insert([
            'name' => 'swimming',
        ]);
    }
}
