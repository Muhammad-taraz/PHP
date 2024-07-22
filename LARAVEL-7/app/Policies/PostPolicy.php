<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Post $post)
    {
        return $user->id === $post->user_id || $post->published_at <= now();
    }

    public function create(User $user)
    {
        return $user->hasRole('admin') || $user->hasRole('editor') || $user->hasRole('author');
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasRole('admin') || $user->hasRole('editor');
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasRole('admin');
    }
}

