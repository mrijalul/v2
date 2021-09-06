<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IjinPendidikan extends Model
{
	protected $table	= 'ijin_pendidikan';
	protected $fillable	= ['kode_pendaftaran','tanggal_daftar','status_id','pemohon_id','kecamatan_id','desa_id','pilih_pemohon','nama_instansi','jenis_izin','alamat_sekolah','nss','npsn','status_sekolah','penanggungjawab','tgl_no_akte','nib','tgl_nib','nama_kbli','kepala_sekolah','nama_yayasan'];

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
