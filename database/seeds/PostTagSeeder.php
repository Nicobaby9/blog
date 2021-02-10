<?php

use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('post_tag')->insert([
        	0 => [
                'id' 			=> 1,
                'post_id' 		=> 1,
                'tag_id' 		=> 10,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            1 => [
                'id' 			=> 2,
                'post_id' 		=> 2,
                'tag_id' 		=> 2,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            2 => [
                'id' 			=> 3,
                'post_id' 		=> 3,
                'tag_id' 		=> 3,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            3 => [
                'id' 			=> 4,
                'post_id' 		=> 3,
                'tag_id' 		=> 5,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            4 => [
                'id' 			=> 5,
                'post_id' 		=> 4,
                'tag_id' 		=> 1,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            5 => [
                'id' 			=> 6,
                'post_id' 		=> 4,
                'tag_id' 		=> 2,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            6 => [
                'id' 			=> 7,
                'post_id' 		=> 5,
                'tag_id' 		=> 11,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            7 => [
                'id' 			=> 8,
                'post_id' 		=> 5,
                'tag_id' 		=> 12,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            8 => [
                'id' 			=> 9,
                'post_id' 		=> 6,
                'tag_id' 		=> 3,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            9 => [
                'id' 			=> 10,
                'post_id' 		=> 6,
                'tag_id' 		=> 14,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            10 => [
                'id' 			=> 11,
                'post_id' 		=> 6,
                'tag_id' 		=> 5,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            11 => [
                'id' 			=> 12,
                'post_id' 		=> 7,
                'tag_id' 		=> 8,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],

            12 => [
                'id' 			=> 13,
                'post_id' 		=> 7,
                'tag_id' 		=> 13,
                'created_at' 	=> '2021-01-07 08:27:30',
                'updated_at' 	=> '2021-01-07 08:27:30',
            ],
        ]);
    }
}
