<?php

namespace App\Http\Controllers;
use App\Http\Requests\bookStoreUpdadeFormRequest;
use App\Services\ServiceBook;
use Illuminate\Http\Request;
use App\Notifications\BookCreateNotification;
use Illuminate\Support\Facades\Notification;

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

    public function store(bookStoreUpdadeFormRequest $request)
    {
  
        $data = $request->validated();

        $categories = $request->input('category');
        $book = $this->bookService->createBook($data);
        if ($book) {
            if (is_array($categories) && !empty($categories)) {
                $book->category()->attach($categories);
               
                if ($book) {
                    Notification::route('mail', 'crusophpdma@gmail.com')
                        ->notify(new BookCreateNotification($book));
                }
            }

            return response()->json(['message' => 'Livro criado com sucesso'], 201); 
        }

        return response()->json(['message' => 'Erro ao criar livro'], 500); 
    }
    public function show($id)
    {
        return $this->bookService->findBookById($id);
    }

    public function update($id, bookStoreUpdadeFormRequest $request)
    {
        $book = $this->bookService->findBookById($id);

        if (!$book) {
            return response()->json(['message' => 'Livro não encontrado'], 404); 
        }
        $data = $request->validated();


        $categories = $request->input('category');

        $updated  = $this->bookService->updateBook($book, $data);
        if ($updated) {
            if (is_array($categories) && !empty($categories)) {

                $book->category()->sync($categories);

                return response()->json($book, 200);
            }
        }
    }
    public function destroy($book)
    {
        $book = $this->bookService->findBookById($book);
        $this->bookService->deleteBook($book); 
        if ($book->is_delete == 0) {
        } else {
            return response()->json(['message' => 'Livro excluido com suceso'], 200);
        }
    }
}
