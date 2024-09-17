<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FeaturedProductsController extends Controller
{
    public static function show()
    {
        // Fetch the latest 3 products
        $product = Product::latest()->take(3)->get();

        // Pass the products to the view
        return view('welcome', compact('product'));
    }
}