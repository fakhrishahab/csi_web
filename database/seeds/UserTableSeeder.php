<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
        	[
        		'name' => 'Fakhri',
        		'email' => 'fakhri1804@gmail.com',
        		'password' => bcrypt('12345')
        	],
        	[
        		'name' => 'Farwah',
        		'email' => 'farwahaliyah@gmail.com',
        		'password' => bcrypt('12345')
        	]
        ]);
    }
}
