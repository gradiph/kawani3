<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    public $timestamps = false;

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
        'id', 'nama',
    ];

	/**
     * Get the barang for the jenis.
     */
    public function barang()
    {
        return $this->hasMany('Kawani\Barang');
    }
}
