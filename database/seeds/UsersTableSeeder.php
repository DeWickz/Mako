<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_firstname' => Str::random(10),
            'user_lastname' => Str::random(10),
            'user_LineUID' => Str::random(10),
            'user_mobile' => Str::random(10),
            'user_citizenID' => Str::random(13),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
