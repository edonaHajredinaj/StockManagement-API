<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all()
    {
        return Product::all();
    }
 
    public function get($id)
    {
        return Product::find($id);
    }

    public function store(Request $request)
    {
        $product = new Product();
		$product->name = $request->name;
		$product->type = $request->type;
		$product->price = $request->price;

	    $product->save();

	    return $product;
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

		if($request->has('name')){
	    	$product->name = $request->name;
	    }
	    if($request->has('type')){
	    	$product->type = $request->type;
	    }
	    if($request->has('price')){
	    	$product->price = $request->price;
	    }
		
	    $product->update();

	    return $product;
    }

    public function delete(Request $request, $id)
    {
        Product::find($id)->delete();

    	return 204;
    }
}