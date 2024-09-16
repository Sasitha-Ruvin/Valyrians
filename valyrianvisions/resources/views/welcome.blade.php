@extends('layouts.app')

@section('content')

<!-- Main Section (Banner) -->
<section class="relative">
    <div class="h-96 bg-cover bg-center" style="background-image: url('{{ asset('images/mainbanner.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold">Valyrian Visions</h1>
                <p class="text-lg mt-2">Where Art Speaks</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<!-- Featured Products Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto">
        <h2 class="text-3xl font-semibold text-center mb-8">Latest Masterpieces</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($product as $pro)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
                <img src="{{ url($pro->pro_image_url) }}" alt="{{ $pro->pro_name }}" class="h-56 w-full object-cover">
                <div class="flex-1 p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold">{{ $pro->pro_name }}</h3>
                        <p class="text-gray-600 mt-2">{{ $pro->description }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-gray-800 font-bold">{{ $pro->pro_price }}$</span>
                        <button class="bg-black text-white px-4 py-2 rounded">Add to Cart</button>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center text-gray-600">No featured products available.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- Commission Section -->
<section class="py-16 bg-gray-100 text-center">
    <h2 class="text-3xl font-semibold mb-6">Get Your Own Customized Art</h2>
    <p class="text-gray-600 mb-8">Have a unique art piece in mind? Let our artist bring your vision to life.</p>
    <a href="#" class="bg-black text-white px-6 py-3 rounded">Commission Now</a>
</section>

<!-- Newsletter Section -->
<section class="py-12 bg-pink-100 text-center">
    <h2 class="text-2xl font-semibold mb-4">Join Our Newsletter for latest art pieces and exclusive offers</h2>
    <form class="flex justify-center">
        <input type="email" placeholder="Enter your email" class="px-4 py-2 w-80 rounded-l border border-gray-400">
        <button type="submit" class="bg-black text-white px-6 py-2 rounded-r">Subscribe</button>
    </form>
</section>

<!-- Footer Section -->


@endsection
