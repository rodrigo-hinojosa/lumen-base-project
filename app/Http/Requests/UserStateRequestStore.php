<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class UserStateRequestStore extends RequestAbstract
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
            'name' => 'required|max:100|unique:user_states,name,NULL,id,deleted_at,NULL',
            'icon' => 'required|max:50',
            'colorIcon' => 'max:50',
            'description' => 'max:500'
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
