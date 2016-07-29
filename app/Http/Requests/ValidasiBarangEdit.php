<?php

namespace Kawani\Http\Requests;

use Kawani\Http\Requests\Request;

class ValidasiBarangEdit extends Request
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
			'hpp'=>'required|alpha_num',
			'harga_jual'=>'required|alpha_num',
        ];
    }
	public function messages()
	{
		return [
			'nama.required'=>'harus mengisi nama',
			'hpp.required'=>'harus mengisi hpp',
			'hpp.alpha_num'=>'harus angka',
			'harga_jual.required'=>'harus mengisi harga jual',
			'harga_jual.alpha_num'=>'harus angka',
		];
	}
}
