@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/loginbackground.jpg') }}');">
    <div class="w-full max-w-md bg-[#f5dcbf] p-8 rounded-md shadow-lg">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Create an Account</h2>
            <p class="text-gray-600">Join Valyrian Visions Today</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-lg font-semibold mb-2">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#2F2F2F] @error('name') is-invalid @enderror">
                @error('name')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-lg font-semibold mb-2">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#2F2F2F] @error('email') is-invalid @enderror">
                @error('email')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-lg font-semibold mb-2">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#2F2F2F] @error('password') is-invalid @enderror">
                @error('password')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password-confirm" class="block text-lg font-semibold mb-2">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#2F2F2F]">
            </div>

            <!-- Register Button -->
            <div>
                <button type="submit" class="w-full bg-black text-white rounded-md py-2 hover:bg-[#333] transition duration-300">
                    {{ __('Register') }}
                </button>
            </div>

            <!-- Already have an account? -->
            <div class="text-center mt-4">
                <p class="text-gray-700">Already have an Account? 
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                        {{ __('Login') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
