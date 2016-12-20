<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
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
     * Relations
     */
    public function barang()
    {
        return $this->hasMany('Kawani\Barang');
    }
}
