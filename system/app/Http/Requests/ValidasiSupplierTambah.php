<?php

namespace Kawani\Http\Requests;

use Kawani\Http\Requests\Request;

class ValidasiSupplierTambah extends Request
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
			'id'=>'required|unique:suppliers,id|digits:3',
        ];
    }
	public function messages()
	{
		return [
			'nama.required'=>'harus mengisi nama',
			'id.required'=>'harus mengisi kode',
			'id.unique'=>'kode tersebut sudah ada',
			'id.digits'=>'kode harus 3 digit',
		];
	}
}
