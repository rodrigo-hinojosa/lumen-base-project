<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class UserRequestUpdate extends RequestAbstract
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
        $id_url = $this->segment(2);

        return [
            'userTypeId' => 'required|numeric',
            'userStateId' => 'required|numeric',
            'name' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . $id_url . ',id,deleted_at,NULL',
            'username' => 'required|max:50|unique:users,username,' . $id_url . ',id,deleted_at,NULL',
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
