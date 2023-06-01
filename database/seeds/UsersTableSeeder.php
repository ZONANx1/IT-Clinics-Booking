<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
        	'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => 'admin123',
                'remember_token' => null,
                'created_at'     => '2023-05-09 00:00:00',
                'updated_at'     => '2023-05-09 00:08:00',
        ]);

        User::create([
        	'id'             => 2,
                'name'           => 'Authoriser',
                'email'          => 'authoriser@authoriser.com',
                'password'       => 'authoriser123',
                'remember_token' => null,
                'created_at'     => '2023-05-09 00:00:00',
                'updated_at'     => '2023-05-09 00:08:00',
        ]);

        User::create([
        	'id'             => 3,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       => 'user1234',
                'remember_token' => null,
                'created_at'     => '2023-05-09 00:00:00',
                'updated_at'     => '2023-05-09 00:08:00',
        ]);
        User::create([
        	'id'             => 4,
                'name'           => 'Test',
                'email'          => 'test@user.com',
                'password'       => 'user1234',
                'remember_token' => null,
                'created_at'     => '2023-05-09 00:00:00',
                'updated_at'     => '2023-05-09 00:08:00',
        ]);


    }
}
