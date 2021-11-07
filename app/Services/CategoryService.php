<?php

namespace App\Services;


use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $CategoryRepository;
    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }

    public function getCategory()
    {
        return $category_list = $this->CategoryRepository->get();
    }

}
