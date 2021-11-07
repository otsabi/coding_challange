<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_category = [
            ['id' => 1, 'name' => 'Argan'],
            ['id' => 2, 'name' => 'Argan Oil']        ];
        \DB::table('category')->insert($data_category);
    }
}
