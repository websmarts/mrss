<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductGroup;
use App\ProductOption;

class AdminProductsController extends Controller
{
    public function index()
    {
        $productGroups = ProductGroup::all();

        $products = Product::with('options')->get(); // OrderBy prodct option display_order??

        return view('admin.products.index', compact('products', 'productGroups'));
    }

    public function edit($productId)
    {
        if (!$product = Product::find($productId)) {
            $product = new Product;
        }

        $productGroups = ProductGroup::all();

        //dd($product);
        return view('admin.products.edit', compact('product', 'productGroups'));
    }

    public function update($productId)
    {
        if (!$product = Product::find($productId)) {
            $product = new Product;
        }

        $product->name = request()->name;
        $product->notes = request()->notes;
        $product->payment_period = request()->payment_period;
        $product->product_group = request()->product_group;
        $product->display_order = request()->display_order;
        $product->image_path = request()->image_path;

        $product->save();

        // Update Product Options
        $options = collect(request()->options);
        foreach ($options as $id => $data) {

            // new option to add
            if ($id < 1 && $data['qty'] > 0) {
                $product->options()->create([
                    'qty' => $data['qty'],
                    'price' => $data['price'],
                    'description' => $data['description'],
                ]);
            }

            // update existing option
            if ($id > 0) {

                $productOption = ProductOption::find($id);

                if ($data['qty'] < 1) {

                    $productOption->delete();

                } else {

                    $productOption->update([
                        'qty' => $data['qty'],
                        'description' => $data['description'],
                        'price' => $data['price'],
                    ]);

                }
            }

        }
        flash('Product has been updated');
        return redirect()->back();
    }
}
