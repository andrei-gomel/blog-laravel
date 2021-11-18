<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Post;


class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        //dd($post->id);
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->route('post.index', $post->id);
    }
}
