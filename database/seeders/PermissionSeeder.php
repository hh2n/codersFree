<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Crear cursos',
        ]);
        Permission::create([
            'name' => 'Leer cursos',
        ]);
        Permission::create([
            'name' => 'Actualizar cursos',
        ]);
        Permission::create([
            'name' => 'Eliminar cursos',
        ]);

        Permission::create([
            'name' => 'Ver Dashboard',
        ]);

        Permission::create([
            'name' => 'Crear role',
        ]);
        Permission::create([
            'name' => 'Listar role',
        ]);
        Permission::create([
            'name' => 'Editar role',
        ]);
        Permission::create([
            'name' => 'Eliminar role',
        ]);
        
        Permission::create([
            'name' => 'Leer usuarios',
        ]);
        Permission::create([
            'name' => 'Crear usuarios',
        ]);
        Permission::create([
            'name' => 'Editar usuarios',
        ]);
        Permission::create([
            'name' => 'Eliminar usuarios',
        ]);
    }
}
