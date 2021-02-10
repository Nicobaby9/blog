<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TAGS
    	\DB::table('categories')->insert([
        	0 => [
                'id' 	=> 1,
                'name' 	=> 'Ekonomi',
                'slug' 	=> 'economy',
                'created_at'=> '2021-01-07 08:27:30',
            ],

            1 => [
                'id' 	=> 2,
                'name' 	=> 'Otomotif',
                'slug' 	=> 'motorsport',
                'created_at'=> '2021-01-07 08:27:30'   
            ],

            2 => [
                'id' 	=> 3,
                'name' 	=> 'Olahraga',
                'slug' 	=> 'sports',
                'created_at'=> '2021-01-07 08:27:30'   
            ],

            3 => [
                'id' 	=> 4,
                'name' 	=> 'Pendidikan',
                'slug' 	=> 'education',
                'created_at'=> '2021-01-07 08:27:30'   
            ],

            4 => [
                'id' 	=> 5,
                'name' 	=> 'Politik',
                'slug' 	=> 'politics',
                'created_at'=> '2021-01-07 08:27:30'   
            ],

            5 => [
                'id' 	=> 6,
                'name' 	=> 'Kesehatan',
                'slug' 	=> 'health',
                'created_at'=> '2021-01-07 08:27:30'   
            ],

            6 => [
                'id' 	=> 7,
                'name' 	=> 'Bisnis',
                'slug' 	=> 'business',
                'created_at'=> '2021-01-07 08:27:30'   
            ],

        ]);
    }
}
