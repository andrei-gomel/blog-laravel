<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'category_id' => 'exists:categories,id',
            'tag_ids' => 'required|array',
            'tag_ids.*' => 'required|integer|exists:tags,id',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'Данные должны быть строкой',
            'category_id.exists' => 'Выберите категорию из списка',
            'content.required' => 'Это поле обязательно для заполнения',
            'preview_image.required' => 'Это поле обязательно для заполнения',
            'main_image.required' => 'Это поле обязательно для заполнения',
            'preview_image.file' => 'Должен быть выбран файл',
            'main_image.file' => 'Должен быть выбран файл',
            'tag_ids.required' => 'Выберите хотя бы один элемент из списка',
        ];
    }
}
