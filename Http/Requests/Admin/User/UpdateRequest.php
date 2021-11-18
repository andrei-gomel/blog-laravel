<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'role' => 'required|integer',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'email.unique' => 'Такой email уже существует',
            'name.string' => 'Данные должны быть строкой',
            'email.required' => 'Это поле обязательно для заполнения',
            'email.email' => 'Email должен быть вида email@some.domain',
        ];
    }
}
