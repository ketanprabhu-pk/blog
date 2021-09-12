@extends('layout.app')
@section('content')
    <div class="flex justify-center lg:m-5 lg:px-5 md:m-5 md:px-5 md:p-6">
        <div class="lg:w-8/12 md:w-full bg-blue-100 p-6 rounded-lg">
            <x-posts :post="$post" />
        </div>
    </div>
@endsection
