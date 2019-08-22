<?php

use Illuminate\Database\Seeder;

class SondageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sondages::create([
        	'name' => 'Sondage n°1'
        ]);
    }
}
