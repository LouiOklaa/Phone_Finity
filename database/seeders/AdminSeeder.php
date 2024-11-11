<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([

            'name' => 'Loui Oklaa',
            'email' => 'Owner@louioklaa.com',
            'password' => bcrypt('loui2001@owner'),
            'role_name' =>'Owner',
            'status' =>'Active'
        ]);
        $role = Role::create(['name' => 'Owner']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
