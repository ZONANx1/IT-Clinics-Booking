<?php

use App\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        User::findOrFail(1)->roles()->sync(1);

        User::findOrFail(2)->roles()->sync(2);

        User::whereNotIn('id', [1, 2])->get()->each(function ($user) {
            $user->roles()->sync(3);
        });
        
    }
}
