<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\financas;

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

Route::get('/', [financas::class, 'index']);
Route::get('/cadastrar',[financas::class, 'cadastrar']);
Route::post('/salvar', [financas::class, 'store']);
