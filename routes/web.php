<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\RubroM2Controller;
use App\Http\Controllers\RubroM3Controller;
use App\Http\Controllers\RubroPTSController;
use App\Http\Controllers\ObreroController;
use App\Http\Controllers\RubroKGController;

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


//RUBROM2
Route::resource('rubros_m2', RubroM2Controller::class);
Route::get('rubros_m2/create/{obra_id}', [RubroM2Controller::class, 'create'])->name('rubros_m2.create');

//RUBROM3
Route::resource('rubros_m3', RubroM3Controller::class);
Route::get('rubros_m3/create/{obra_id}', [RubroM3Controller::class, 'create'])->name('rubros_m3.create');


//RUBROPTS
Route::resource('rubros_pts', RubroPTSController::class);
Route::get('rubros_pts/create/{obra_id}', [RubroPTSController::class, 'create'])->name('rubros_pts.create');



//RUBROKG
Route::resource('rubros_kg', RubroKGController::class);
Route::get('rubros_kg/create/{obra_id}', [RubroKGController::class, 'create'])->name('rubros_kg.create');


//InfoObreros
//Route::resource('obreros', ObreroController::class);

