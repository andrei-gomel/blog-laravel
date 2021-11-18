<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;



class IndexController extends Controller
{

    public function __invoke()
    {
        $comments = auth()->user()->comments;

        //dd($tags);

        return view('personal.comment.index', compact('comments'));
    }
}
