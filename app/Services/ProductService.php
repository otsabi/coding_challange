<?php

namespace App\Services;

use  App\Repositories\ProductRepository;



class ProductService
{
    protected $ProductRepository;
    public function __construct(ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }
    public function getProduct()
    {
        return $product_list = $this->ProductRepository->get();
    }
    public function addProduct($inputs)
    {
        return $this->ProductRepository->add($inputs);
    }
}
