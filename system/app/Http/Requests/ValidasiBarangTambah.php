<?php

namespace Kawani\Http\Requests;

use Kawani\Http\Requests\Request;

class ValidasiBarangTambah extends Request
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
            'id'=>'required|digits:12|unique:barangs,id|alpha_num',
			'nama'=>'required',
			'hpp'=>'required|alpha_num',
			'harga_jual'=>'required|alpha_num',
        ];
    }
	public function messages()
	{
		return [
			'id.required'=>'harus mengisi kode',
			'id.digits'=>'kode harus 12 digit',
			'id.unique'=>'kode tersebut sudah ada',
			'id.alpha_num'=>'harus angka',
			'nama.required'=>'harus mengisi nama',
			'hpp.required'=>'harus mengisi hpp',
			'hpp.alpha_num'=>'harus angka',
			'harga_jual.required'=>'harus mengisi harga jual',
			'harga_jual.alpha_num'=>'harus angka',
		];
	}
}
