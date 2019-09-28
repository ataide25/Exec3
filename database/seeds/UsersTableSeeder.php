<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$GzU8EWXiv30N7BbYrPEYnO7TFKDI3Ixjbv7.yZ31GpJL3zpozi7K.',
                'remember_token' => null,
                'created_at'     => '2019-09-26 01:11:57',
                'updated_at'     => '2019-09-26 01:11:57',
            ],
        ];

        User::insert($users);
    }
}
