@extends('layout.app')
@section('content')
    <div class="flex justify-center lg:m-10 lg:px-10 md:p-6">
        <div class="lg:w-5/12 md:w-full bg-blue-100 p-6 rounded-lg">
            <div class="container">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    @if (session('status'))
                        <div class="mb-4 text-red-500 flex justify-center text-xl">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-4">
                        <label for="email" class="sr-only">User Email</label>
                        <input type="email" name="email" id="email" placeholder="Your Email"
                            class="border-2 w-full p-4 rounded-lg @error('email')
                            border-red-500
                        @enderror"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-500 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="sr-only">User Password</label>
                        <input type="password" name="password" id="password" placeholder="Your Password"
                            class="border-2 w-full p-4 rounded-lg @error('password')
                            border-red-500
                        @enderror"
                            value="">
                        @error('password')
                            <div class="text-red-500 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember" class="not-sr-only">Remember Me</label>
                        @error('password')
                            <div class="text-red-500 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-600 text-white p-3 rounded font-medium w-full">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
