@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <!-- Form Container -->
    <div class="flex justify-center">
        <div class="w-full md:w-6/12 bg-[#fef6eb] shadow-md rounded-lg overflow-hidden border border-gray-300">
            <!-- Form Header -->
            <div class="bg-[#fef6eb] p-6 border-b">
                <h2 class="text-3xl font-semibold text-center">Add Product</h2>
            </div>
            <!-- Form Body -->
            <div class="p-6">
                <form action="{{ url('product/save') }}" method="post" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <!-- Category Input -->
                    <div class="grid gap-2">
                        <label for="category" class="text-lg">Category</label>
                        <input type="text" name="category" id="category" class="border border-gray-400 px-4 py-2 w-full rounded-md">
                    </div>
                    <!-- Product Name Input -->
                    <div class="grid gap-2">
                        <label for="Product_Name" class="text-lg">Product Name</label>
                        <input type="text" name="Product_Name" id="Product_Name" class="border border-gray-400 px-4 py-2 w-full rounded-md">
                    </div>
                    <!-- Price Input -->
                    <div class="grid gap-2">
                        <label for="product_price" class="text-lg">Price</label>
                        <input type="number" name="product_price" id="product_price" class="border border-gray-400 px-4 py-2 w-full rounded-md">
                    </div>
                    <!-- Description Input -->
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
                    <div class="flex justify-center">
                        <input type="submit" value="Add" class="bg-black text-white px-6 py-2 rounded-md cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer Section -->
    <div class="mt-8 bg-[#fef6eb] p-8 text-center flex justify-between items-center">
        <!-- Footer Left - Logo and Address -->
        <div class="flex space-x-4 items-center">
            <img src="{{ asset('images/valyrian_logo.png') }}" alt="Valyrian Visions Logo" class="w-16 h-16">
            <div>
                <p>123/Main Street</p>
                <p>Main City</p>
                <p>0123-456-789</p>
                <p>example@mail.com</p>
            </div>
        </div>
        <!-- Footer Social Media Links -->
        <div class="flex space-x-4">
            <a href="#" class="text-xl"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-xl"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-xl"><i class="fab fa-whatsapp"></i></a>
        </div>
        <!-- Footer Navigation Links -->
        <div class="space-y-2 text-right">
            <p><a href="#">Home</a></p>
            <p><a href="#">About</a></p>
            <p><a href="#">Contact</a></p>
            <p><a href="#">Products</a></p>
            <p><a href="#">Commission</a></p>
        </div>
    </div>
</div>
@endsection
