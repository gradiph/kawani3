<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    public $timestamps = false;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'alamat', 'telepon',
    ];
	
	/**
     * Relations
     */
    public function stok()
    {
        return $this->hasMany('Kawani\Stok');
    }
    public function transaksi()
    {
        return $this->hasMany('Kawani\Transaksi');
    }
}
