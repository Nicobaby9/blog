<?php

use Illuminate\Database\Seeder;

class AdviceMailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
        	0 => [
                'id' 			=> 1,
                'email' 		=> 'antilolok@gmail.com',
                'subject' 		=> 'test mail 1',
                'message' 		=> 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ],

            1 => [
                'id' 			=> 2,
                'email' 		=> 'pokupyz@gmail.com',
                'subject' 		=> 'test mail 2',
                'message' 		=> 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ],

            2 => [
                'id' 			=> 3,
                'email' 		=> 'esnajioej@gmail.com',
                'subject' 		=> 'test mail 3',
                'message' 		=> 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ],

            3 => [
                'id' 			=> 4,
                'email' 		=> 'pyorupyu@gmail.com',
                'subject' 		=> 'test mail 4',
                'message' 		=> 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ]

        ]);
    }
}
