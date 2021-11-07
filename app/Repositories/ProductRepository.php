<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository
{
    public function get()
    {
        $data = array();

        $data['products'] = Product::with('category')->get();

        $data['categorys'] = Category::all();

        return $data;
    }
    public function add($inputs)
    {

            $filenameExt = $inputs['file']->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $inputs['file']->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $inputs['file']->storeAs('public/Product', $fileNameToStore);


            Product::create([
                'name'        => $inputs['name'],
                'description' => $inputs['description'],
                'price'       => $inputs['price'],
                'category_id' => $inputs['category_id'],
                'image'       => $fileNameToStore,
            ]);

        return true;
    }
}
