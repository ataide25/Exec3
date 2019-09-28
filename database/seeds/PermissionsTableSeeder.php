<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => '2019-09-26 01:11:58',
                'updated_at' => '2019-09-26 01:11:58',
            ],
            
        ];

        Permission::insert($permissions);
    }
}
