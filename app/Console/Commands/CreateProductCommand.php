<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Console\Command;

class CreateProductCommand extends Command
{
    protected $productService;
    public function __construct(ProductService $productService)

    {
        $this->productService = $productService;
        parent::__construct();
    }
    protected $signature = 'product:create {name} {description} {price} {category_id} {image?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Product';

    /**
     * Create a new command instance.
     *
     * @return void
     */


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $inputs = array();
        $inputs['name']        = $this->argument('name');
        $inputs['description'] = $this->argument('description');
        $inputs['price']       = $this->argument('price');
        $inputs['category_id'] = $this->argument('category_id');
        $inputs['image']       = $this->argument('image') ?? '';


        $response =  $this->productService->createProduct($inputs);

        return $this->info($response);
    }
}
