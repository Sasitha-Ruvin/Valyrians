<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductPageController extends Controller
{
    public function index()
    {
        // Fetch all products
        $products = Product::all();

        // Pass products to the view
        return view('product', compact('products'));
    }
}
