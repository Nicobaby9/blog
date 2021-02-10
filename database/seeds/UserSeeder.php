<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User
    	\DB::table('users')->insert([
        	0 => [
                'id' 			=> 1,
                'name' 			=> 'Lando Norris',
                'email' 		=> 'lnorris@gmail.com',
                'password' 		=> Hash::make('123456789'),
                'photo' 		=> '1612844484.jpg',
                'role' 			=> 1,
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ],

            1 => [
                'id' 			=> 2,
                'name' 			=> 'Yudho Alfantyo',
                'email' 		=> 'nosvengeance@gmail.com',
                'password' 		=> Hash::make('123456789'),
                'photo' 		=> '1612361939.jpg',
                'role' 			=> 99,
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null, 
            ],

            2 => [
                'id' 			=> 3,
                'name' 			=> 'Charles Leclerc',
                'email' 		=> 'leclerc@gmail.com',
                'password' 		=> Hash::make('123456789'),
                'photo' 		=> '1612362678.jpg',
                'role' 			=> 0,
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ],

            3 => [
                'id' 			=> 4,
                'name' 			=> 'George Russell',
                'email' 		=> 'russell@gmail.com',
                'password' 		=> Hash::make('123456789'),
                'photo' 		=> '1612362703.jpg',
                'role' 			=> 1,
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ]

        ]);

        // User
    	\DB::table('user_profiles')->insert([
        	0 => [
                'id' 			=> 1,
                'user_id' 		=> 1,
                'bio' 			=> 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
                'username' 		=> 'lnorris',
                'headline' 		=> 'Writer & Analyst',
                'facebook' 		=> 'Lando Norris',
                'instagram' 	=> 'lando.norris',
                'twitter' 		=> 'landoog',
                'phone' 		=> '086554321456',
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ],

            1 => [
                'id' 			=> 2,
               'user_id' 		=> 2,
                'bio' 			=> 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
                'username' 		=> 'aerials',
                'headline' 		=> 'Web Developer',
                'facebook' 		=> 'Yudho',
                'instagram' 	=> 'yudho.alkfiro',
                'twitter' 		=> 'aerials_',
                'phone' 		=> '086554324856',
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ],

            2 => [
                'id' 			=> 3,
                'user_id' 		=> 3,
                'bio' 			=> 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
                'username' 		=> 'leclerc',
                'headline' 		=> 'Flutter Developer',
                'facebook' 		=> 'Charles Leclerc',
                'instagram' 	=> 'charles.leclerc',
                'twitter' 		=> 'charles_leclerc',
                'phone' 		=> '086513421456',
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ],

            3 => [
                'id' 			=> 4,
                'user_id' 		=> 4,
                'bio' 			=> 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
                'username' 		=> 'gr63',
                'headline' 		=> 'Formula 1 Driver',
                'facebook' 		=> 'George Russell',
                'instagram' 	=> 'georgerussell',
                'twitter' 		=> 'grussell',
                'phone' 		=> '086554321456',
                'created_at'	=> '2021-02-02 14:56:10',
                'updated_at' 	=> '2021-02-02 14:58:10',
                'deleted_at' 	=> null,
            ]

        ]);
    }
}
