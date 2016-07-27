<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retur extends Model
{
    use SoftDeletes;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detail_transaksi_id', 'qty', 'keterangan',
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
	public function detailTransaksi()
	{
		return $this->belongsTo('Kawani\DetailTransaksi');
	}
}
