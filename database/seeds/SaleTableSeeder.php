<?php

use App\Sale;

use Illuminate\Database\Seeder;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::truncate();

        Sale::create([
                'total_price' => "27.00",
            ]);
    }
}
