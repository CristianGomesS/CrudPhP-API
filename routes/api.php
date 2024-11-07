<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DetailsController;
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

/* Route::get('/books', [BookController::class, 'index']);  // Listar todos os livros
Route::post('/books', [BookController::class, 'store']);  // Criar um novo livro
Route::get('/books/{id}', [BookController::class, 'show']);  // Mostrar detalhes de um livro específico
Route::put('/books/{id}', [BookController::class, 'update']);  // Atualizar um livro existente
Route::delete('/books/{id}', [BookController::class, 'destroy']);  // Excluir um livro
 */
Route::resource('books',BookController::class); 
Route::resource('details',DetailsController::class); 
