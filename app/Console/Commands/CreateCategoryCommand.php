<?php

namespace App\Console\Commands;

use App\Services\CategoryService;
use Illuminate\Console\Command;

class CreateCategoryCommand extends Command
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'category:create {name} {parent_category?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Category';

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
        $name            = $this->argument('name');
        $parent_category = $this->argument('parent_category');

        $response =  $this->categoryService->createCategory($name,$parent_category);

        return $this->info($response);

    }
}
