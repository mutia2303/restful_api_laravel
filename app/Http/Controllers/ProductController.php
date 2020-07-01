<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function get()
    {
    	$data = Product::all();
    	return response()->json(
			[ 
				"message" => "Sukses",
				"data" => $data
		    ]
		);
    }

    function getById($id) 
    {
    	// $data = Product::find($id);
    	$data = Product::where('id', $id)->get();
    	return response()->json(
			[ 
				"message" => "Sukses",
				"data" => $data
		    ]
		);
    }

    function post(Request $request)
    {
    	$product = new Product;
    	$product->name = $request->name;
    	$product->price = $request->price;
    	$product->quantity = $request->quantity;
    	$product->active = $request->active;
    	$product->description = $request->description;
    	$product->save();
    	return response()->json(
			[ 
				"message" => "Sukses",
				"data" => $product
		    ]
		);
    }

    function put(Request $request, $id)
    {
    	$product = Product::where('id', $id)->first();
    	if ($product) {
    		$product->name = $request->name ? $request->name : $product->name;
	    	$product->price = $request->price ? $request->price : $product->price;
	    	$product->quantity = $request->quantity ? $request->quantity : $product->quantity;
	    	$product->active = $request->active ? $request->active : $product->active;
	    	$product->description = $request->description ? $request->description : $product->description;
	    	$product->save();
    		return response()->json(
				[ 
					"message" => "Sukses",
					"data" => $product
			    ]
			);
    	}
    	return response()->json(
			[ 
				"message" => "Gagal. Product dengan id " .$id. " tidak ditemukan"  
		    ], 
		    400
		);
    }

    public function delete($id)
    {
    	$product = Product::where('id', $id)->first();
    	if($product) {
    	    $product->delete();
    		return response()->json(
				[ 
					"message" => "Sukses"
			    ]
			);
    	}
    	return response()->json(
			[ 
				"message" => "Gagal. Product dengan id " .$id. " tidak ditemukan"  
		    ], 
		    400
		);
    }
}
