@extends('layout.app')
@section('content')
    <div class="flex justify-center lg:m-5 lg:px-5 md:m-5 md:px-5 md:p-6">
        <div class="lg:w-8/12 md:w-full bg-blue-100 p-6 rounded-lg">
            <div class="grid justify-items-center p-6 w-full bg-pink-300">
                <h1 class="text-2xl font-medium mb-1">{{ $user->fname }} {{ $user->lname }}</h1>
                <span>posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</span>
                <span>and recived {{ $user->recivedLikes->count() }}
                    {{ Str::plural('like', $user->recivedLikes->count()) }}</span>
            </div>
            <div class="m-4">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-posts :post="$post" />
                    @endforeach
                    {{ $posts->links() }}
                @else
                    Sorry there are no postes by user
                @endif
            </div>
        </div>
    </div>
@endsection
