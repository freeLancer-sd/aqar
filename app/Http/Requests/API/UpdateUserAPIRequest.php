<?php

namespace App\Http\Requests\API;

use App\Models\User;
use InfyOm\Generator\Request\APIRequest;

class UpdateUserAPIRequest extends APIRequest
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
            'userId' => 'required',
            'name' => 'string|max:180|min:5',
            'email' => 'email|string|max:180|min:5',
            'mobil' => 'string|max:11|min:10',
        ];
    }
}
