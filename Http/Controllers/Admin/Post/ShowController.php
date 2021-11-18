<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $categories = Category::all();

        $tags = Tag::all();

        $strTag = null;

        return view('admin.post.show', compact('post', 'categories', 'tags', 'strTag'));
    }
}
