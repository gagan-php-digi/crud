<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    
        // public function edit(User $user, Post $post) {

        //     return $user->id===$post->user_id;

        // }
        public function create(user $user) {
            return $user->is_admin;
        }

        public function edit(user $user) {
            return $user->is_admin;
        }
    }

