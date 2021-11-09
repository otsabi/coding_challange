<?php

namespace App\Services;


use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategory()
    {
        return $category_list = $this->categoryRepository->get();
    }

    public function createCategory($name,$category)
    {
        return  $this->categoryRepository->create($name,$category);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }

}
