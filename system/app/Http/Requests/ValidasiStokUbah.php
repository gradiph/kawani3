<?php

namespace Kawani\Http\Requests;

use Kawani\Http\Requests\Request;

class ValidasiStokUbah extends Request
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
            'qty'=>'required|alpha_num',
        ];
    }
	public function messages()
	{
		return [
			'qty.required'=>'harus mengisi qty',
			'qty.alpha_num'=>'harus angka',
		];
	}
}
