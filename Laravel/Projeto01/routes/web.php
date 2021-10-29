<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clubController;

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

Route::get('/', [clubController::class, 'index' ]);
Route::post('/', [clubController::class, 'salvarDados']);
Route::get('/editar/{id}',[clubController::class, 'mostrar']);
Route::put('/update/{id}',[clubController::class, 'editar']);