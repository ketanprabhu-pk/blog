@extends('layout.app')
@section('content')
    <div class="flex justify-center lg:m-10 lg:px-10 md:p-6">
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
            <div class="container m-4">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0 m-2">
                            <img class="flex justify-center w-32 h-32 md:w-48 md:rounded-none rounded-full my-auto mx-auto"
                                src="{{ asset('images/fav/android-chrome-512x512.png') }}" alt="Blog image" width="384"
                                height="512">
                            <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                                <h2 class="m-2 text-xl ">{{ $post->title }}</h2>
                                <blockquote>
                                    <p class="text-lg font-semibold">
                                        {{ $post->body }}
                                    </p>
                                </blockquote>
                                <figcaption class="font-medium">
                                    <div class="text-cyan-600">
                                        {{ $post->user->fname }} {{ $post->user->lname }}
                                    </div>
                                    <div class="text-gray-500">
                                        Staff Engineer, Algolia
                                    </div>
                                </figcaption>
                                <span class="text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </figure>
                    @endforeach
                    {{ $posts->links() }}
                @else
                    Sorry there are no postes
                @endif
            </div>
        </div>
    </div>
@endsection
