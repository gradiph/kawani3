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
            'kode'=>'required|digits_between:1,12|unique:barang,kode',
			'nama'=>'required',
			'hpp'=>'required',
			'harga_jual'=>'required',
			'stok_ot'=>'required',
			'stok_cmh'=>'required',
			'stok_du'=>'required',
			'stok_csn'=>'required',
			'stok_lkg'=>'required',
			'stok_jtn'=>'required',
			'stok_gdg'=>'required'
        ];
    }
	public function messages()
	{
		return [
			'kode.required'=>'harus mengisi kode',
			'kode.digits_between'=>'maksimal 12 digit',
			'kode.unique'=>'kode tersebut sudah ada',
			'nama.required'=>'harus mengisi nama',
			'hpp.required'=>'harus mengisi hpp',
			'harga_jual.required'=>'harus mengisi harga jual',
			'stok_ot.required'=>'harus mengisi stok otten',
			'stok_cmh.required'=>'harus mengisi stok cimahi',
			'stok_du.required'=>'harus mengisi stok dipati ukur',
			'stok_csn.required'=>'harus mengisi stok consina',
			'stok_lkg.required'=>'harus mengisi stok lengkong 2',
			'stok_jtn.required'=>'harus mengisi stok jatinangor',
			'stok_gdg.required'=>'harus mengisi stok gudang',
		];
	}
}
