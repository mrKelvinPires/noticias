<?php

//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\NoticiasController; -->

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/noticias', [NoticiasController::class, 'index']);
// Route::get('/noticias/create', [NoticiasController::class, 'create']);
// Route::post('/noticias', [NoticiasController::class, 'store']);
// Route::get('/noticias/{noticia}/edit', [NoticiasController::class, 'edit']);
// Route::put('/noticias/{noticia}', [NoticiasController::class, 'update']);
// Route::delete('/noticias/{noticia}', [NoticiasController::class, 'destroy']);

// Route::resource('noticias', NoticiasController::class);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiasController;


Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::middleware('auth')->group(function() {
    Route::resource('noticias', NoticiasController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
