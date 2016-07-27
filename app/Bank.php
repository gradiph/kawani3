<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    public $timestamps = false;
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'nilai',
    ];
	
	/**
     * Get the barang for the jenis.
     */
    public function transaksi()
    {
        return $this->hasMany('Kawani\Transaksi');
    }
}
