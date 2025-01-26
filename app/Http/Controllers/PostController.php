<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; // useする
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }
    public function index(Post $post)
{
    return view('posts.index')->with(['posts' => $post->get()]);  
}
public function store(PostRequest $request, Post $post)
{
    $input = $request['post'];
    $post->fill($input)->save();
    //return redirect('/posts/' . $post->id);
    return redirect('/posts');
}
public function update(PostRequest $request, Post $post)
{
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    //return redirect('/posts' . $post->id);
    return redirect('/posts');
}

public function edit(Post $post)
{
    return view('posts.edit')->with(['post' => $post]);
}
public function delete(Post $post)
{
    $post->delete();
    return redirect('/posts');
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
