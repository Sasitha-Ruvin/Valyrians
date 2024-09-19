@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4">
    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
        <div class="mb-4">
            <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                <
            </a>
        </div>
        <h2 class="text-2xl font-bold text-center mb-6">Manage Products</h2>

        <div class="space-y-6">
            @forelse($product as $pro)
                <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                    <!-- Product Image -->
                    <div class="w-1/4 flex justify-center">
                        <img src="{{ url($pro->pro_image_url) }}" alt="IMG" class="h-40 rounded-lg object-cover">
                    </div>

                    <!-- Product Details -->
                    <div class="w-1/2 px-4">
                        <h3 class="text-xl font-semibold">{{ $pro->pro_name }}</h3>
                        <p class="text-gray-600 mt-2">{{ $pro->description }}</p>
                    </div>

                    <!-- Actions (Edit and Delete) -->
                    <div class="w-1/4 flex justify-end space-x-3">
                        <a href="{{ url('product/edit/'.$pro->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Edit
                        </a>

                        <!-- Delete Button with Confirmation -->
                        <button type="button" onclick="confirmDelete({{ $pro->id }})" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                            Remove
                        </button>

                        <!-- Hidden delete form for the product -->
                        <form id="delete-form-{{ $pro->id }}" action="{{ url('product/delete') }}" method="post" style="display: none;">
                            @csrf
                            <input type="hidden" name="pro_id" value="{{ $pro->id }}">
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">No products available.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- SweetAlert2 JavaScript confirmation function -->
<script>
    function confirmDelete(productId) {
        Swal.fire({
            title: 'Are you sure you want to delete this item?',
            text: "You won't be able to revert this action!",
            icon: 'Warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, submit the form to delete the product
                document.getElementById('delete-form-' + productId).submit();
            }
        });
    }
</script>

@endsection
