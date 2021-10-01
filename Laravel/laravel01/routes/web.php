<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;

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
// chamada do controller
use App\Http\Controllers\EventController;
use App\Http\Controllers\testeController;

// utilização do controller que deseja utilizar
Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);

Route::get("/contatos", function(){

    // pega os dados dos parametros da url
    $busca = request('search');

   return view("contatos",['busca' => $busca]);
});

Route::get('/contato/{id?}', function($id = null){
    return view("contato",['id'=> $id]);
});

Route::get("/admin", [testeController::class,'admin']);


Route::get("/ferramentas", [testeController::class,'setup']);