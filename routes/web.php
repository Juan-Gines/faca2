<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MoldesController;
use App\Http\Controllers\AccionesController;
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
Route::get('/moldes/listado/ok',[MoldesController::class,'ok'])->name('moldes.ok');
Route::get('/moldes/listado/nook',[MoldesController::class,'nook'])->name('moldes.nook');
Route::get('/moldes/listado/reparando',[MoldesController::class,'reparando'])->name('moldes.reparando');;
Route::get('/moldes/listado/desconocido',[MoldesController::class,'desconocido'])->name('moldes.desconocido');;
Route::get('/moldes/buscar',[MoldesController::class,'buscar'])->name('moldes.buscar');;

Route::get('/acciones/nuevo/{id}',[AccionesController::class,'nuevo'])->name('acciones.nuevo');
Route::post('/acciones/importar',[AccionesController::class,'importar'])->name('acciones.importar','id');
Route::get('/acciones/exportar/{id}',[AccionesController::class,'exportar'])->name('acciones.exportar');

Route::resource('moldes',MoldesController::class);
Route::resource('acciones',AccionesController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
