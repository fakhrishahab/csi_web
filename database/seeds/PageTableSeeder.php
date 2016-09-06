<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();

        DB::table('pages')->insert([
        	[
	        	'title' => 'About',
	        	'uri' => 'about',
	        	'type' => 0,
	        	'content' => 'This is the about page.'
	        ],
	        [
	        	'title' => 'Contact',
	        	'uri' => 'contact',
	        	'type' => 0,
	        	'content' => 'This is the contact page.'
	        ],
	        [
	        	'title' => 'FAQ',
	        	'uri' => 'faq',
	        	'type' => 0,
	        	'content' => 'This is the FAQ page.'
	        ],
	        [
	        	'title' => 'Media',
	        	'uri' => 'media',
	        	'type' => 0,
	        	'content' => 'This is the media page.'
	        ]
	    ]);
    }
}
