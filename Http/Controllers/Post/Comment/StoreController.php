<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Post;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        //$data['user_name'] = auth()->user()->name;
        $data['post_id'] = $post->id;
        //dd($data);

        Comment::create($data);

        return redirect()->route('post.show', $post->id);
    }
}
