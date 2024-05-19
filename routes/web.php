<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//Pagina de inicio
Route::get('/home',[HomeController::class,'index']);

//Paginas solo para admins
Route::get('/adminpage',[HomeController::class,'page'])->middleware(['auth','admin']);


//ESTUDIANTE
Route::middleware(['auth:sanctum', 'verified'])->get('/construction-form', function () {
    return view('obra.construction-form');
})->name('construction.form');
