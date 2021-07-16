<?php

use Sigma\Flatlab\FlatlabMenu as Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Menu::truncate();

        Menu::create([
        	'nombre'=>'Dashboard',
        	'alias'=>'dashboard',
        	'menu'=>'admin',
        	'padre_id' => '0',
        	'tipo' => 'route',
        	'destino' => 'gestion.index',
        	'icono'=>'fas fa-tachometer-alt',
        	'orden' => '0',
            'permiso' => 'gestion'
        ]);

        Menu::create([
        	'nombre'=>'Menus',
        	'alias'=>'menus',
        	'menu'=>'admin',
        	'padre_id' => '0',
        	'tipo' => 'route',
        	'destino' => 'menus.index',
        	'icono'=>'fas fa-map-signs',
        	'orden' => '1',
            'permiso' =>'admin-menu'
        ]);

        $usuarios = Menu::create([
        	'nombre'=>'Usuarios',
        	'alias'=>'usuarios',
        	'menu'=>'admin',
        	'padre_id' => '0',
        	'tipo' => 'url',
        	'destino' => '#',
        	'icono'=>'fas fa-users',
        	'orden' => '2',
            'permiso' =>'admin-usuarios'
        ]);

        Menu::create([
        	'nombre'=>'Usuarios',
        	'alias'=>'usuarios-index',
        	'menu'=>'admin',
        	'padre_id' => $usuarios->id,
        	'tipo' => 'route',
        	'destino' => 'users.index',
        	'icono'=>'fas fa-users',
        	'orden' => '1',
            'permiso' =>'admin-usuarios'
        ]);

        Menu::create([
        	'nombre'=>'Roles',
        	'alias'=>'roles',
        	'menu'=>'admin',
        	'padre_id' => $usuarios->id,
        	'tipo' => 'route',
        	'destino' => 'roles.index',
        	'icono'=>'fas fa-id-card',
        	'orden' => '2',
            'permiso' =>'admin-usuarios'
        ]);

        Menu::create([
        	'nombre'=>'Permisos',
        	'alias'=>'permisos',
        	'menu'=>'admin',
        	'padre_id' => $usuarios->id,
        	'tipo' => 'route',
        	'destino' => 'permisos.index',
        	'icono'=>'fas fa-lock',
        	'orden' => '3',
            'permiso' =>'admin-usuarios'
		]);

		Menu::create([
        	'nombre'=>'Configuraciones',
        	'alias'=>'configuraciones',
        	'menu'=>'admin',
        	'padre_id' => '0',
        	'tipo' => 'route',
        	'destino' => 'configuraciones.index',
        	'icono'=>'fas fa-cogs',
        	'orden' => '20',
            'permiso' =>'admin-configuraciones'
        ]);
    }
}
