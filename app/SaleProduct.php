<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SaleProduct extends Pivot
{
	public $incrementing = true;
	
    protected $fillable = ['product_id', 'sale_id', 'quantity'];
}
