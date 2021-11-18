<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{

    public function __invoke()
    {
        //return 'Liked';

        $posts = auth()->user()->likedPosts;

        //dd($posts);

        return view('personal.post.index', compact('posts'));
    }
}
