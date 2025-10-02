<?php

namespace App\Services;

use App\Repositories\CategoryRepository;


class ServiceCategory
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $category)
    {
        $this->categoryRepository = $category;
    }

    public function getAllCategory()
    {
        return $this->categoryRepository->getAll();
    }

    public function createCategory($data)
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory($Category, $data)
    {
        return $this->categoryRepository->update($Category, $data);
    }

    public function deleteBook($Category)
    {
        return $this->categoryRepository->delete($Category);

    }
    public function findCategoryById($id)
    {
        return $this->categoryRepository->find($id);
    }
}
