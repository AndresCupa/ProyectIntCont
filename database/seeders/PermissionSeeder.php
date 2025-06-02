<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permiso del módulo principal
        Permission::create(['name' => 'principal']);

        // Permisos de los usuarios
        Permission::create(['name' => 'principal.users.index']);
        Permission::create(['name' => 'principal.users.create']);
        Permission::create(['name' => 'principal.users.edit']);
        Permission::create(['name' => 'principal.users.show']);
        Permission::create(['name' => 'principal.users.destroy']);
        Permission::create(['name' => 'principal.users.dbcvs']);
        Permission::create(['name' => 'principal.users.dbexcel']);
        Permission::create(['name' => 'principal.users.dbpdf']);
        Permission::create(['name' => 'principal.users.print']);

        // Permisos de roles
        Permission::create(['name' => 'principal.roles.index']);
        Permission::create(['name' => 'principal.roles.create']);
        Permission::create(['name' => 'principal.roles.edit']);
        Permission::create(['name' => 'principal.roles.show']);
        Permission::create(['name' => 'principal.roles.destroy']);

        // Creamos los roles
        $admin    = Role::create(['name' => 'Admin-Super']);
        $usuarios = Role::create(['name' => 'Usuarios']);

        // Asignar los permisos al rol super administrador
        $admin->givePermissionTo(Permission::all());

        // Asignar permisos limitados para el usuarios
        $usuarios->givePermissionTo(Permission::find(1));
        $usuarios->givePermissionTo(Permission::find(2));


        // Asignar el rol al usuarios
        $user = User::find(1);
        $user->assignRole('Admin-Super');

        $user = User::find(2);
        $user->assignRole('Usuarios');
        
            
    }
}
