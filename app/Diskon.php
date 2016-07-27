<?php

namespace Kawani;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diskon extends Model
{
    use SoftDeletes;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'persen', 'kode', 'keterangan', 'status',
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
	public function detailTransaksi()
    {
        return $this->hasOne('Kawani\Jenis');
    }
}
