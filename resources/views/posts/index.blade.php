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
                        <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0 m-2">
                            <img class="flex justify-center w-32 h-32 md:w-48 md:rounded-none rounded-full my-auto mx-auto"
                                src="{{ asset('images/fav/android-chrome-512x512.png') }}" alt="Blog image" width="384"
                                height="512">
                            <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                                <h2 class="m-2 text-3xl font-bold ">{{ $post->title }}</h2>
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
                                @auth
                                    <div class="flex justify-between">
                                        <div class="flex items-center">
                                            @if (!$post->likedBy(auth()->user()))
                                                <form action="{{ route('posts.likes', $post) }}" method="post"
                                                    class="m-2">
                                                    @csrf
                                                    <button type="submit" class="text-blue-600">Like</button>
                                                </form>
                                            @else
                                                <form action="{{ route('posts.likes', $post) }}" method="post"
                                                    class="m-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-blue-600">UnLike</button>
                                                </form>
                                            @endif
                                            <span>{{ $post->likes->count() }}
                                                {{ Str::plural('like', $post->likes->count()) }}</span>
                                        </div>
                                        @if ($post->createdBy(auth()->user()))
                                            <div class="flex item-center">
                                                <form action="{{ route('posts.destroy', $post) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-8">
                                                        <svg aria-hidden="true" focusable="false" data-prefix="far"
                                                            data-icon="trash-alt"
                                                            class="fill-current text-red-600 svg-inline--fa fa-trash-alt fa-w-14"
                                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                            <path fill="currentColor"
                                                                d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endauth
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
