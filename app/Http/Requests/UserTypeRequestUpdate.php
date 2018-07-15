<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class UserTypeRequestUpdate extends RequestAbstract
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
            'name' => 'required|max:100|unique:user_types,name,' . $id_url . ',id,deleted_at,NULL',
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
