<?php

namespace App\Http\Requests\Badget;

use App\Http\Requests\Request;

class BadgetCreateRequest extends Request
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
            'nom' => 'required|alpha|min:6|max:20',
            'img_fch' => 'required'
        ];
    }
}
