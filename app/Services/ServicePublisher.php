<?php

namespace App\Services;

use App\Repositories\PublisherRepository;


class ServicePublisher
{
    protected $publisherRepository;

    public function __construct( PublisherRepository $publisher)
    {
        $this->publisherRepository = $publisher;
    }

    public function getAllPublisher()
    {
        return $this->publisherRepository->getAll();
    }

    public function createPublisher($data)
    {
        return $this->publisherRepository->create($data);
    }

    public function updatePublisher($publisher, $data)
    {
        return $this->publisherRepository->update($publisher, $data);
    }

    public function deletePublisher($publisher)
    {
        return $this->publisherRepository->delete($publisher);

    }
    public function findPublisherById($id)
    {
        return $this->publisherRepository->find($id);
    }
}
