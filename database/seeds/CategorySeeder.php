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
                'name' 	=> 'Berita',
                'slug' 	=> 'news',
            ],

            1 => [
                'id' 	=> 2,
                'name' 	=> 'Otomotif',
                'slug' 	=> 'motorsport',
            ],

            2 => [
                'id' 	=> 3,
                'name' 	=> 'Olahraga',
                'slug' 	=> 'sports',
            ],

            3 => [
                'id' 	=> 4,
                'name' 	=> 'Pendidikan',
                'slug' 	=> 'education',
            ],

            4 => [
                'id' 	=> 5,
                'name' 	=> 'Sekolah',
                'slug' 	=> 'school',
            ],

            5 => [
                'id' 	=> 6,
                'name' 	=> 'Kesehatan',
                'slug' 	=> 'health',
            ],

            6 => [
                'id' 	=> 7,
                'name' 	=> 'Bisnis',
                'slug' 	=> 'business',
            ],

        ]);
    }
}
