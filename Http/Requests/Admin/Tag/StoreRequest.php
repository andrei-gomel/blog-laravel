<?php

namespace App\Http\Requests\Admin\Tag;

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
            'title' => 'required|string|unique:tags'
        ];
    }

    /** Get the error messages for the defined validator rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.unique'  => 'Тэг должен быть уникальным',
        ];
    }

}