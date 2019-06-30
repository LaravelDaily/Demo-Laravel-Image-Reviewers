<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$tloQbnSO5VUnbyUyg8NSQe5n82xiruHhkJUSqOkD8KIcXS5PjeQvi',
            'remember_token' => null,
            'created_at'     => '2019-06-30 14:24:02',
            'updated_at'     => '2019-06-30 14:24:02',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
