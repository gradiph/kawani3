<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    public $timestamps = false;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaksi_id', 'barang_id', 'qty', 'harga_jual', 'hpp', 'diskon_id',
    ];
	
	/**
     * Relations
     */
    public function transaksi()
    {
        return $this->belongsTo('Kawani\Transaksi');
    }
    public function barang()
    {
        return $this->belongsTo('Kawani\Barang');
    }
    public function diskon()
    {
        return $this->belongsTo('Kawani\Diskon');
    }
}