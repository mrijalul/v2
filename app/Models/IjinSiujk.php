<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IjinSiujk extends Model
{
	protected $table	= 'ijin_siujk';
	protected $fillable	= ['kode_pendaftaran','tanggal_daftar','status_id','pemohon_id','kecamatan_id','desa_id','nama_perusahaan','npwp_perusahaan','alamat_perusahaan','nama_direktur','alamat_direktur','notelp_direktur','sbu_id','tgl_sbu','skt_id','tgl_skt','ska_id','tgl_ska','tgl_oss','data_nib','syarat1','syarat2','syarat3','syarat4','syarat5','syarat6','syarat7','syarat8','syarat9','syarat10','syarat11','syarat12','syarat13','syarat14','syarat15','syarat16','syarat17','syarat18','syarat19','syarat20'];
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
	public function jenissbu()
	{
		return $this->hasOne('App\Models\DataSbu','id','sbu_id');
	}
	public function jenisskt()
	{
		return $this->hasOne('App\Models\DataSkaSkt','id','skt_id');
	}
	public function jenisska()
	{
		return $this->hasOne('App\Models\DataSkaSkt','id','ska_id');
	}
}
