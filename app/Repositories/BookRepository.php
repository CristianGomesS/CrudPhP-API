<?php

namespace App\Repositories;

use App\Models\Book;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class BookRepository
{
    protected $bookRepository;

    public function __construct(Book $model)
    {
        $this->bookRepository = $model;
    }

    public function getAll()
    {
        $books = Book::where('is_delete', 0)->get();
        return $books;
    }

    public function  create($data)
    {

        return $this->bookRepository->create($data);
    }
    public function find($id)
    {
        return $this->bookRepository->findOrFail($id);
    }

    public function delete($book)
    {
        // Encontra o livro, incluindo os que já foram soft deleted
        // $book = $this->bookRepository->withTrashed()->findOrFail($id);

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
