<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'toko_id', 'barang_id', 'qty',
    ];
	
	/**
	 * Relations
     */
    public function barang()
    {
        return $this->belongsTo('Kawani\Barang');
    }
    public function toko()
    {
        return $this->belongsTo('Kawani\Toko');
    }
}
