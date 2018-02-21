<?php

namespace App\Http\Controllers;

class AdminProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }
}
