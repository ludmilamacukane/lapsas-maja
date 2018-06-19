<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        Product::create([
            'name'        => 'Šokolādes braunijs',
            'description' => '1 gabals',
            'price'       => 9.99
        ]);
        Product::create([
            'name'        => 'Siera kuka',
            'description' => '1 gabals',
            'price'       => 15.00
        ]);
    }
}
