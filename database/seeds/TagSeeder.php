<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TAGS
    	\DB::table('tags')->insert([
        	0 => [
                'id' 	=> 1,
                'name' 	=> 'PHP',
                'slug' 	=> 'php',
            ],

            1 => [
                'id' 	=> 2,
                'name' 	=> 'Laravel',
                'slug' 	=> 'laravel',
            ],

            2 => [
                'id' 	=> 3,
                'name' 	=> 'Javascript',
                'slug' 	=> 'js',
            ],

            3 => [
                'id' 	=> 4,
                'name' 	=> 'Java',
                'slug' 	=> 'java',
            ],

            4 => [
                'id' 	=> 5,
                'name' 	=> 'Python',
                'slug' 	=> 'phyton',
            ],

            5 => [
                'id' 	=> 6,
                'name' 	=> 'Swift',
                'slug' 	=> 'swift',
            ],

            6 => [
                'id' 	=> 7,
                'name' 	=> 'C++',
                'slug' 	=> 'c-plus-plus',
            ],

            7 => [
                'id' 	=> 8,
                'name' 	=> 'Dart',
                'slug' 	=> 'dart',
            ],

        ]);
    }
}
