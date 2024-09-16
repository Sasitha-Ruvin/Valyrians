<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create(){
        return view('product.create');
    }

    public function save(Request $req){

        // Store the image
        $path = $req->file('product_image')->store('product_image','public');
    
        $fileUrl = Storage::url($path);
        
        // Insert product including category
        Product::create([
            'pro_name' => $req->input('Product_Name'), 
            'pro_price' => $req->input('product_price'),
            'description' => $req->input('description'),
            'pro_image_url' => $fileUrl,
            'pro_category' => $req->input('category') // Include category field
        ]);
    
        return redirect('/home');
    }
    

    public function index(){
        $product = Product::get();
        return view('product.index',['product' => $product]);
    }

    public function edit(Product $item){
       return view('product.edit', ['product'=>$item]);
    }

    public function update(Product $item, Request $request){
        // handle logic

        // store the file
        if($request->hasFile('product_image')){
            $path = $request->file('product_image')->store('product_images','public');
            $fileUrl = Storage::url($path);
        }else{
            $fileUrl = $item->pro_image_url;
        }

        $item->update([
            'pro_name'=>$request->input('Product_Name'),
            'pro_price'=>$request->input('product_price'),
            'pro_image_url'=>$fileUrl
        ]);

        return redirect('product/index');

    }

    public function delete(Request $request){
        Product::find($request->input('pro_id'))->delete();
        return redirect('product/index');
    }
}
