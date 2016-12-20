<?php

namespace Kawani\Http\Requests;

use Kawani\Http\Requests\Request;

class ValidasiPembelianTambah extends Request
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
            'barang_id'=>'required|digits:12',
			'qty'=>'required|alpha_num',
        ];
    }
	public function messages()
	{
		return [
			'barang_id.required'=>'harus memilih barang',
			'barang_id.digits'=>'kode barang salah',
			'qty.required'=>'harus mengisi qty',
			'qty.alpha_num'=>'harus angka',
		];
	}
}
