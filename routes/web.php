<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    //Usar los métodos del controlador en las rutas
    Route::resource('mascotas', MascotaController::class);
});

//Usar los metodos del controlador en las rutas
Route::resource('mascotas', MascotaController::class);

//Ruta para consultar la informacion de las mascotas
Route::get('mascota/{id}/edit', [
    MascotaController::class, 'edit'
]) -> name('mascotas.edit');

//Ruta para actualizar la información
Route::put('mascota/{id}', [
    MascotaController::class, 'update'
    
]) -> name('mascotas.update');

//USUARIOS

//Ruta para regresar la vista del formulario de registro
Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

//Ruta para registrar usuarios
Route::post('/registro',[
    AuthController::class, 'register'
])->name('registro.store');

//Ruta para regresar vista de inicio de sesión
Route::get('/acceso',[
    AuthController::class, 'loginForm'
])->name('acceso');

//Ruta para iniciar sesión
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

// Ruta para cerrar sesión
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', [
        AuthController::class,'adminDashboard'
    ])->name('admin-dashboard');
});
