<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(10);

        return view('users.profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function posts(User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(10);

        return view('users.posts.posts', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
