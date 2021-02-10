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
                'id' 	      => 1,
                'name' 	      => 'Sekolah',
                'slug' 	      => 'sekolah',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            1 => [
                'id' 	      => 2,
                'name' 	      => 'Pemerintah',
                'slug'        => 'pemerintah',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            2 => [
                'id' 	      => 3,
                'name' 	      => 'E-sports',
                'slug' 	      => 'e-sport',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            3 => [
                'id' 	      => 4,
                'name'    	  => 'Informatika',
                'slug'    	  => 'informatika',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            4 => [
                'id' 	      => 5,
                'name' 	      => 'Game',
                'slug' 	      => 'game',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            5 => [
                'id' 	      => 6,
                'name' 	      => 'Kesehatan',
                'slug' 	      => 'kesehatan',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            6 => [
                'id' 	      => 7,
                'name' 	      => 'Komputer',
                'slug'        => 'komputer',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            7 => [
                'id' 	      => 8,
                'name' 	      => 'Formula 1',
                'slug' 	      => 'formula-1',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            8 => [
                'id'          => 9,
                'name'        => 'Moto GP',
                'slug'        => 'moto-gp',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            9 => [
                'id'          => 10,
                'name'        => 'Bulu Tangkis',
                'slug'        => 'bulu-tangkis',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            10 => [
                'id'          => 11,
                'name'        => 'Sepak Bola',
                'slug'        => 'sepak-bola',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            11 => [
                'id'          => 12,
                'name'        => 'Manchester City',
                'slug'        => 'manchester-city',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            12 => [
                'id'          => 13,
                'name'        => 'Honda',
                'slug'        => 'honda',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

            13 => [
                'id'          => 14,
                'name'        => 'VirtusPro',
                'slug'        => 'virtus-pro',
                'created_at'  => '2021-01-07 08:27:30'   
            ],

        ]);
    }
}
