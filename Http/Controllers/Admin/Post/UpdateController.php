<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        //dd($data);

        $post = $this->service->update($data, $post);

        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.post.show', compact('post', 'categories', 'tags'))
            ->with(['success'=>'Пост отредактирован в БД']);
    }
}
