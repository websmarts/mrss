<?php

namespace App\Http\Controllers;

use App\Location;
use App\Product;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('display_order', 'asc')->with('options')->get();
        $products = json_encode($products->toArray());

        $locations = Location::orderBy('suburb', 'asc')->get();
        $locations = json_encode($locations->toArray());

        //return response()->json($products->toArray());

        //dd($products);
        return view("cart", compact("products", "locations"));
    }
}
