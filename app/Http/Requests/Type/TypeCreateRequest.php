<?php

namespace App\Http\Requests\Type;

use App\Http\Requests\Request;

class TypeCreateRequest extends Request
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
            'nom' => 'required|min:6|max:30',
            'description' => 'required|min:15|max:60'
        ];
    }
}
