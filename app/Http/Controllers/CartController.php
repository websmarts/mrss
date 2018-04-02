<?php

namespace App\Http\Controllers;

use App\Cartage;
use App\Location;
use App\Product;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('display_order', 'asc')->with('options')->get();
        $products = json_encode($products->toArray());

        $locations = Location::orderBy('suburb', 'asc')->get();
        $locations = $locations->toArray();
        array_unshift($locations, ['id' => 1000, 'suburb' => 'Unknown or other', 'postcode' => '', 'service_premium' => -1]);
        $locations = json_encode($locations);

        $cartageOptions = Cartage::all();
        $cartage = json_encode($cartageOptions->groupBy('cartage_type')->sortBy('module_count')->toArray());

        //return response()->json($products->toArray());

        //dd($products);
        return view("cart", compact("products", "locations", "cartage"));
    }
}
