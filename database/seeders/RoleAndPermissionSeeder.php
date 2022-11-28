<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Permission::create(['name' => 'create-users']);
      Permission::create(['name' => 'edit-users']);
      Permission::create(['name' => 'delete-users']);

      Permission::create(['name' => 'create-books']);
      Permission::create(['name' => 'edit-books']);
      Permission::create(['name' => 'delete-books']);

      $adminRole = Role::create(['name' => 'Admin']);
//      $editorRole = Role::create(['name' => 'Editor']);

      $adminRole->givePermissionTo([
        'create-users',
        'edit-users',
        'delete-users',
        'create-books',
        'edit-books',
        'delete-books',
      ]);

//      $editorRole->givePermissionTo([
//        'create-books',
//        'edit-books',
//        'delete-books',
//      ]);

      $user = User::first();

      $user->assignRole('Admin');

    }
}
