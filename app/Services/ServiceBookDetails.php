<?php

namespace App\Services;

use App\Repositories\BookDetailsRepository;

class ServiceBookDetails
{
    protected $bookDetailsRepository;

    public function __construct(BookDetailsRepository $bookDetails)
    {
        $this->bookDetailsRepository = $bookDetails;
    }

    public function getAllDetails()
    {
        return $this->bookDetailsRepository->getAll();
    }

    public function createDetails($data)
    {
        return $this->bookDetailsRepository->create($data);
    }

    public function updateDetails($details, $data)
    {
        return $this->bookDetailsRepository->update($details, $data);
    }

    public function deleteDetails($details)
    {
        return $this->bookDetailsRepository->delete($details);

    }
    public function findDetailsById($id)
    {
        return $this->bookDetailsRepository->find($id);
    }
}
