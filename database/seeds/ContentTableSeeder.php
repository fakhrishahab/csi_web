<?php

use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->truncate();

        DB::table('contents')->insert([
        	[
        		'page_id' => 7,
        		'headline' => 'Our Family',
        		'description' => 'This is our family',
        		'image' => ''
        	],
        	[
        		'page_id' => 7,
        		'headline' => 'Together We Can',
        		'description' => 'We are the best team to take you to the better World',
        		'image' => ''
        	]
        ]);
    }
}
