<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
{

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->segment(2);
		return [
			'login' => 'required|max:30|unique:users,name,' . $id,
			'email' => 'required|email|unique:users,email,' . $id
		];
	}

}