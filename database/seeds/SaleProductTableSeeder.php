<?php

use App\SaleProduct;

use Illuminate\Database\Seeder;

class SaleProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SaleProduct::truncate();

        SaleProduct::create([
                'product_id' => 1,
                'sale_id' => 1,
                'quantity' => 35,
        ]);

        SaleProduct::create([
                'product_id' => 2,
                'sale_id' => 1,
                'quantity' => 2,
        ]);
    }
}
