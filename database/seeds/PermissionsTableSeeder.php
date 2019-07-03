<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-06-30 14:24:02',
            'updated_at' => '2019-06-30 14:24:02',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '17',
                'title'      => 'photo_create',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '18',
                'title'      => 'photo_edit',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '19',
                'title'      => 'photo_show',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '20',
                'title'      => 'photo_delete',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '21',
                'title'      => 'photo_access',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ],
            [
                'id'         => '22',
                'title'      => 'photo_review',
                'created_at' => '2019-06-30 14:24:02',
                'updated_at' => '2019-06-30 14:24:02',
            ]];

        Permission::insert($permissions);
    }
}
