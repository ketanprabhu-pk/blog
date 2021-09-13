<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostLiked extends Mailable
{
    use Queueable, SerializesModels;

    public $liker;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $liker, Posts $post)
    {
        $this->liker = $liker;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.post_liked')->subject('someone liked your post');
    }
}
