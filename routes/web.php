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
use App\Http\Controllers\SancionController;
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
    return Auth::check() ? view('home') : view('auth.login');
});

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    //sumarios///////////////////////////////////
    ///////////////////////////////////////////

    Route::get('/sumarios/filtrado', [App\Http\Controllers\SumariosController::class,'filtrado'])->name('sumarios.filtrado');

    Route::get('/sumarios', [App\Http\Controllers\SumariosController::class,'index'])->name('sumarios');
    Route::get('/sumarios/create', [App\Http\Controllers\SumariosController::class,'create'])->name('sumarios.create');
    Route::post('/sumarios/store',[App\Http\Controllers\SumariosController::class,'store'])->name('sumarios.store');
    Route::get('/sumarios/show/{sumario_id}',[App\Http\Controllers\SumariosController::class,'show'])->name('sumarios.show');
    Route::get('/sumarios/edit/{sumario_id}',[App\Http\Controllers\SumariosController::class,'edit'])->name('sumarios.edit');    
    Route::post('/sumarios/update',[App\Http\Controllers\SumariosController::class,'update'])->name('sumarios.update');  
    Route::delete('/sumarios/destroy/{sumario_id}',[App\Http\Controllers\SumariosController::class,'destroy'])->name('sumarios.destroy');
    
    Route::get('/sumarios/consulta/',[App\Http\Controllers\SumariosController::class,'consulta'])->name('sumarios.consulta');
    Route::get('/sumarios/export', [App\Http\Controllers\SumariosController::class, 'export'])->name('sumarios.export');
    Route::get('/sumarios/motivos-data', [App\Http\Controllers\SumariosController::class, 'getMotivosData'])->name('sumarios.motivosData');
    
    Route::get('/sumarios/{id}/reingresos/create', [App\Http\Controllers\SumariosController::class, 'mostrarFormularioReingreso'])->name('sumarios.reingreso.create');
    Route::post('/sumarios/{id}/reingresos/store', [App\Http\Controllers\SumariosController::class, 'storeReingreso'])->name('sumarios.reingreso.store');
   
    //sumarisimas///////////////////////////
    ////////////////////////////////////////

    Route::get('/sumarisimas/filtrado', [App\Http\Controllers\SumarisimasController::class,'filtrado'])->name('sumarios.filtrado');

    Route::get('/sumarisimas', [App\Http\Controllers\SumarisimasController::class,'index'])->name('sumarisimas');
    Route::get('/sumarisimas/create', [App\Http\Controllers\SumarisimasController::class,'create'])->name('sumarisimas.create');
    Route::post('/sumarisimas/store',[App\Http\Controllers\SumarisimasController::class,'store'])->name('sumarisimas.store');
    Route::get('/sumarisimas/show/{sumarisima_id}',[App\Http\Controllers\SumarisimasController::class,'show'])->name('sumarisimas.show');
    Route::get('/sumarisimas/edit/{sumarisima_id}',[App\Http\Controllers\SumarisimasController::class,'edit'])->name('sumarisimas.edit');    
    Route::post('/sumarisimas/update',[App\Http\Controllers\SumarisimasController::class,'update'])->name('sumarisimas.update');  
    Route::delete('/sumarisimas/destroy/{sumarisima_id}',[App\Http\Controllers\SumarisimasController::class,'destroy'])->name('sumarisimas.destroy');

    Route::get('/sumarisimas/consulta/',[App\Http\Controllers\SumarisimasController::class,'consulta'])->name('sumarisimas.consulta');
    Route::get('/sumarisimas/export', [App\Http\Controllers\SumarisimasController::class, 'export'])->name('sumarisimas.export');
    Route::get('/sumarisimas/motivos-data', [App\Http\Controllers\SumarisimasController::class, 'getMotivosData'])->name('sumarisimas.motivosData');
    
    Route::get('/sumarisimas/{id}/reingresos/create', [App\Http\Controllers\SumarisimasController::class, 'mostrarFormularioReingreso'])->name('sumarisimas.reingreso.create');
    Route::post('/sumarisimas/{id}/reingresos/store', [App\Http\Controllers\SumarisimasController::class, 'storeReingreso'])->name('sumarisimas.reingreso.store');
    
    //infractores///////////////////////////
    ////////////////////////////////////////

    Route::get('/infractores', [App\Http\Controllers\InfractorsController::class,'index'])->name('infractores');
    Route::get('/infractores/create', [App\Http\Controllers\InfractorsController::class,'create'])->name('infractores.create');
    Route::post('/infractores/store',[App\Http\Controllers\InfractorsController::class,'store'])->name('infractores.store');
    Route::get('/infractores/show/{infractor_id}',[App\Http\Controllers\InfractorsController::class,'show'])->name('infractores.show');
    Route::get('/infractores/edit/{infractor_id}',[App\Http\Controllers\InfractorsController::class,'edit'])->name('infractores.edit');    
    Route::post('/infractores/update',[App\Http\Controllers\InfractorsController::class,'update'])->name('infractores.update');  
    Route::delete('/infractores/destroy/{infractor_id}',[App\Http\Controllers\InfractorsController::class,'destroy'])->name('infractores.destroy');

    //expedientes///////////////////////////
    ////////////////////////////////////////

    Route::get('/expedientes', [App\Http\Controllers\ExpedientesController::class,'index'])->name('expedientes');
    Route::get('/expedientes/create', [App\Http\Controllers\ExpedientesController::class,'create'])->name('expedientes.create');
    Route::post('/expedientes/store',[App\Http\Controllers\ExpedientesController::class,'store'])->name('expedientes.store');
    Route::get('/expedientes/show/{expediente_id}',[App\Http\Controllers\ExpedientesController::class,'show'])->name('expedientes.show');
    Route::get('/expedientes/edit/{expediente_id}',[App\Http\Controllers\ExpedientesController::class,'edit'])->name('expedientes.edit');  
    Route::post('/expedientes/update',[App\Http\Controllers\ExpedientesController::class,'update'])->name('expedientes.update');  
    Route::delete('/expedientes/destroy/{expediente_id}',[App\Http\Controllers\ExpedientesController::class,'destroy'])->name('expedientes.destroy');

    Route::get('/expedientes/{id}/reingresos/create', [App\Http\Controllers\ExpedientesController::class, 'mostrarFormularioReingreso'])->name('expedientes.reingreso.create');
    Route::post('/expedientes/{id}/reingresos/store', [App\Http\Controllers\ExpedientesController::class, 'storeReingreso'])->name('expedientes.reingreso.store');

     //roles///////////////////////////
    ////////////////////////////////////////
    Route::resource('/roles', RoleController::class)->names('roles');
  
    //permisos///////////////////////////
    ////////////////////////////////////////
    Route::resource('permisos', PermisoController::class);
    
    //usuarios///////////////////////////
    ////////////////////////////////////////
    Route::resource('/usuarios', AsignarController::class)->names('asignar');

    //informacion ISA sumaria///////////////////////////////////
    ///////////////////////////////////////////
    Route::get('/isas/filtrado', [App\Http\Controllers\IsasController::class,'filtrado'])->name('isas.filtrado');

    Route::get('/isas', [App\Http\Controllers\IsasController::class,'index'])->name('isas');
    Route::get('/isas/create', [App\Http\Controllers\IsasController::class,'create'])->name('isas.create');
    Route::post('/isas/store',[App\Http\Controllers\IsasController::class,'store'])->name('isas.store');
    Route::get('/isas/show/{isa_id}',[App\Http\Controllers\IsasController::class,'show'])->name('isas.show');
    Route::get('/isas/edit/{isa_id}',[App\Http\Controllers\IsasController::class,'edit'])->name('isas.edit');    
    Route::post('/isas/update',[App\Http\Controllers\IsasController::class,'update'])->name('isas.update');  
    Route::delete('/isas/destroy/{isa_id}',[App\Http\Controllers\IsasController::class,'destroy'])->name('isas.destroy');

    Route::get('/isas/consulta/',[App\Http\Controllers\IsasController::class,'consulta'])->name('isas.consulta');
    Route::get('/isas/export', [App\Http\Controllers\IsasController::class, 'export'])->name('isas.export');
    Route::get('/isas/motivos-data', [App\Http\Controllers\IsasController::class, 'getMotivosData'])->name('isas.motivosData');

    Route::get('/isas/{id}/reingresos/create', [App\Http\Controllers\IsasController::class, 'mostrarFormularioReingreso'])->name('isas.reingreso.create');
    Route::post('/isas/{id}/reingresos/store', [App\Http\Controllers\IsasController::class, 'storeReingreso'])->name('isas.reingreso.store');

     //Sancion directa///////////////////////////////////
    ///////////////////////////////////////////

    Route::get('/sancion', [App\Http\Controllers\SancionController::class,'index'])->name('sancion');
    Route::get('/sancion/create', [App\Http\Controllers\SancionController::class,'create'])->name('sancion.create');
    Route::post('/sancion/store',[App\Http\Controllers\SancionController::class,'store'])->name('sancion.store');
    Route::get('/sancion/show/{sancion_id}',[App\Http\Controllers\SancionController::class,'show'])->name('sancion.show');
    Route::get('/sancion/edit/{sancion_id}',[App\Http\Controllers\SancionController::class,'edit'])->name('sancion.edit');    
    Route::post('/sancion/update',[App\Http\Controllers\SancionController::class,'update'])->name('sancion.update');  
    Route::delete('/sancion/destroy/{sancion_id}',[App\Http\Controllers\SancionController::class,'destroy'])->name('sancion.destroy');
    
    Route::get('/sancion/{id}/reingresos/create', [App\Http\Controllers\SancionController::class, 'mostrarFormularioReingreso'])->name('sancion.reingreso.create');
    Route::post('/sancion/{id}/reingresos/store', [App\Http\Controllers\SancionController::class, 'storeReingreso'])->name('sancion.reingreso.store');
});
