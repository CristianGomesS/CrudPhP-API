<?php

namespace App\Http\Controllers;

use App\Services\ServiceBook;
use App\Services\ServiceCategoryBook;
use Illuminate\Http\Request;

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
        /*   $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'publisher_id' => 'nullable|integer',
            'author_id' => 'nullable|integer',
            'book_details_id' => 'nullable', 
        ]); */
        $data = $request->all(); // Ou use $request->only(['titulo', 'publisher_id', 'author_id', 'book_details_id']);

        // Teste para ver o conteúdo da variável $categories
        $categories = $request->input('category');

        // Chama o serviço para criar o livro
        $book = $this->bookService->createBook($data);
        if ($book) {
            if (is_array($categories) && !empty($categories)) {
                // Verifique o conteúdo de $categories

                $book->category()->attach($categories);
            }

            return response()->json(['message' => 'Livro criado com sucesso'], 201);  // HTTP 201: Created
        }

        return response()->json(['message' => 'Erro ao criar livro'], 500);  // HTTP 500: Internal Server Error
    }
    public function show($id)
    {
        return $this->bookService->findBookById($id);
    }

    public function update($id, Request $request)
    {
        $book = $this->bookService->findBookById($id);
        
        if (!$book) {
            return response()->json(['message' => 'Livro não encontrado'], 404);  // HTTP 404: Not Found
        }
        $data = $request->all();
        /* com a validação dos canpos nao ta funcionando ainda nao sei o PQ  
        $data = $request->validate([
        'titulo' => 'sometimes|string|max:255',
        'publisher_id' => 'nullable|integer',
        'author_id' => 'nullable|integer',
        'book_details_id' => 'nullable',
         ]); */

        $categories = $request->input('category');

        // Chama o serviço para criar o livro
        $updated  = $this->bookService->updateBook($book, $data);
        if ($updated) {
            if (is_array($categories) && !empty($categories)) {
                // Verifique o conteúdo de $categories

                $book->category()->sync($categories);
               
                return response()->json($book, 200);
            }
            // HTTP 500: Internal Server Error
        }
    }
    public function destroy($book)
    {
        // Encontra o livro
        $book = $this->bookService->findBookById($book);
        $this->bookService->deleteBook($book);  // Deleta o livro chamando o serviço
        if ($book->is_delete == 0) {
            
        } else {
            return response()->json(['message' => 'Livro excluido com suceso'], 200);
        }
    }
}
