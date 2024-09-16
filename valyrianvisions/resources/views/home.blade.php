@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-100 p-4 border-b">
                <h2 class="text-lg font-semibold">{{ __('Dashboard') }}</h2>
            </div>
            
            <div class="p-4 space-y-4">
                <a href="{{ url ('product/index')}}" class="block p-2 border border-gray-300 rounded hover:bg-gray-100">
                    <button class="w-full text-left">
                        Manage Products
                    </button>
                </a>
                <a href="{{ url('product/create') }}" class="block p-2 border border-gray-300 rounded hover:bg-gray-100">
                    <button class="w-full text-left">
                        Add Products
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
