@extends('layouts.app')

@section('content')
<div class="container mx-auto my-10">
    <!-- Cart Summary -->
    <div class="bg-beige p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-center mb-8">Cart Summary</h1>

        @forelse($cartItems as $cartItem)
            <!-- Single Cart Item -->
            <div class="bg-white rounded-lg shadow p-6 flex justify-between items-center mb-4">
                <div class="flex items-center space-x-4">
                    <div class="bg-gray-300 w-24 h-24">
                        <img src="{{ $cartItem->product->pro_image_url }}" alt="{{ $cartItem->product->pro_name }}" class="w-full h-full object-cover"> <!-- Dynamic image -->
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold">{{ $cartItem->product->pro_name }}</h2> <!-- Dynamic product name -->
                        <p class="text-sm text-gray-500">{{ $cartItem->product->description }}</p> <!-- Dynamic description -->
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <div>
                        <p class="text-lg font-semibold">${{ $cartItem->product->pro_price }}</p> <!-- Dynamic price -->
                    </div>
                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-4 py-2 rounded-md">Remove</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center">Your cart is empty.</p>
        @endforelse

        <!-- Shipping and Total -->
        @if(count($cartItems) > 0)
            <div class="mt-8 p-6 bg-white rounded-lg shadow-md">
                <div class="flex justify-between">
                    <p class="text-lg">Shipping</p>
                    <p class="text-lg">${{ $shipping }}</p> <!-- Static shipping value -->
                </div>
                <div class="flex justify-between mt-4">
                    <p class="text-lg font-semibold">Total</p>
                    <p class="text-lg font-semibold">${{ $totalPrice + $shipping }}</p> <!-- Dynamic total price -->
                </div>
            </div>

            <!-- Confirm Button -->
            <div class="mt-6 flex justify-center">
                <button class="bg-black text-white px-8 py-3 text-lg rounded-md">Confirm</button>
            </div>
        @endif
    </div>
</div>
@endsection
