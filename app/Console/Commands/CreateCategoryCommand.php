<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class CreateCategoryCommand extends Command
{
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
        $name            = $this->argument('name');
        $parent_category = $this->argument('parent_category');

        $fk_category     = Category::find($parent_category);

        if($fk_category)
        {
            Category::create([
            'name'            => $name,
            'parent_category' => $parent_category,
            ]);

            return $this->info('category created');
        }
        else
        {
            return $this->info('parent category not found');
        }

    }
}
