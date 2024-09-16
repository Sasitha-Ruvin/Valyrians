@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full md:w-6/12 bg-[#fef5e7] shadow-md rounded-lg overflow-hidden border border-gray-300">
            <div class="bg-[#fef5e7] p-6">
                <h2 class="text-3xl font-bold text-center mb-6">Edit Product</h2>
                <form action="{{ url('product/update/'.$product->id) }}" method="post" enctype="multipart/form-data" class="grid gap-4">
                    @csrf

                    <!-- Category Field -->
                    <div class="grid gap-2">
                        <label for="category" class="text-lg">Category</label>
                        <input type="text" name="category" id="category" class="border border-gray-400 px-4 py-2 w-full rounded-md">
                    </div>

                    <!-- Product Name Field -->
                    <div class="grid gap-2">
                        <label for="Product_Name" class="text-lg">Product Name</label>
                        <input type="text" name="Product_Name" id="Product_Name" value="{{ $product->pro_name }}" class="border border-gray-400 px-4 py-2 w-full rounded-md">
                    </div>

                    <!-- Price Field -->
                    <div class="grid gap-2">
                        <label for="product_price" class="text-lg">Price</label>
                        <input type="number" name="product_price" id="product_price" value="{{ $product->pro_price }}" class="border border-gray-400 px-4 py-2 w-full rounded-md">
                    </div>

                    <!-- Description Field -->
                    <div class="grid gap-2">
                        <label for="description" class="text-lg">Description</label>
                        <textarea name="description" id="description" rows="5" class="border border-gray-400 px-4 py-2 w-full rounded-md"></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="grid gap-2">
                        <label for="product_image" class="text-lg">Images</label>
                        <input type="file" name="product_image" id="product_image" class="border border-gray-400 px-4 py-2 w-full rounded-md">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center mt-4">
                        <input type="submit" value="Save" class="bg-black text-white px-6 py-2 rounded-md hover:bg-gray-700 transition">
                    </div>
                </form>

                <!-- Image Preview -->
                <div class="flex justify-center mt-4">
                    <img src="{{ url($product->pro_image_url) }}" alt="Product Image" class="h-[10em] rounded-md">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
