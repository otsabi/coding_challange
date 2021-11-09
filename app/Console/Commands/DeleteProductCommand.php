<?php

namespace App\Console\Commands;

use App\Services\ProductService;
use Illuminate\Console\Command;

class DeleteProductCommand extends Command
{
    protected $productService;
    public function __construct(ProductService $productService)

    {
        $this->productService = $productService;
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'product:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Product';

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
        $id  = $this->argument('id');

        $response =  $this->productService->deleteProduct($id);

        return $this->info($response);

    }
}
