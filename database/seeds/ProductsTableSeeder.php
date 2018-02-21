<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Storage Module seeds
        $product = Product::create([
            'product_group' => 'storage-module',
            'name' => 'Storage Module',
            'description' => 'Storage Module product description',
            'notes' => 'Storage Module product notes',
            'payment_period' => 'weekly',

        ]);

        // Create the product options
        $product->options()->create([
            'qty' => 1,
            'description' => 'Module X 1',
            'price' => 12.34,
            'display_order' => 1,
        ]);

        $product->options()->create([
            'qty' => 2,
            'description' => 'Module X 2',
            'price' => 24.56,
            'display_order' => 2,
        ]);

        // Removal module seeds
        $product = Product::create([
            'product_group' => 'removal-module',
            'name' => 'Removal Module',
            'description' => 'Removal Module product description',
            'notes' => 'Storage removal product notes',
            'payment_period' => 'weekly',

        ]);
        // Create the product options
        $product->options()->create([
            'qty' => 1,
            'description' => 'Module X 1',
            'price' => 12.34,
            'display_order' => 1,
        ]);

        $product->options()->create([
            'qty' => 2,
            'description' => 'Module X 2',
            'price' => 24.56,
            'display_order' => 2,
        ]);

        // Extras product seeds
        // Extra 1
        $product = Product::create([
            'product_group' => 'extra',
            'name' => 'Extra product 1',
            'description' => 'Extra product 1 description',
            'notes' => 'Extra product 1 product notes',
            'payment_period' => 'once off',
            'display_order' => 1,

        ]);
        $product->options()->create([
            'qty' => 1,
            'description' => 'Extra one description',
            'price' => 12.34,

        ]);
        // Extra 2
        $product = Product::create([
            'product_group' => 'extra',
            'name' => 'Extra product 2',
            'description' => 'Extra product 2 description',
            'notes' => 'Extra product 2 product notes',
            'payment_period' => 'once off',
            'display_order' => 2,

        ]);
        $product->options()->create([
            'qty' => 1,
            'description' => 'Extra two description',
            'price' => 12.34,
        ]);

        // Insurance seeds
        $product = Product::create([
            'product_group' => 'insurance',
            'name' => 'Insurance',
            'description' => 'Insurance product description',
            'notes' => 'Insurance product notes',
            'payment_period' => 'weekly',

        ]);

        // Create the product options
        $product->options()->create([
            'qty' => 1,
            'description' => '$5,000 cover',
            'price' => 12.34,
            'display_order' => 1,
        ]);

        $product->options()->create([
            'qty' => 2,
            'description' => '$10,000 cover',
            'price' => 24.56,
            'display_order' => 2,
        ]);

    }
}
