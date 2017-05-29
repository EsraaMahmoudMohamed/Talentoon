<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'first_name' => 'mina',
            'last_name' => 'zakaria',
            'email' => 'mina@yahoo.com',
            'gender' => 'male',
            'phone' => '01203370083',
            'date_of_birth' => '2017-01-01',
            'country_id' => 1,
            'image' => 'uploads/profile_pic/face3.jpg',
            'password' => bcrypt('123456'),
        ]);
    }
}
