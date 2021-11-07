<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CreateProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name        = $this->argument('name');
        $description = $this->argument('description');
        $price       = $this->argument('price');
        $category_id = $this->argument('category_id');
        $image       = $this->argument('image') ?? '';

        Product::create([
            'name'        => $name,
            'description' => $description,
            'price'       => $price,
            'category_id' => $category_id,
            'image'       => $image,
        ]);

        return $this->info('product created');
    }
}
