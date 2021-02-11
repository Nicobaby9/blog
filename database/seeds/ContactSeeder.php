<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contacts')->insert([
            'id' 			=> 1,
            'phone' 		=> '081975126423',
            'email' 		=> 'nosvengeance@gmail.com',
            'location' 		=> 'Nganjul, Indonesia',
            'created_at'	=> '2021-02-02 14:56:10',
            'updated_at' 	=> '2021-02-02 14:58:10',       
        ]);
    }
}
