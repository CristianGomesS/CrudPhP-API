<?php

namespace App\Http\Controllers;

use App\Services\ServiceBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\Return_;

class BookController extends Controller
{
    //
    protected $bookService;

    public function __construct(ServiceBook $serviceBook)
    {
        $this->bookService = $serviceBook;
    }

    public function index()
    {
        $book = $this->bookService->getAllBooks();
        return    response()->json($book, 200);
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'qtd_paginas' => 'required|integer',
            'editora' => 'required|string|max:255',
        ]);

        // Chama o serviço para criar o livro
        $book = $this->bookService->createBook($data);

        if ($book) {
            return response()->json(['message' => 'Livro criado com sucesso'], 201);  // HTTP 201: Created
        }

        return response()->json(['message' => 'Erro ao criar livro'], 500);  // HTTP 500: Internal Server Error
    }
    public function show($id)
    {
        return $this->bookService->detailBook($id);
    }

    public function update(Request $request, $id)
    {
        $book = $this->bookService->detailBook($id);
       
        $data = $request->all();

        if ($book) {

        $this->bookService->updateBook($book, $data);
        return response()->json(['message' => 'Livro Atualizado com sucesso'], 201);  // HTTP 201: Created
        }
        return response()->json(['message' => 'Livro não encontrado'], 404);  // HTTP 500: Internal Server Error
    }
    public function destroy($book)
    {
        // Encontra o livro
        $book = $this->bookService->detailBook($book);
        $this->bookService->deleteBook($book);  // Deleta o livro chamando o serviço
        if ($book->is_delete == 0) {
            return response()->json(['message' => 'Livro Restaurado'], 200);
        }else {
            return response()->json(['message' => 'Livro excluido com suceso'], 200);
        }
    }
}
