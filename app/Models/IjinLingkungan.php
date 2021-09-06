<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IjinLingkungan extends Model
{
	protected $table	= 'ijin_lingkungan';
	protected $fillable	= ['tanggal_daftar','status_id','pemohon_id','kecamatan_id','desa_id','rt','rw','jenis_usaha','nama_perusahaan','alamat_perusahaan','nama_penanggungjawab','data_imb','s_pengantar_dlh','d_pendirian_usaha','izin_usaha','fc_ktp','slf','d_nib','i_lokasi','d_ukl','npwp_pribadi','i_operasional','sk_dpmptsp','dp_usaha','npwp_bhukum'];

	public function pemohon()
	{
		return $this->hasOne('App\Models\Pemohon','id','pemohon_id');
	}
	
	public function datastatus()
	{
		return $this->hasOne('App\Models\DataStatus','id','status_id');
	}

	public function jenisijin()
	{
		return $this->hasOne('App\Models\Jenisizin','id','jenis_izin');
	}

	public function district()
	{
		return $this->hasOne('App\Models\District','id','kecamatan_id');
	}
	public function village()
	{
		return $this->hasOne('App\Models\Village','id','desa_id');
	}
}
