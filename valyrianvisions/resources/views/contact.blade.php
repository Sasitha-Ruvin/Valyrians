<!-- resources/views/contact.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-rose-50 p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h1 class="text-2xl font-semibold text-center mb-6">Send us a Message</h1>

            <form action="/send-message" method="POST" class="space-y-4">
                @csrf

                <!-- Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="block w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring focus:border-rose-500">
                </div>

                <!-- Category Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">E-Mail</label>
                    <input type="text" id="email" name="email" class="block w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring focus:border-rose-500">
                </div>

                <!-- Message Input -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea id="message" name="message" rows="5" class="block w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring focus:border-rose-500"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 focus:outline-none">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
