@extends('layouts.app')

@section('content')

<div class="container">
    <div class="grid grid-cols-12 justify-center">
        <div class="col-span-10 col-start-2 w-full">
            <div class="border p-3 rounded-lg bg-white">
                <div class="m-2">
                    <h2 class="mb-2 text-center">Manage Products</h2> 
                    <hr>
                </div>
                <div class="grid grid-cols-2">

                    @forelse($product as $pro)

                        <div class="col-span-2 grid grid-cols-4 gap-3">
                            <div class="col-span-2 flex flex-col justify-center m-auto">
                                <img src="{{ url($pro->pro_image_url)}}" alt="IMG" class="h-[10em]">
                            </div>
                            <div class="col-span-1 flex flex-col justify-center">
                                <p>{{ $pro->pro_name }}</p>
                                <p class="text-sm text-green-600">{{ $pro->pro_price }}</p>
                            </div>
                            <div class="col-span-1 flex items-center gap-3">
                                <a href="{{ url('product/edit/'.$pro->id)}}" class="bg-blue-600 text-white h-fit p-1 rounded-lg" >EDIT</a>
                                <form action="{{ url('product/delete') }}" method="post">
                                    @csrf
                                    <input type='hidden' name="pro_id" value="{{ $pro->id }}">
                                    <input type="submit" value="DELETE" class="bg-red-600 text-white h-fit p-1 rounded-lg">
                                </form>
                            
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection