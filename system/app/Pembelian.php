<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barang_id', 'jumlah',
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
