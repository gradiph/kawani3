<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'toko_id', 'jenis_bayar', 'bank_id', 'total_jual', 'total_hpp', 'total_diskon', 'total_qty',
    ];

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	/**
	 * Relations
	 */
	public function user()
	{
		return $this->belongsTo('Kawani\User');
	}
	public function toko()
	{
		return $this->belongsTo('Kawani\Toko');
	}
	public function bank()
	{
		return $this->belongsTo('Kawani\Bank');
	}
	public function detailTransaksi()
	{
		return $this->hasMany('Kawani\DetailTransaksi');
	}
}
