<?php

namespace App\Http\Requests\Chapitre;

use App\Http\Requests\Request;

class ChapitreCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|min:6|max:20',
            'description' => 'required|min:20'
        ];
    }
}
