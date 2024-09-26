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
        $SECRETARIA_GENERAL = Role::create(['name' => 'SECRETARIA_GENERAL']);
        
        // Creamos los permisos
        Permission::create(['name' => 'EditarSumarioDGAJ'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'EditarSumarioDGAI'])->syncRoles([$Administrador, $DGAINTERNOS]);
        Permission::create(['name' => 'EditarSumarioDGAL'])->syncRoles([$Administrador, $DGALETRADA]);
        Permission::create(['name' => 'EditarSumarioDGRRHH'])->syncRoles([$Administrador, $DGRRHUMANOS]);
        Permission::create(['name' => 'EliminarSumario'])->syncRoles([$Administrador]);
        Permission::create(['name' => 'AdministracionUsuario'])->syncRoles([$Administrador]);
        Permission::create(['name' => 'AdmistracionDGAJ'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'CrearSumario'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'RegistrarUsuario'])->syncRoles([$Administrador]);
        Permission::create(['name' => 'CrearSumarisima'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'AdministrarRoles'])->syncRoles([$Administrador]);
        Permission::create(['name' => 'AdministrarPermisos'])->syncRoles([$Administrador]);
        Permission::create(['name' => 'AdministracionExpedientes'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'AdministracionInfractores'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'EliminarSumarisima'])->syncRoles([$Administrador]);
        Permission::create(['name' => 'EliminarIsa'])->syncRoles([$Administrador]);
        Permission::create(['name' => 'EditarSumarisimaDGAJ'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'EditarSumarisimaDGAL'])->syncRoles([$Administrador, $DGALETRADA]);
        Permission::create(['name' => 'EditarSumarisimaDGRRHH'])->syncRoles([$Administrador, $DGRRHUMANOS]);
        Permission::create(['name' => 'EditarSumarisimaSS'])->syncRoles([$Administrador, $SECRETARIA_GENERAL]);
        Permission::create(['name' => 'AdministracionSumarisimas'])->syncRoles([$Administrador, $DGAJUDICIALES, $DGALETRADA, $DGRRHUMANOS, $SECRETARIA_GENERAL]);
        Permission::create(['name' => 'AdministracionSumarios'])->syncRoles([$Administrador, $DGAJUDICIALES,  $DGAINTERNOS,  $DGALETRADA, $DGRRHUMANOS]);
        Permission::create(['name' => 'ListarSumarios'])->syncRoles([$Administrador, $DGAJUDICIALES,  $DGAINTERNOS,  $DGALETRADA, $DGRRHUMANOS]);
        Permission::create(['name' => 'RegistrarSumarios'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'ListarSumarisimas'])->syncRoles([$Administrador, $DGAJUDICIALES, $DGALETRADA, $DGRRHUMANOS, $SECRETARIA_GENERAL]);
        Permission::create(['name' => 'AdministracionIsas'])->syncRoles([$Administrador, $DGAJUDICIALES,  $DGAINTERNOS,  $DGALETRADA, $DGRRHUMANOS]);
        Permission::create(['name' => 'ListarIsas'])->syncRoles([$Administrador, $DGAJUDICIALES,  $DGAINTERNOS,  $DGALETRADA, $DGRRHUMANOS]);
        Permission::create(['name' => 'RegistrarIsas'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'RegistrarSumarisimas'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        
        Permission::create(['name' => 'ConsultarSumarios'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'AdministracionSancionDirecta'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'ListarSD'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'RegistrarSD'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'EliminarSancion'])->syncRoles([$Administrador]);
        Permission::create(['name' => 'CrearSancion'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        
        Permission::create(['name' => 'EditarSancionDGAJ'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'EditarSancionDGAL'])->syncRoles([$Administrador, $DGALETRADA]);
        Permission::create(['name' => 'EditarSancionSS'])->syncRoles([$Administrador, $SECRETARIA_GENERAL]);
        Permission::create(['name' => 'EditarSancionDGRRHH'])->syncRoles([$Administrador, $DGRRHUMANOS]);
        Permission::create(['name' => 'EditarIsaDGAJ'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        Permission::create(['name' => 'Reingreso'])->syncRoles([$Administrador, $DGAJUDICIALES]);
        
        Permission::create(['name' => 'EditarIsaDGAI'])->syncRoles([$Administrador, $DGAINTERNOS]);
        Permission::create(['name' => 'EditarIsaDGAL'])->syncRoles([$Administrador, $DGALETRADA]);
        Permission::create(['name' => 'EditarIsaDGRRHH'])->syncRoles([$Administrador, $DGRRHUMANOS]);
    }
}
