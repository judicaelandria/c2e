<?php

namespace App\Http\Requests\Forum;

use App\Http\Requests\Request;

class ForumUpadteRequest extends Request
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
            'sujet' => 'required|alpha|max:80',
            'description' => 'required|min:60'
        ];
    }
}
