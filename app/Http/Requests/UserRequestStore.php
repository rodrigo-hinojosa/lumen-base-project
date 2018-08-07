<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class UserRequestStore extends RequestAbstract
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
            'userTypeId' => 'required|numeric',
            'name' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users,email,NULL,id,deleted_at,NULL',
            'username' => 'required|max:50|unique:users,username,NULL,id,deleted_at,NULL',
            'password' => 'required|max:60'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
