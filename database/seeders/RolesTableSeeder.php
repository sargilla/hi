<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	app()['cache']->forget('spatie.permission.cache');
    	
        Permission::create(['name'=>'mensajes-recibir']);
        Permission::create(['name'=>'admin-configuraciones']);
        Permission::create(['name'=>'admin-usuarios']);
        Permission::create(['name'=>'admin-menu']);
        Permission::create(['name'=>'gestion']);

        $role = Role::create([
            'name'=>'Administrador'
        ]);
        $role2 = Role::create([
            'name'=>'Gestor'
        ]);

        $role->givePermissionTo(['admin-usuarios','admin-menu','gestion','admin-configuraciones']);
        $role2->givePermissionTo(['gestion','mensajes-recibir']);
    }
}

