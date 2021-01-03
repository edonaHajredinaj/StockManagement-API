<?php

use App\Product;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
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
            'name' => "Dardha",
            'type' => "TeButa",
            'price' => "12.00",
        ]);

        Product::create([
        	'name' => "Molla",
        	'type' => "TeKuqe",
        	'price' => "15.00",
        ]);
    }
}
