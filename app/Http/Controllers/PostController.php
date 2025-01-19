<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
{
    return view('posts.index')->with(['posts' => $post->get()]);  
}
public function like(Post $post)
    {
        $user = auth()->user();
        $isLiked = $user->favorites()->where('post_id', $post->id)->exists();
 
        if ($isLiked) {
            $user->favorites()->detach($post);
        } else {
            $user->favorites()->attach($post);
        }
 
        return back();
    }
}
