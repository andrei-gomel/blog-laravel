<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.string' => 'Данные должны быть строкой',
            'email.unique' => 'Такой email уже существует',
            'name.unique' => 'Такой пользователь уже существует',
            'email.required' => 'Это поле обязательно для заполнения',
            'email.email' => 'Email должен быть вида email@some.domain',
            'password.required' => 'Это поле обязательно для заполнения',
        ];
    }
}
