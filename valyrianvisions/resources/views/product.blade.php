@extends('layouts.app')

@section('content')
<script>
    const cartBtn = document.getElementById('cart-button');
</script>
<div class="bg-[#f9f3eb] min-h-screen">
    <!-- Hero Section -->
    <div class="relative">
        <img src="{{ asset('images/valyrianvisions.jpg') }}" class="w-full h-96 object-cover" alt="Banner">
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
            <h1 class="text-6xl font-bold">Arts & Posters</h1>
            <p class="text-2xl mt-2">Own a Unique Work of Art</p>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="container mx-auto py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $pro)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden cursor-pointer" 
                     onclick="openProductModal('{{ $pro->pro_name }}', '{{ $pro->pro_image_url }}', '{{ $pro->description }}', '{{ $pro->pro_price }}', '{{ $pro->id }}')"> <!-- Updated with pro.id -->
                    <img src="{{ $pro->pro_image_url }}" alt="{{ $pro->pro_name }}" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2">{{ $pro->pro_name }}</h2>
                        <p class="text-gray-700">{{ $pro->description }}</p>
                        <div class="mt-4 text-lg font-semibold text-gray-900">${{ $pro->pro_price }}</div>
                        <div class="flex justify-between items-center mt-4">
                            <button class="bg-[#5e4585] text-white px-4 py-2 rounded hover:bg-[#4d3a6f]">
                                Add to Cart
                            </button>
                            <button class="text-black text-2xl">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <p>No products available.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Modal -->
<div id="productModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
    <div class="bg-white rounded-lg w-full max-w-2xl mx-auto p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold" id="modalProductName"></h2>
            <button id="closeModal" class="text-gray-500 text-2xl">&times;</button>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <img id="modalProductImage" class="w-full h-64 object-cover" alt="Product Image">
            <div>
                <p class="text-gray-700" id="modalProductDescription"></p>
                <p class="text-xl font-semibold mt-2">Price: <span id="modalProductPrice"></span></p>
                <div class="flex space-x-2 mt-4">
                    <button class="bg-green-600 text-white px-4 py-2 rounded">Add to Wishlist</button>
                    <form action="{{ url('cart/save') }}" method="post" class="bg-black text-white px-4 py-2 rounded items-center justify-center">
                        @csrf
                        <input type="hidden" id="pro_id" name="pro_id" value=""> <!-- Correctly set the value dynamically -->
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to open the product modal and fill in the details
    function openProductModal(name, imageUrl, description, price, pro_id) {
        document.getElementById('modalProductName').textContent = name;
        document.getElementById('modalProductImage').src = imageUrl;
        document.getElementById('modalProductDescription').textContent = description;
        document.getElementById('modalProductPrice').textContent = `$${price}`;
        document.getElementById('pro_id').value = pro_id; // Correctly setting the value of pro_id
        
        document.getElementById('productModal').classList.remove('hidden');
    }

    // Function to close the modal
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('productModal').classList.add('hidden');
    });

    // Close the modal if the background is clicked
    window.addEventListener('click', function(event) {
        if (event.target === document.getElementById('productModal')) {
            document.getElementById('productModal').classList.add('hidden');
        }
    });
</script>
@endsection
