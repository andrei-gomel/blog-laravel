<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
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
