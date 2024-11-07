<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Category;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class BookRepository
{
    protected $bookModel;

    public function __construct(Book $model)
    {
        $this->bookModel = $model;
    }

    public function getAll()
    {
       /*  $books = Book::where('is_delete', 0)->get();
        return $books; */
       /*  Book::with('author')->get(); */
        
       try {
            return Book::where('is_delete', 0)
                       ->with(['publisher', 'author', 'bookDetails', 'category'])
                       ->get();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar livros: ' . $e->getMessage()], 500);
        } 
    }

    public function  create($data)
    {   

        return $this->bookModel->create($data);
    }
    public function find($id)
    {
        try {
            return Book::where('id', $id)
                       ->with(['publisher', 'author', 'bookDetails', 'category'])
                       ->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar livro: ' . $e->getMessage()], 500);
        } 
   
    }

    public function delete($book)
    {
        // Encontra o livro, incluindo os que já foram soft deleted
        // $book = $this->bookModel->withTrashed()->findOrFail($id);

        //$book = Book::findOrFail($book);
        if (is_null($book)) {
            return response()->json(['mensagem' => ' livro não existe']);
        }
        // Verifica se o registro já foi excluído logicamente (soft delete)
        if ($book->is_delete == 0) {
            // Se já foi deletado logicamente, deletar permanentemente
            $book->is_delete = 1;
        } else {
            // Se ainda não foi deletado logicamente, realizar soft delete
            $book->is_delete = 0;
        }

        $book->save();

        return $book;
    }
    public function update($book, $data)
    {
        //dd(array_merge($data, ["id" => $id]));

        if (is_null($book)) {
            return response()->json(['mensagem' => ' livro não existe']);
        }
        return $book->update($data);
    }
}
