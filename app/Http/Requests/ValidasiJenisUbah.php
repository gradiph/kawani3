<?php

namespace Kawani\Http\Requests;

use Kawani\Http\Requests\Request;

class ValidasiJenisUbah extends Request
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
            'nama'=>'required',
        ];
    }
	public function messages()
	{
		return [
			'nama.required'=>'harus mengisi nama',
		];
	}
}
