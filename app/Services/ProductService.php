<?php

namespace App\Services;

use  App\Repositories\ProductRepository;



class ProductService
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProduct()
    {
        return $product_list = $this->productRepository->get();
    }

    public function createProduct($inputs)
    {
        return $this->productRepository->create($inputs);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }

}
