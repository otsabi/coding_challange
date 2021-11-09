<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function get()
    {
        return Category::all();
    }

    public function create($name,$category)
    {
        $fk_category    = Category::find($category);

        if($fk_category)
        {
            Category::create([
            'name'            => $name,
            'parent_category' => $category,
            ]);

            return 'Category Created';
        }
        else
        {
            return 'Parent category not found';
        }
    }

    public function delete($id)
    {
        $category = Category::where('id',$id)->first();

        if($category){

            $category->delete();

            return 'Category Deleted';
        }
        else{
            return 'Category not found';
        }
    }
}
