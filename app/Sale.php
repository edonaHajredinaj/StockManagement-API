<?php

namespace App;

use App\Product;
use App\SaleProduct;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['total_price'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_product')->using(SaleProduct::class)->withPivot('quantity');
    }
}
