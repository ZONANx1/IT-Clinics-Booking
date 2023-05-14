<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => '2023-05-09 00:00:00',
                'updated_at' => '2023-05-09 00:08:00',
            ],
            [
                'id'         => 2,
                'title'      => 'Authoriser',
                'created_at' => '2023-05-09 00:00:00',
                'updated_at' => '2023-05-09 00:08:00',
            ],

            [
                'id'         => 3,
                'title'      => 'User',
                'created_at' => '2023-05-09 00:00:00',
                'updated_at' => '2023-05-09 00:08:00',
            ],
            
        ];

        Role::insert($roles);
    }
}
