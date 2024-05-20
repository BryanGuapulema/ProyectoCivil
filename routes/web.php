<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObraController;

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
//Era para llenar el formulario de obras pero ya me di cuenta que podia hacer eso en el crud
Route::middleware(['auth:sanctum', 'verified'])->get('/construction-form', function () {
    return view('obras.construction-form');
})->name('construction.form');

//OBRA
Route::resource('obras', ObraController::class);
