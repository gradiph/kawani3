<?php

namespace Kawani\Http\Requests;

use Kawani\Http\Requests\Request;

class ValidasiDiskonTambah extends Request
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
            'persen_diskon'=>'required|digits_between:1,2',
			'keterangan'=>'required',
		];
    }
	public function messages()
	{
		return [
			'persen_diskon.required'=>'harus mengisi diskon',
			'kode.digits_between'=>'maksimal 2 digit',
			'keterangan.required'=>'harus mengisi keterangan',
		];
	}
}
