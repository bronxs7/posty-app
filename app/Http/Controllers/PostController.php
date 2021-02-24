<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with(['user','likes'])->paginate(10); //Reduce wasted queries, eager loading method

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        // Post::create([
        //     'user_id' => auth()->id(),
        //     'body' => $request->body
        // ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return back();
    }
}
