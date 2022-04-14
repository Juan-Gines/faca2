<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoldesController;
use App\Http\Controllers\AccionesController;
use App\Http\Controllers\ReferenciasController;
use App\Http\Controllers\MaquinasController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProduccionesController;
use App\Http\Controllers\MermasController;
use Illuminate\Notifications\Action;

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


Route::get('/moldes/guardar',[MoldesController::class,'import'])->name('moldes.guardar');
Route::get('/moldes/directorio',[MoldesController::class,'directorio'])->name('moldes.directorio');
Route::get('moldes/savedata',[MoldesController::class,'export'])->name('moldes.savedata');

Route::get('/acciones/nuevo/{referencia}',[AccionesController::class,'nuevo'])->name('acciones.nuevo');
Route::post('/acciones/importar',[AccionesController::class,'importar'])->name('acciones.importar','id');
Route::get('/acciones/exportar/{id}',[AccionesController::class,'exportar'])->name('acciones.exportar');

Route::get('/referencias/listado/ok',[ReferenciasController::class,'ok'])->name('referencias.ok');
Route::get('/referencias/listado/nook',[ReferenciasController::class,'nook'])->name('referencias.nook');
Route::get('/referencias/listado/reparando',[ReferenciasController::class,'reparando'])->name('referencias.reparando');;
Route::get('/referencias/listado/desconocido',[ReferenciasController::class,'desconocido'])->name('referencias.desconocido');;
Route::get('/referencias/buscar',[ReferenciasController::class,'buscar'])->name('referencias.buscar');
Route::get('/referencias/directorio',[ReferenciasController::class,'directorio'])->name('referencias.directorio');;
Route::get('/referencias/exportar',[ReferenciasController::class,'exportar'])->name('referencias.exportar');


Route::get('/maquinas/buscar',[MaquinasController::class,'buscar'])->name('maquinas.buscar');

Route::get('/pedidos/buscar',[PedidosController::class,'buscar'])->name('pedidos.buscar');

Route::get('/producciones/nuevo/{id}',[ProduccionesController::class,'nuevo'])->name('producciones.nuevo');

Route::get('/mermas/nuevo/{id}',[MermasController::class,'nuevo'])->name('mermas.nuevo');

Route::get('/produccion/show',function(){
    return view('produccion.show');
})->name('produccion.show');



Route::resource('referencias',ReferenciasController::class);
Route::resource('moldes',MoldesController::class);
Route::resource('acciones',AccionesController::class)->parameters(['acciones'=>'accion']);
Route::resource('maquinas',MaquinasController::class);
Route::resource('pedidos',PedidosController::class);
Route::resource('producciones',ProduccionesController::class);
Route::resource('mermas',MermasController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
