<?php

namespace App\Services;

use App\Repositories\AuthorRepository;


class ServiceAuthor
{
    protected $authorRepository;

    public function __construct(AuthorRepository $author)
    {
        $this->authorRepository = $author;
    }

    public function getAllAuthor()
    {
        return $this->authorRepository->getAll();
    }

    public function createAuthor($data)
    {
        return $this->authorRepository->create($data);
    }

    public function updateAuthor($author, $data)
    {
        return $this->authorRepository->update($author, $data);
    }

    public function deleteAuthor($author)
    {
        return $this->authorRepository->delete($author);

    }
    public function findAuthorById($id)
    {
        return $this->authorRepository->find($id);
    }
}
