<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;


class IndexController extends Controller
{

    public function __invoke()
    {
        //return '1111111';
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['postsCount'] = Post::all()->count();
        $data['tagsCount'] = Tag::all()->count();

        //dd($tags);

        return view('admin.main.index', compact('data'));
    }
}
