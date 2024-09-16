@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-100 p-4 border-b">
                <h2 class="text-lg font-semibold">{{ __('Dashboard') }}</h2>
            </div>
            <div class="p-4">
                <h2 class="text-2xl font-bold mb-4">Edit Product</h2>
            </div>
            <div class='grid gap-2'>
                <form action="{{url ('product/update/'.$product->id)}}" method="post" enctype="multipart/form-data" class="grid grid-col">
                @csrf
                    <div class="grid gap-2">
                         <label for="Product_Name">Product Name</label>
                        <input type="text" name="Product_Name" id='product-price' class="border border-1 " value="{{$product->pro_name}}">
                    </div>
                    <div>
                        <label for="product_price">Price</label>
                        <input type="number" name="product_price" id='product_price' class='border border-1' value="{{$product->pro_price}}"">
                    </div>
                    <div>
                        <label for="product_image">Product Image</label>
                        <input type="file" name="product_image" id='product_image' class='border border-1'>
                    </div>
                    <input type="submit" class='border border-1'>
                </form>   
                <div class="col-span-2 flex flex-col justify-center m-auto">
                    <img src="{{ url($product->pro_image_url)}}" alt="IMG" class="h-[10em]">
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
