<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data_user = [
          [
            'name' => "admin",
            'email' => "admin@example.com",
            'password' => bcrypt('12345678'),
          ],
          [
            'name' => "owner",
            'email' => "owner@example.com",
            'password' => bcrypt('12345678'),
          ]
        ];
        $data_role = [
          [
            'name' => 'admin',
            'display_name' => 'Administrator', // optional
            'description' => 'User is the Administrator', // optional
          ],
          [
            'name' => 'owner',
            'display_name' => 'Project Owner', // optional
            'description' => 'User is the owner of a given project', // optional
          ],
        ];
        $data_permission = [
          [
            'name' => 'show-post',
            'display_name' => 'Show Post', // optional
            'description' => 'Look the post', // optional
          ],
          [
            'name' => 'edit-post',
            'display_name' => 'Edit Posts', // optional
            'description' => 'Edit the post', // optional
          ],
        ];
        foreach ($data_permission as $val) {
          Permission::create([
            'name' => $val['name'],
            'display_name' => $val['display_name'],
            'description' => $val['description']
          ]);
        }
        foreach ($data_role as $val) {
          Role::create([
            'name' => $val['name'],
            'display_name' => $val['display_name'],
            'description' => $val['description']
          ]);
        }
        foreach ($data_user as $val) {
          User::create([
            'name' => $val['name'],
            'email' => $val['email'],
            'password' => $val['password']
          ]);
        }
        DB::table('role_user')->insert([
          ['role_id' => 1,'user_id' => 1, 'user_type' => 'App\Models\User'],
          ['role_id' => 2,'user_id' => 2, 'user_type' => 'App\Models\User'],
        ]);
        DB::table('permission_user')->insert([
          ['permission_id' => 1,'user_id' => 1, 'user_type' => "App\Models\User"],
          ['permission_id' => 2,'user_id' => 2, 'user_type' => 'App\Models\User'],
          ['permission_id' => 1,'user_id' => 2, 'user_type' => 'App\Models\User'],
        ]);
        DB::table('permission_role')->insert([
          ['permission_id' => 1,'role_id' => 1],
          ['permission_id' => 2,'role_id' => 2],
          ['permission_id' => 1,'role_id' => 2],
        ]);
    }
}
