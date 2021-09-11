<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Posts $post)
    {
        return $user->id === $post->user_id;
    }
}
