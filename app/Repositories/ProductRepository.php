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
    public function create($inputs)
    {
        if(isset($inputs['file']))
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
        }
        else{
            Product::create([
                'name'        => $inputs['name'],
                'description' => $inputs['description'],
                'price'       => $inputs['price'],
                'category_id' => $inputs['category_id'],
                'image'       => $inputs['image'],
            ]);
            
            return 'Product Created';
        }
    }

    public function delete($id)
    {
        $product = Product::where('id',$id)->first();

        if($product){

            $product->delete();

            return 'Product Deleted';
        }
        else{
            return 'Product not found';
        }
    }
}
