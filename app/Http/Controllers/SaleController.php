<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use App\SaleProduct;
use App\Stock;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function all()
    {
        return Sale::with('products')->get();
    }
 
    public function get($id)
    {
        return Sale::with('products')
        		->where('id',$id)
        		->get()
        		->each(function($sale){
				    $sale->products->map(function($product){
				        $product->quantity = $product->pivot->quantity;
				        unset($product->pivot);
				        return $product;
				    });
				});
    }

    public function store(Request $request)
    {
        $sale = new Sale();
		$sale->total_price = $request->total_price;
		$sale->save();

		foreach ($request->products as $product) {
			$saleProduct = new SaleProduct();
			$saleProduct->sale_id = $sale->id;
			$saleProduct->product_id = $product['id'];
			$saleProduct->quantity = $product['quantity'];

	    	$saleProduct->save();

       		$stock = Stock::where('product_id', $product['id'])->get()->first();
       		$stock->quantity = $stock->quantity - $product['quantity'];
       		$stock->save();
		}

	    return $this->get($sale->id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

		$sale = Sale::findOrFail($id);
		if($request->has('total_price')){
			$sale->total_price = $request->total_price;
			$sale->update();
	    }

		foreach ($request->products as $product) {
			$saleProduct = SaleProduct::where('product_id', $product['id'])
				->where('sale_id', $id)->first();

			$startingQuantity = $saleProduct->quantity;
			$saleProduct->quantity = $product['quantity'];
	    	$saleProduct->save();

       		$stock = Stock::where('product_id', $product['id'])->get()->first();
       		$stock->quantity = $stock->quantity + $startingQuantity - $product['quantity'];
       		$stock->update();
		}

	    return $this->get($sale->id);
    }

    public function delete(Request $request, $id)
    {
        Sale::find($id)->delete();

        $saleProducts = SaleProduct::where('sale_id', $id)->get();
        foreach ($saleProducts as $saleProduct) {
        	$saleProduct->delete();

        	$stock = Stock::where('product_id', $saleProduct->product_id)->get()->first();
        	$stock->quantity = $stock->quantity + $saleProduct->quantity;
        	$stock->update();
        }

    	return 204;
    }
}