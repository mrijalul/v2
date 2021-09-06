<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataStatus extends Model
{
	protected $table	= 'data_statuses';
	protected $fillable	= ['nama_status'];

	public function pemohon()
	{
		return $this->hasMany('App\Models\Pemohon');
	}
}
