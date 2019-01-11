<?php

namespace App\Http\Requests\Section;

use App\Http\Requests\Request;

class SectionCreateRequest extends Request
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
            'titre' => 'required|min:6|max:20',
            'contenu' => 'required|min:20'
        ];
    }
}
