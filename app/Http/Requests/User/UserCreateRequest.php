<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
{

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'login' => 'required|max:30|unique:users',
            'name' => 'required',
			'domaine' => 'required',
			'email' => 'required|email|unique:users'
		];
	}

}