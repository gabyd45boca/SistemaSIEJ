<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Administrador => all  
           DGAJUDICIALES => crear, editar, mostrar, Sumarios, Sumarisimas, Isas, Infractores y Expedientes.  
           DGAINTERNOS => editar, mostrar, Sumarios, Isas.  
           DGALETRADA => editar, mostrar, Sumarios, Sumarisimas, Isas.   
           DGRRHUMANOS => editar, mostrar, Sumarios, Sumarisimas, Isas.   
           SECRETARIA DE SEGURIDAD => crear, editar, mostrar, Sumarisimas.  
        */
        // Creamos los roles
        $Administrador = Role::create(['name' => 'Administrador']);
        $DGAJUDICIALES = Role::create(['name' => 'DGAJUDICIALES']);
        $DGAINTERNOS = Role::create(['name' => 'DGAINTERNOS']);
        $DGALETRADA = Role::create(['name' => 'DGALETRADA']);
        $DGRRHUMANOS = Role::create(['name' => 'DGRRHUMANOS']);
        $SECRETARIA_SEGURIDAD = Role::create(['name' => 'SECRETARIA_SEGURIDAD']);
        
        // Creamos los permisos
        Permission::create(['name' => 'Administrador']);
 

    }
}
