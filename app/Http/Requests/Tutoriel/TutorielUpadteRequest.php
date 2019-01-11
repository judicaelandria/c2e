<?php

namespace App\Http\Requests\Tutoriel;

use App\Http\Requests\Request;

class TutorielUpadteRequest extends Request
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
            'nom' => 'required|min:20|max:40',
            'badget_id' => 'required',
            'niveau_id' => 'required',
            'description' => 'required|min:20|max:80',
            'introduction' => 'required',
            'tags' => 'required'
        ];
    }
}
