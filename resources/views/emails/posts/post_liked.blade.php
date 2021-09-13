@component('mail::message')
    # Introduction

    {{ $liker->fname }} {{ $liker->lname }} Liked one of your post.

    @component('mail::button', ['url' => route('posts.show', $post)])
        See Blog
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
