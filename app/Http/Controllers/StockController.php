<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function all()
    {
        return Stock::all();
    }
 
    public function get($id)
    {
        return Stock::find($id);
    }

    public function store(Request $request)
    {
        $stock = new Stock();
		$stock->product_id = $request->product_id;
		$stock->quantity = $request->quantity;

	    $stock->save();

	    return $stock;
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);

		if($request->has('product_id')){
	    	$stock->product_id = $request->product_id;
	    }
	    if($request->has('quantity')){
	    	$stock->quantity = $request->quantity;
	    }
		
	    $stock->update();

	    return $stock;
    }

    public function delete(Request $request, $id)
    {
        Stock::find($id)->delete();

    	return 204;
    }
}