<?php

use App\Models\Event;
use App\Models\Sumario;
use App\Models\Sumarisima;
use App\Models\Infractor;
use App\Models\Expediente;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Isa;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\AsignarController;
use App\Http\Controllers\IsasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    //sumarios///////////////////////////////////
    ///////////////////////////////////////////

    Route::get('/sumarios', [App\Http\Controllers\SumariosController::class,'index'])->name('sumarios');
    Route::get('/sumarios/create', [App\Http\Controllers\SumariosController::class,'create'])->name('sumarios.create');
    Route::post('/sumarios/store',[App\Http\Controllers\SumariosController::class,'store'])->name('sumarios.store');
    Route::get('/sumarios/show/{sumario_id}',[App\Http\Controllers\SumariosController::class,'show'])->name('sumarios.show');  
    Route::post('/sumarios/update',[App\Http\Controllers\SumariosController::class,'update'])->name('sumarios.update');  
    Route::delete('/sumarios/destroy/{sumario_id}',[App\Http\Controllers\SumariosController::class,'destroy'])->name('sumarios.destroy');

    //sumarisimas///////////////////////////
    ////////////////////////////////////////

    Route::get('/sumarisimas', [App\Http\Controllers\SumarisimasController::class,'index'])->name('sumarisimas');
    Route::get('/sumarisimas/create', [App\Http\Controllers\SumarisimasController::class,'create'])->name('sumarisimas.create');
    Route::post('/sumarisimas/store',[App\Http\Controllers\SumarisimasController::class,'store'])->name('sumarisimas.store');
    Route::get('/sumarisimas/show/{sumarisima_id}',[App\Http\Controllers\SumarisimasController::class,'show'])->name('sumarisimas.show');  
    Route::post('/sumarisimas/update',[App\Http\Controllers\SumarisimasController::class,'update'])->name('sumarisimas.update');  
    Route::delete('/sumarisimas/destroy/{sumarisima_id}',[App\Http\Controllers\SumarisimasController::class,'destroy'])->name('sumarisimas.destroy');
    
    //infractores///////////////////////////
    ////////////////////////////////////////

    Route::get('/infractores', [App\Http\Controllers\InfractorsController::class,'index'])->name('infractores');
    Route::get('/infractores/create', [App\Http\Controllers\InfractorsController::class,'create'])->name('infractores.create');
    Route::post('/infractores/store',[App\Http\Controllers\InfractorsController::class,'store'])->name('infractores.store');
    Route::get('/infractores/show/{infractor_id}',[App\Http\Controllers\InfractorsController::class,'show'])->name('infractores.show');  
    Route::post('/infractores/update',[App\Http\Controllers\InfractorsController::class,'update'])->name('infractores.update');  
    Route::delete('/infractores/destroy/{infractor_id}',[App\Http\Controllers\InfractorsController::class,'destroy'])->name('infractores.destroy');

    //expedientes///////////////////////////
    ////////////////////////////////////////

    Route::get('/expedientes', [App\Http\Controllers\ExpedientesController::class,'index'])->name('expedientes');
    Route::get('/expedientes/create', [App\Http\Controllers\ExpedientesController::class,'create'])->name('expedientes.create');
    Route::post('/expedientes/store',[App\Http\Controllers\ExpedientesController::class,'store'])->name('expedientes.store');
    Route::get('/expedientes/show/{expediente_id}',[App\Http\Controllers\ExpedientesController::class,'show'])->name('expedientes.show');  
    Route::post('/expedientes/update',[App\Http\Controllers\ExpedientesController::class,'update'])->name('expedientes.update');  
    Route::delete('/expedientes/destroy/{expediente_id}',[App\Http\Controllers\ExpedientesController::class,'destroy'])->name('expedientes.destroy');

     //roles///////////////////////////
    ////////////////////////////////////////
    Route::resource('/roles', RoleController::class)->names('roles');
   
   /* Route::get('/roles', [App\Http\Controllers\RoleController::class,'index'])->name('roles');
    Route::get('/roles/create', [App\Http\Controllers\RoleController::class,'create'])->name('roles.create');
    Route::post('/roles/store',[App\Http\Controllers\RoleController::class,'store'])->name('roles.store');
    Route::get('/roles/show/{role_id}',[App\Http\Controllers\RoleController::class,'show'])->name('roles.show');
    Route::get('/roles/edit/{role_id}',[App\Http\Controllers\RoleController::class,'edit'])->name('roles.edit');  
    Route::put('/roles/update',[App\Http\Controllers\RoleController::class,'update'])->name('roles.update');  
    Route::delete('/roles/destroy/{role_id}',[App\Http\Controllers\RoleController::class,'destroy'])->name('roles.destroy');*/

    //permisos///////////////////////////
    ////////////////////////////////////////
    Route::resource('/permisos', PermisoController::class)->names('permisos');
    /*Route::get('/permisos', [App\Http\Controllers\PermisoController::class,'index'])->name('permisos');
    Route::get('/permisos/create', [App\Http\Controllers\PermisoController::class,'create'])->name('permisos.create');
    Route::post('/permisos/store',[App\Http\Controllers\PermisoController::class,'store'])->name('permisos.store');
    Route::get('/permisos/show/{permiso_id}',[App\Http\Controllers\PermisoController::class,'show'])->name('permisos.show');
    Route::get('/permisos/edit/{permiso_id}',[App\Http\Controllers\PermisoController::class,'edit'])->name('permisos.edit');    
    Route::post('/permisos/update',[App\Http\Controllers\PermisoController::class,'update'])->name('permisos.update');  
    Route::delete('/permisos/destroy/{permiso_id}',[App\Http\Controllers\PermisoController::class,'destroy'])->name('permisos.destroy');*/
    

    //usuarios///////////////////////////
    ////////////////////////////////////////
    Route::resource('/usuarios', AsignarController::class)->names('asignar');

    //informacion sumaria///////////////////////////////////
    ///////////////////////////////////////////

    Route::get('/isas', [App\Http\Controllers\IsasController::class,'index'])->name('isas');
    Route::get('/isas/create', [App\Http\Controllers\IsasController::class,'create'])->name('isas.create');
    Route::post('/isas/store',[App\Http\Controllers\IsasController::class,'store'])->name('isas.store');
    Route::get('/isas/show/{isa_id}',[App\Http\Controllers\IsasController::class,'show'])->name('isas.show');  
    Route::post('/isas/update',[App\Http\Controllers\IsasController::class,'update'])->name('isas.update');  
    Route::delete('/isas/destroy/{isa_id}',[App\Http\Controllers\IsasController::class,'destroy'])->name('isas.destroy');
});
