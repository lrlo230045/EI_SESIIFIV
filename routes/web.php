<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\InscripcionController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/auth');
});

Route::get('/auth', [AuthController::class, 'index'])->name('auth');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas protegidas (usuarios autenticados y activos)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','active'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ================================
    // INSCRIPCIONES
    // ================================

    Route::post('/inscribirse/{id}', [InscripcionController::class, 'inscribirse'])
        ->name('inscribirse');

    Route::post('/cancelar/{id}', [InscripcionController::class, 'cancelar'])
        ->name('cancelar');

    // ================================
    // VISTAS USUARIO
    // ================================

    Route::get('/talleres-disponibles', [TallerController::class, 'userView'])
        ->name('talleres.user');

    Route::get('/mis-talleres', [TallerController::class, 'misTalleres'])
        ->name('talleres.mis');

    /*
    |--------------------------------------------------------------------------
    | Rutas SOLO ADMIN
    |--------------------------------------------------------------------------
    */

    Route::middleware('admin')->group(function () {

        Route::get('/admin', function () {
            return view('dashboard'); // puedes cambiarlo luego
        });

        // ================================
        // CRUD USUARIOS
        // ================================

        Route::get('/users', [UserController::class, 'index'])->name('users.index');

        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');

        Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');

        // ================================
        // CRUD TALLERES
        // ================================

        Route::get('/talleres', [TallerController::class,'index'])->name('talleres.index');

        Route::get('/talleres/create', [TallerController::class,'create'])->name('talleres.create');
        Route::post('/talleres/store', [TallerController::class,'store'])->name('talleres.store');

        Route::get('/talleres/edit/{id}', [TallerController::class,'edit'])->name('talleres.edit');
        Route::post('/talleres/update/{id}', [TallerController::class,'update'])->name('talleres.update');

        Route::get('/talleres/delete/{id}', [TallerController::class,'destroy'])->name('talleres.delete');

    });

});