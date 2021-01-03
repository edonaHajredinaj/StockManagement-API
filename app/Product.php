<?php

namespace App;

use App\Sale;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'type', 'price'];

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_product');
    }
}
