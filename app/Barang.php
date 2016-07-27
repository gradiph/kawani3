<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes;
	
	/**
	 * Set the primary key not an incrementing integer
	 */
	public $incrementing = false;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nama', 'harga_jual', 'hpp', 'supplier_id', 'jenis_id', 'ukuran_id', 'warna_id',
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
    public function supplier()
    {
        return $this->belongsTo('Kawani\Supplier');
    }
	public function jenis()
    {
        return $this->belongsTo('Kawani\Jenis');
    }
    public function ukuran()
    {
        return $this->belongsTo('Kawani\Ukuran');
    }
	public function warna()
    {
        return $this->belongsTo('Kawani\Warna');
    }
	public function stok()
    {
        return $this->hasMany('Kawani\Stok');
    }
	public function detailTransaksi()
	{
		return $this->hasMany('Kawani\DetailTransaksi');
	}
}
