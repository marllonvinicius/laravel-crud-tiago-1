<?php

use App\Http\Controllers\CursoController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('cursos/destroy/{curso_id}', [CursoController::class, 'destroy'])->name('cursos.destroy');
Route::get('cursos/edit/{curso_id}', [CursoController::class, 'edit'])->name('cursos.edit');
Route::put('cursos/update/{curso_id}', [CursoController::class, 'update'])->name('cursos.update');
