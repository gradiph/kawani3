]<?php

namespace Kawani\Http\Requests;

use Kawani\Http\Requests\Request;

class ValidasiUserEdit extends Request
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
            'username'=>'required',
			'password'=>'required'
        ];
    }
	public function messages()
	{
		return [
			'username.required'=>'harus mengisi username',
			'password.required'=>'harus mengisi password',
		];
	}
}
