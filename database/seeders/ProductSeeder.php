<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_products = [
            ['id' => 1, 'category_id' => 2, 'name' => 'Argan Oil', 'description' =>'test', 'price' =>232, 'image' => 'product1.jpg'],
            ['id' => 2, 'category_id' => 1, 'name' => 'Argan Savon', 'description' => 'test', 'price' => 276, 'image' => 'product2.jpg'],
            ['id' => 3, 'category_id' => 1, 'name' => 'Argan Oil Shampoo', 'description' => 'test', 'price' => 736, 'image' => 'product3.jpg']
        ];
        \DB::table('product')->insert($data_products);
    }
}
