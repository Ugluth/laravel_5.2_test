<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Admin;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'name' => 'User 1',
            'email' => 'user1@test.com',
            'password' => bcrypt('asdf')
        ]);

        User::create([
            'name' => 'User 2',
            'email' => 'user2@test.com',
            'password' => bcrypt('qwer')
        ]);

        Admin::create([
            'name' => 'Admin 1',
            'email' => 'admin1@test.com',
            'password' => bcrypt('1234')
        ]);

        Admin::create([
            'name' => 'Admin 2',
            'email' => 'admin2@test.com',
            'password' => bcrypt('zxcv')
        ]);
    }

}