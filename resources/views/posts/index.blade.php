@extends('layout.app')
@section('content')
    <div class="flex justify-center lg:m-5 lg:px-5 md:m-5 md:px-5 md:p-6">
        <div class="lg:w-8/12 md:w-full bg-blue-100 p-6 rounded-lg">
            <div class="container">
                <form action="{{ route('posts') }}" method="post">
                    @if (session('status'))
                        <div class="mb-4 text-red-500 flex justify-center text-xl">
                            {{ session('status') }}
                        </div>
                    @endif
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="sr-only">Title</label>
                        <input type="text" name="title" id="title" class="bg-gray-100 border-2 w-full p-4 rounded-lg"
                            placeholder="Blog Title">
                        @error('title')
                            <div class="text-red-500 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="body" class="sr-only"></label>
                        <textarea name="body" id="body" cols="20" rows="5"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Blog Content Body"></textarea>
                        @error('body')
                            <div class="text-red-500 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-600 text-white p-3 rounded font-medium w-full">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <div class="m-4">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-posts :post="$post" />
                    @endforeach
                    {{ $posts->links() }}
                @else
                    Sorry there are no postes
                @endif
            </div>
        </div>
    </div>
@endsection
