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



Route::get('/moldes/listado/ok',[MoldesController::class,'ok']);
Route::get('/moldes/listado/nook',[MoldesController::class,'nook']);
Route::get('/moldes/listado/reparando',[MoldesController::class,'reparando']);
Route::get('/moldes/listado/desconocido',[MoldesController::class,'desconocido']);

Route::get('/moldes/buscar',[MoldesController::class,'buscar']);
Route::get('/acciones/nuevo',[AccionesController::class,'nuevo']);
Route::resource('moldes',MoldesController::class);
Route::resource('acciones',AccionesController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
