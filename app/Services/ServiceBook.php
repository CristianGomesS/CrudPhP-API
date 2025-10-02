<?php

namespace App\Services;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Repositories\bookRepository;

class ServiceBook
{
    protected $bookRepository;

    public function __construct(bookRepository $Book)
    {
        $this->bookRepository = $Book;
    }

    public function getAllBooks()
    {
        return  new BookCollection($this->bookRepository->getAll());
    }

    public function createBook($data)
    {
        return $this->bookRepository->create($data);
    }

    public function updateBook($book, $data)
    {
        return $this->bookRepository->update($book, $data);
    }

    public function deleteBook($book)
    {
        return $this->bookRepository->delete($book);

    }
    public function findBookById($id)
    {
        return  new BookResource($this->bookRepository->find($id));
    }
}
