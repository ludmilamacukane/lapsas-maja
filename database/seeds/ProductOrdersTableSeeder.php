<?php

use App\ProductOrder;
use Illuminate\Database\Seeder;

class ProductOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductOrder::truncate();
    }
}
