<?php

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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // usuario
	
	Route::get('principal.users',[App\Http\Controllers\UserController::class, 'index'])->name('principal.users.index');
   // ->middleware('permission:principal.users.index');

    Route::get('principal.users/{user}',[App\Http\Controllers\UserController::class, 'show'])->name('principal.users.show');
    //->middleware('permission:principal.users.show');

    Route::get('principal.users.create',[App\Http\Controllers\UserController::class, 'create'])->name('principal.users.create');
    //->middleware('permission:principal.users.create');
    
    Route::post('principal.users.store',[App\Http\Controllers\UserController::class, 'store'])->name('principal.users.store');
    //->middleware('permission:principal.users.create');

    Route::get('principal.users/{user}/edit',[App\Http\Controllers\UserController::class, 'edit'])->name('principal.users.edit');
    //->middleware('permission:principal.users.edit');

    Route::put('principal.users/{user}',[App\Http\Controllers\UserController::class, 'update'])->name('principal.users.update');
    //->middleware('permission:principal.users.edit');

    Route::delete('principal.users/{user}',[App\Http\Controllers\UserController::class, 'destroy'])->name('principal.users.destroy');
    //->middleware('permission:principal.users.destroy');

});

