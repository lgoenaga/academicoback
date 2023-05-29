<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\Curso_EstudianteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::group(['middleware' => ['auth']], function () {});

Route::post('login', [LoginController::class, 'check']);
Route::post('register', [RegisterController::class, 'store']);

Route::resource('estudiantes', EstudianteController::class);
Route::resource('users', UserController::class);
Route::resource('cursos', CursoController::class);
Route::resource('cursos_estudiantes', Curso_EstudianteController::class);
