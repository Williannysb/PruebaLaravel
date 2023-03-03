<?php

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
//Rutas de vehiculos
Route::get('/home', [App\Http\Controllers\VehiculoController::class, 'index'])->name('vehiculo.home');
Route::get('/vehiculo/create', [App\Http\Controllers\VehiculoController::class, 'create'])->name('vehiculo.create');
Route::post('/vehiculo/store', [App\Http\Controllers\VehiculoController::class, 'store'])->name('vehiculo.store');
Route::get('/marca/modelo/{id}', [App\Http\Controllers\VehiculoController::class, 'obtenerModelos'])->name('vehiculo.obtenerModelos');
Route::get('/vehiculo/edit/{id}', [App\Http\Controllers\VehiculoController::class, 'edit'])->name('vehiculo.edit');
Route::put('/vehiculo/update/{id}', [App\Http\Controllers\VehiculoController::class, 'update'])->name('vehiculo.update');
Route::delete('/vehiculo/destroy/{id}', [App\Http\Controllers\VehiculoController::class, 'destroy'])->name('vehiculo.destroy');

//Rutas de la marca
Route::get('/marca', [App\Http\Controllers\MarcaController::class, 'index'])->name('marca.marca');
Route::get('/marca/create', [App\Http\Controllers\MarcaController::class, 'create'])->name('marca.create');
Route::post('/marca/store', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Route::get('/marca/edit/{id}', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Route::put('/marca/update/{id}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Route::delete('/marca/destroy/{id}', [App\Http\Controllers\MarcaController::class, 'destroy'])->name('marca.destroy');

//Rutas de modelos
Route::get('/modelo', [App\Http\Controllers\ModeloController::class, 'index'])->name('modelo.modelo');
Route::get('/modelo/create', [App\Http\Controllers\ModeloController::class, 'create'])->name('modelo.create');
Route::post('/modelo/store', [App\Http\Controllers\ModeloController::class, 'store'])->name('modelo.store');
Route::get('/modelo/edit/{id}', [App\Http\Controllers\ModeloController::class, 'edit'])->name('modelo.edit');
Route::put('/modelo/update/{id}', [App\Http\Controllers\ModeloController::class, 'update'])->name('modelo.update');
Route::delete('/modelo/destroy/{id}', [App\Http\Controllers\ModeloController::class, 'destroy'])->name('modelo.destroy');

//Rutas de propietarios

Route::get('/propietario', [App\Http\Controllers\PropietarioController::class, 'index'])->name('propietario.propietario');
Route::get('/propietario/create', [App\Http\Controllers\PropietarioController::class, 'create'])->name('propietario.create');
Route::post('/propietario/store', [App\Http\Controllers\PropietarioController::class, 'store'])->name('propietario.store');
Route::get('/propietario/edit/{id}', [App\Http\Controllers\PropietarioController::class, 'edit'])->name('propietario.edit');
Route::put('/propietario/update/{id}', [App\Http\Controllers\PropietarioController::class, 'update'])->name('propietario.update');
Route::delete('/propietario/destroy/{id}', [App\Http\Controllers\PropietarioController::class, 'destroy'])->name('propietario.destroy');
