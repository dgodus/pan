<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PermisoRoleController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\TrabajoDetalleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentaDetalleController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dash');

Route::get('/dash/crud', function () {
    return view('crud.ventas');
});
Route::get('/dash/hola', function () {
    return view('crud.hola');
});
Route::get('/dash/crud/ventadetalle', function () {
    return view('crud.ventadetalle');
});


Route::resource('asistencia', AsistenciaController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('permiso', PermisoController::class);
Route::resource('PermisoRole', PermisoRoleController::class);
Route::resource('producto', ProductoController::class);
Route::resource('role', RoleController::class);
Route::resource('trabajador', TrabajadorController::class);
Route::resource('trabajodetalle', TrabajoDetalleController::class);
Route::resource('user', UserController::class);
Route::resource('venta', VentaController::class);
Route::resource('ventadetalle', VentaDetalleController::class);