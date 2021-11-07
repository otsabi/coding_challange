<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class DeleteCategoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Category';

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
        $id  = $this->argument('id');

        $category = Category::where('id',$id)->first();

        if($category){

            $category->delete();

            return $this->info('category deleted');
        }
        else{
            return $this->info('category not found');
        }

    }
}
