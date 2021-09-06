<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
	protected $table 	= 'pemohons';
	protected $fillable = ['kode_pemohon','registered_id','registered_name','user_id','nik','nama_lengkap','pekerjaan','jenis_kelamin','tempat_lahir','tanggal_lahir','rt','rw','alamat','npwp','no_telp'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
