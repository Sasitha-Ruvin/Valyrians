@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/loginbackground.jpg') }}');">
    <div class="w-full max-w-md bg-[#f5dcbf] p-8 rounded-md shadow-lg">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back!</h2>
            <p class="text-gray-600">Log in to your Account</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Username -->
            <div>
                <label for="email" class="block text-lg font-semibold mb-2">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
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
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#2F2F2F] @error('password') is-invalid @enderror">
                @error('password')
                    <span class="text-red-500 text-sm mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Login Button -->
            <div>
                <button type="submit" class="w-full bg-black text-white rounded-md py-2 hover:bg-[#333] transition duration-300">
                    {{ __('Login') }}
                </button>
            </div>

            <!-- Remember Me -->
            <div class="text-center">
                <label for="remember" class="inline-flex items-center text-gray-700">
                    <input type="checkbox" name="remember" id="remember" class="form-checkbox text-black">
                    <span class="ml-2">{{ __('Remember Me') }}</span>
                </label>
            </div>

            <!-- Sign Up Link -->
            <div class="text-center mt-4">
                <p class="text-gray-700">Don’t have an Account? 
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                        {{ __('Sign Up') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
