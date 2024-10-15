<?php

namespace App\Services;

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
        return $this->bookRepository->getAll();
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
    public function detailBook($id)
    {
        return $this->bookRepository->find($id);
    }
}
