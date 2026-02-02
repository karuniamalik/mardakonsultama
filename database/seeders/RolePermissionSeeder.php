<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Permission
        $permissions =[
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage appointments',
            'manage hero sections',

        ];
        
        // simpan permission ke user
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission]
            );
        }

        // membuat role super admin
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        // buat user
        $user =User::create([
            'name' =>'Winandi',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        // memberikan user role
        $user->assignRole($superAdminRole);

        // contoh user selain super admin
         $managerRole = Role::firstOrCreate([
            'name' => 'designer_manager'
        ]);

        // ngasi permisi
        
        $managerPermissions =[
           
            'manage products',
            'manage principles',
            'manage testimonials'
 
        ];
        // aktifkan role ke permisi
        $managerRole->syncPermissions($managerPermissions);
        // $superAdminRole->syncPermissions($permission);

    }
}
