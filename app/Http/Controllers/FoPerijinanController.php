<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perijinan;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\DataStatus;
use App\Models\Pemohon;
use App\Models\IjinPendidikan;
use App\Models\IjinLingkungan;
use App\Models\IjinSiujk;
use App\Models\Jenisizin;

class FoPerijinanController extends Controller
{
	public function izin($slug)
	{
		$kabupaten      = Regency::where('name', 'LIKE', '%KABUPATEN BLITAR%')->first();
		$getkecamatan   = $kabupaten->districts;
		$status         = DataStatus::pluck('nama_status','id');
		$jenis_izin     = Jenisizin::pluck('nama_jenisijin','id');
		$perijinan      = Perijinan::where('slug_perijinan',$slug)->first();
		if($perijinan->slug_perijinan == 'izin-pendidikan'){
			$dataIjinPendidikan = IjinPendidikan::with('pemohon','datastatus','jenisijin')->get();
			// dd($dataIjinPendidikan);
			return view('front_office.pendidikan.index', compact('perijinan','getkecamatan','status','dataIjinPendidikan','jenis_izin'));
		}elseif($perijinan->slug_perijinan == 'izin-lingkungan'){
			$dataIjinLingkungan = IjinLingkungan::with('pemohon','datastatus')->get();
			$datastatus = DataStatus::where('id','=','1112')->orWhere('id','=','1117')->orWhere('id','=','1119')->select('id','nama_status')->get();
			return view('front_office.lingkungan.index', compact('perijinan','getkecamatan','datastatus','dataIjinLingkungan','jenis_izin'));
		}elseif($perijinan->slug_perijinan == 'siujk'){
			$dataIjinSiujk = IjinSiujk::with('pemohon','datastatus')->get();
			return view('front_office.pupr.index', compact('perijinan','getkecamatan','status','dataIjinSiujk','jenis_izin'));
		}else{}
	}

	public function ajaxkecamatanid(Request $request)
	{
		$kab_id = $request->kab_id;
		$desa   = Village::where('district_id',$kab_id)->get();
		return response()->json($desa);
	}

	public function izinpost($slug, Request $request)
	{
		$perijinan      = Perijinan::where('slug_perijinan',$slug)->first();
		$pilih_pemohon  = $request->pilih_pemohon;
		// start ijin pendidikan
		if($perijinan->slug_perijinan == 'izin-pendidikan'){
			$generate_code          = IjinPendidikan::orderBy('id','desc')->first();
			$ipend                  = IjinPendidikan::create($request->all());
			if(is_null($generate_code)){
				$ipend->kode_pendaftaran= 'NR-'.date("dmYHis").'10';
			}else{
				$ipend->kode_pendaftaran= 'NR-'.date("dmYHis").'1'.$generate_code->id;
			}
			$ipend->pemohon_id      = $request->pemohon_id;
			$ipend->status_id       = $request->status_pemohon;
			if($request->jenis_izin == '1'){
				$ipend->nib             = $request->nib1;
				$ipend->tgl_nib         = $request->tgl_nib1;
				$ipend->alamat_sekolah  = $request->alamat_sekolah1;
			}else{
				$ipend->nib             = $request->nib2;
				$ipend->tgl_nib         = $request->tgl_nib2;
				$ipend->alamat_sekolah  = $request->alamat_sekolah2;
			}
			$ipend->save();
		// end ijin pendidikan

		// start ijin lingkungan
		}elseif($perijinan->slug_perijinan == 'izin-lingkungan'){
			$generate_code  = IjinLingkungan::orderBy('id','desc')->first();
			$iling          = IjinLingkungan::create($request->all());
			if(is_null($generate_code)){
				$iling->kode_pendaftaran= 'NR-'.date("dmYHis").'20';
			}else{
				$iling->kode_pendaftaran= 'NR-'.date("dmYHis").'2'.$generate_code->id;
			}
			$iling->status_id   = $request->status_pemohon;
			$iling->save();
		// end ijin lingkungan

		// start ijin siujk
		}elseif ($perijinan->slug_perijinan == 'siujk') {
			$generate_code  = IjinSiujk::orderBy('id','desc')->first();
			$isiujk             = IjinSiujk::create($request->all());
			if(is_null($generate_code)){
				$isiujk->kode_pendaftaran= 'NR-'.date("dmYHis").'30';
			}else{
				$isiujk->kode_pendaftaran= 'NR-'.date("dmYHis").'3'.$generate_code->id;
			}
			$isiujk->status_id  = $request->status_pemohon;
			$isiujk->save();
		}else{}
		return redirect()->back()->with('message','Input Data '.$slug.' berhasil.');
	}

	public function update_status($slug, $id, Request $request)
	{
		$perijinan      = Perijinan::where('slug_perijinan',$slug)->first();
		// izin pendidikan
		if($perijinan->slug_perijinan == 'izin-pendidikan')
		{
			$ipen               = IjinPendidikan::find($id);
			$ipen->status_id    = $request->status_pemohon;
			$ipen->save();
		// ijin lingkungan
		}elseif($perijinan->slug_perijinan == 'izin-lingkungan'){
			$iling              = IjinLingkungan::find($id);
			$iling->status_id   = $request->status_pemohon;
			$iling->save();
		}elseif($perijinan->slug_perijinan == 'siujk'){
			$isiujk             = IjinSiujk::find($id);
			$isiujk->status_id  = $request->status_pemohon;
			$isiujk->save();
		}else{}
		return redirect()->back()->with('message','Update Status '.$slug.' berhasil.');
	}

	public function detail($slug,$id)
	{
		$perijinan      = Perijinan::where('slug_perijinan',$slug)->first();
		if($perijinan->slug_perijinan == 'izin-pendidikan')
		{
			$ijin_pendidikan = IjinPendidikan::with('district','village','datastatus','jenisijin','pemohon')->find($id);
			return view('front_office.pendidikan.detail', compact('ijin_pendidikan','perijinan'));
		}elseif ($perijinan->slug_perijinan == 'izin-lingkungan') {
			$ijin_lingkungan = IjinLingkungan::with('district','village','datastatus','pemohon')->find($id);
			return view('front_office.lingkungan.detail', compact('ijin_lingkungan','perijinan'));
		}elseif($perijinan->slug_perijinan == 'siujk'){
			$ijin_siujk = IjinSiujk::with('village','datastatus','pemohon','jenissbu','jenisskt','jenisska')->find($id);
			// dd($ijin_siujk);
			return view('front_office.pupr.detail', compact('ijin_siujk','perijinan'));
		}
	}

	public function upload_perizinan($slug, $id, Request $request){
		$perijinan      = Perijinan::where('slug_perijinan',$slug)->first();
		if($perijinan->slug_perijinan == 'izin-pendidikan')
		{
			$ipen = IjinPendidikan::find($id);
			if($request->tipe_data == 'data_foto_direktur'){
				$request->validate([
					'foto_direktur' => 'required|max:5120'
				]);
				if(is_null($ipen->foto_direktur)){
					$file_foto = $request->foto_direktur;
					$filename = 'Foto_Direktur_'.date("dmYHis").'.'.$request->foto_direktur->extension();
					$file_foto->move(public_path('file/foto_direktur'), $filename);
				}else{
					unlink(public_path('file/foto_direktur').'/'.$ipen->foto_direktur);
					$file_foto = $request->foto_direktur;
					$filename = 'Foto_Direktur_'.date("dmYHis").'.'.$request->foto_direktur->extension();
					$file_foto->move(public_path('file/foto_direktur'), $filename);
				}
				$ipen->foto_direktur    = $filename;
			}elseif($request->tipe_data == 'data_denah_lokasi'){
				$request->validate([
					'denah_lokasi' => 'required|max:5120'
				]);
				if(is_null($ipen->denah_lokasi)){
					$file_foto = $request->denah_lokasi;
					$filename = 'Denah_Lokasi_'.date("dmYHis").'.'.$request->denah_lokasi->extension();
					$file_foto->move(public_path('file/denah_lokasi'), $filename);
				}else{
					unlink(public_path('file/denah_lokasi').'/'.$ipen->denah_lokasi);
					$file_foto = $request->denah_lokasi;
					$filename = 'Denah_Lokasi_'.date("dmYHis").'.'.$request->denah_lokasi->extension();
					$file_foto->move(public_path('file/denah_lokasi'), $filename);
				}
				$ipen->denah_lokasi     = $filename;
			}elseif($request->tipe_data == 'data_alamat_lokasi'){
				$request->validate([
					'alamat_lokasi' => 'required|max:5120'
				]);
				if(is_null($ipen->alamat_lokasi)){
					$file_foto = $request->alamat_lokasi;
					$filename = 'Alamat_Lokasi_'.date("dmYHis").'.'.$request->alamat_lokasi->extension();
					$file_foto->move(public_path('file/alamat_lokasi'), $filename);
				}else{
					unlink(public_path('file/alamat_lokasi').'/'.$ipen->alamat_lokasi);
					$file_foto = $request->alamat_lokasi;
					$filename = 'Alamat_Lokasi_'.date("dmYHis").'.'.$request->alamat_lokasi->extension();
					$file_foto->move(public_path('file/alamat_lokasi'), $filename);
				}
				$ipen->alamat_lokasi    = $filename;
			}elseif($request->tipe_data == 'data_akta_sewa'){
				$request->validate([
					'akta_sewa' => 'required|max:5120'
				]);
				if(is_null($ipen->akta_sewa)){
					$file_foto = $request->akta_sewa;
					$filename = 'Akta_Sewa_'.date("dmYHis").'.'.$request->akta_sewa->extension();
					$file_foto->move(public_path('file/akta_sewa'), $filename);
				}else{
					unlink(public_path('file/akta_sewa').'/'.$ipen->akta_sewa);
					$file_foto = $request->akta_sewa;
					$filename = 'Akta_Sewa_'.date("dmYHis").'.'.$request->akta_sewa->extension();
					$file_foto->move(public_path('file/akta_sewa'), $filename);
				}
				$ipen->akta_sewa    = $filename;
			}else{} 
			$ipen->save();
		}elseif($perijinan->slug_perijinan == 'izin-lingkungan'){
			$iling = IjinLingkungan::find($id);
			if($request->tipe_data == 'imb'){
				$request->validate([
					'data_imb'  =>  'required|max:5120'
				]);
				if(is_null($iling->data_imb)){
					$data_file = $request->data_imb;
					$filename = 'Data_IMB_'.date("dmYHis").'.'.$request->data_imb->extension();
					$data_file->move(public_path('file/data_imb'), $filename);
				}else{
					unlink(public_path('file/data_imb').'/'.$iling->data_imb);
					$data_file = $request->data_imb;
					$filename = 'Data_IMB_'.date("dmYHis").'.'.$request->data_imb->extension();
					$data_file->move(public_path('file/data_imb'), $filename);
				}
				$iling->data_imb    = $filename;
			}elseif($request->tipe_data == 'data_pengantar_dlh'){
				$request->validate([
					's_pengantar_dlh'   =>  'required|max:5120'
				]);
				if(is_null($iling->s_pengantar_dlh)){
					$data_file = $request->s_pengantar_dlh;
					$filename = 'pengantar_dlh_'.date("dmYHis").'.'.$request->s_pengantar_dlh->extension();
					$data_file->move(public_path('file/pengantar_dlh'), $filename);
				}else{
					unlink(public_path('file/s_pengantar_dlh').'/'.$iling->s_pengantar_dlh);
					$data_file = $request->s_pengantar_dlh;
					$filename = 'pengantar_dlh_'.date("dmYHis").'.'.$request->s_pengantar_dlh->extension();
					$data_file->move(public_path('file/pengantar_dlh'), $filename);
				}
				$iling->s_pengantar_dlh     = $filename;
			}elseif($request->tipe_data == 'data_pendirian_usaha'){
				$request->validate([
					'd_pendirian_usaha' =>  'required|max:5120'
				]);
				if(is_null($iling->d_pendirian_usaha)){
					$data_file = $request->d_pendirian_usaha;
					$filename = 'pendirian_usaha_'.date("dmYHis").'.'.$request->d_pendirian_usaha->extension();
					$data_file->move(public_path('file/pendirian_usaha'), $filename);
				}else{
					unlink(public_path('file/d_pendirian_usaha').'/'.$iling->d_pendirian_usaha);
					$data_file = $request->d_pendirian_usaha;
					$filename = 'pendirian_usaha_'.date("dmYHis").'.'.$request->d_pendirian_usaha->extension();
					$data_file->move(public_path('file/pendirian_usaha'), $filename);
				}
				$iling->d_pendirian_usaha   = $filename;
			}elseif($request->tipe_data == 'data_izin_usaha'){
				$request->validate([
					'izin_usaha'    =>  'required|max:5120'
				]);
				if(is_null($iling->izin_usaha)){
					$data_file = $request->izin_usaha;
					$filename = 'izin_usaha_'.date("dmYHis").'.'.$request->izin_usaha->extension();
					$data_file->move(public_path('file/izin_usaha'), $filename);
				}else{
					unlink(public_path('file/izin_usaha').'/'.$iling->izin_usaha);
					$data_file = $request->izin_usaha;
					$filename = 'izin_usaha_'.date("dmYHis").'.'.$request->izin_usaha->extension();
					$data_file->move(public_path('file/izin_usaha'), $filename);
				}
				$iling->izin_usaha  = $filename;
			}elseif($request->tipe_data == 'data_fc_ktp'){
				$request->validate([
					'fc_ktp'    =>  'required|max:5120'
				]);
				if(is_null($iling->fc_ktp)){
					$data_file = $request->fc_ktp;
					$filename = 'fc_ktp_'.date("dmYHis").'.'.$request->fc_ktp->extension();
					$data_file->move(public_path('file/fc_ktp'), $filename);
				}else{
					unlink(public_path('file/fc_ktp').'/'.$iling->fc_ktp);
					$data_file = $request->fc_ktp;
					$filename = 'fc_ktp_'.date("dmYHis").'.'.$request->fc_ktp->extension();
					$data_file->move(public_path('file/fc_ktp'), $filename);
				}
				$iling->fc_ktp  = $filename;
			}elseif($request->tipe_data == 'data_slf'){
				$request->validate([
					'slf'   =>  'required|max:5120'
				]);
				if(is_null($iling->slf)){
					$data_file = $request->slf;
					$filename = 'slf_'.date("dmYHis").'.'.$request->slf->extension();
					$data_file->move(public_path('file/slf'), $filename);
				}else{
					unlink(public_path('file/slf').'/'.$iling->slf);
					$data_file = $request->slf;
					$filename = 'slf_'.date("dmYHis").'.'.$request->slf->extension();
					$data_file->move(public_path('file/slf'), $filename);
				}
				$iling->slf     = $filename;
			}elseif($request->tipe_data == 'data_d_nib'){
				$request->validate([
					'd_nib' =>  'required|max:5120'
				]);
				if(is_null($iling->d_nib)){
					$data_file = $request->d_nib;
					$filename = 'd_nib_'.date("dmYHis").'.'.$request->d_nib->extension();
					$data_file->move(public_path('file/d_nib'), $filename);
				}else{
					unlink(public_path('file/d_nib').'/'.$iling->d_nib);
					$data_file = $request->d_nib;
					$filename = 'd_nib_'.date("dmYHis").'.'.$request->d_nib->extension();
					$data_file->move(public_path('file/d_nib'), $filename);
				}
				$iling->d_nib   = $filename;
			}elseif($request->tipe_data == 'data_i_lokasi'){
				$request->validate([
					'i_lokasi'  =>  'required|max:5120'
				]);
				if(is_null($iling->i_lokasi)){
					$data_file = $request->i_lokasi;
					$filename = 'i_lokasi_'.date("dmYHis").'.'.$request->i_lokasi->extension();
					$data_file->move(public_path('file/i_lokasi'), $filename);
				}else{
					unlink(public_path('file/i_lokasi').'/'.$iling->i_lokasi);
					$data_file = $request->i_lokasi;
					$filename = 'i_lokasi_'.date("dmYHis").'.'.$request->i_lokasi->extension();
					$data_file->move(public_path('file/i_lokasi'), $filename);
				}
				$iling->i_lokasi    = $filename;
			}elseif($request->tipe_data == 'data_d_ukl'){
				$request->validate([
					'd_ukl' =>  'required|max:5120'
				]);
				if(is_null($iling->d_ukl)){
					$data_file = $request->d_ukl;
					$filename = 'd_ukl_'.date("dmYHis").'.'.$request->d_ukl->extension();
					$data_file->move(public_path('file/d_ukl'), $filename);
				}else{
					unlink(public_path('file/d_ukl').'/'.$iling->d_ukl);
					$data_file = $request->d_ukl;
					$filename = 'd_ukl_'.date("dmYHis").'.'.$request->d_ukl->extension();
					$data_file->move(public_path('file/d_ukl'), $filename);
				}
				$iling->d_ukl   = $filename;
			}elseif($request->tipe_data == 'data_npwp_pribadi'){
				$request->validate([
					'npwp_pribadi'  =>  'required|max:5120'
				]);
				if(is_null($iling->npwp_pribadi)){
					$data_file = $request->npwp_pribadi;
					$filename = 'npwp_pribadi_'.date("dmYHis").'.'.$request->npwp_pribadi->extension();
					$data_file->move(public_path('file/npwp_pribadi'), $filename);
				}else{
					unlink(public_path('file/npwp_pribadi').'/'.$iling->npwp_pribadi);
					$data_file = $request->npwp_pribadi;
					$filename = 'npwp_pribadi_'.date("dmYHis").'.'.$request->npwp_pribadi->extension();
					$data_file->move(public_path('file/npwp_pribadi'), $filename);
				}
				$iling->npwp_pribadi    = $filename;
			}elseif($request->tipe_data == 'data_i_operasional'){
				$request->validate([
					'i_operasional' =>  'required|max:5120'
				]);
				if(is_null($iling->i_operasional)){
					$data_file = $request->i_operasional;
					$filename = 'i_operasional_'.date("dmYHis").'.'.$request->i_operasional->extension();
					$data_file->move(public_path('file/i_operasional'), $filename);
				}else{
					unlink(public_path('file/i_operasional').'/'.$iling->i_operasional);
					$data_file = $request->i_operasional;
					$filename = 'i_operasional_'.date("dmYHis").'.'.$request->i_operasional->extension();
					$data_file->move(public_path('file/i_operasional'), $filename);
				}
				$iling->i_operasional   = $filename;
			}elseif($request->tipe_data == 'data_sk_dpmptsp'){
				$request->validate([
					'sk_dpmptsp'    =>  'required|max:5120'
				]);
				if(is_null($iling->sk_dpmptsp)){
					$data_file = $request->sk_dpmptsp;
					$filename = 'sk_dpmptsp_'.date("dmYHis").'.'.$request->sk_dpmptsp->extension();
					$data_file->move(public_path('file/sk_dpmptsp'), $filename);
				}else{
					unlink(public_path('file/sk_dpmptsp').'/'.$iling->sk_dpmptsp);
					$data_file = $request->sk_dpmptsp;
					$filename = 'sk_dpmptsp_'.date("dmYHis").'.'.$request->sk_dpmptsp->extension();
					$data_file->move(public_path('file/sk_dpmptsp'), $filename);
				}
				$iling->sk_dpmptsp  = $filename;
			}elseif($request->tipe_data == 'data_dp_usaha'){
				$request->validate([
					'dp_usaha'  =>  'required|max:5120'
				]);
				if(is_null($iling->dp_usaha)){
					$data_file = $request->dp_usaha;
					$filename = 'dp_usaha_'.date("dmYHis").'.'.$request->dp_usaha->extension();
					$data_file->move(public_path('file/dp_usaha'), $filename);
				}else{
					unlink(public_path('file/dp_usaha').'/'.$iling->dp_usaha);
					$data_file = $request->dp_usaha;
					$filename = 'dp_usaha_'.date("dmYHis").'.'.$request->dp_usaha->extension();
					$data_file->move(public_path('file/dp_usaha'), $filename);
				}
				$iling->dp_usaha    = $filename;
			}elseif($request->tipe_data == 'data_npwp_bhukum'){
				$request->validate([
					'npwp_bhukum'   =>  'required|max:5120'
				]);
				if(is_null($iling->npwp_bhukum)){
					$data_file = $request->npwp_bhukum;
					$filename = 'npwp_bhukum_'.date("dmYHis").'.'.$request->npwp_bhukum->extension();
					$data_file->move(public_path('file/npwp_bhukum'), $filename);
				}else{
					unlink(public_path('file/npwp_bhukum').'/'.$iling->npwp_bhukum);
					$data_file = $request->npwp_bhukum;
					$filename = 'npwp_bhukum_'.date("dmYHis").'.'.$request->npwp_bhukum->extension();
					$data_file->move(public_path('file/npwp_bhukum'), $filename);
				}
				$iling->npwp_bhukum     = $filename;
			}else{}
			$iling->save();
		}elseif($perijinan->slug_perijinan == 'siujk'){
			$iling = IjinSiujk::find($id);
			if($request->tipe_data == 'data_syarat1'){
				$request->validate([
					'syarat1'   =>  'required|max:5120'
				]);
				if(is_null($iling->syarat1)){
					$data_file = $request->syarat1;
					$filename = 'syarat1_'.date("dmYHis").'.'.$request->syarat1->extension();
					$data_file->move(public_path('file/syarat1'), $filename);
				}else{
					unlink(public_path('file/syarat1').'/'.$iling->syarat1);
					$data_file = $request->syarat1;
					$filename = 'syarat1_'.date("dmYHis").'.'.$request->syarat1->extension();
					$data_file->move(public_path('file/syarat1'), $filename);
				}
				$iling->syarat1     = $filename;
			}elseif($request->tipe_data == 'data_syarat2'){
				$request->validate([
					'syarat2'   =>  'required|max:5120'
				]);
				if(is_null($iling->syarat2)){
					$data_file = $request->syarat2;
					$filename = 'syarat2_'.date("dmYHis").'.'.$request->syarat2->extension();
					$data_file->move(public_path('file/syarat2'), $filename);
				}else{
					unlink(public_path('file/syarat2').'/'.$iling->syarat2);
					$data_file = $request->syarat2;
					$filename = 'syarat2_'.date("dmYHis").'.'.$request->syarat2->extension();
					$data_file->move(public_path('file/syarat2'), $filename);
				}
				$iling->syarat2     = $filename;
			}elseif($request->tipe_data == 'data_syarat3'){
				$request->validate([
					'syarat3'   =>  'required|max:5120'
				]);
				if(is_null($iling->syarat3)){
					$data_file = $request->syarat3;
					$filename = 'syarat3_'.date("dmYHis").'.'.$request->syarat3->extension();
					$data_file->move(public_path('file/syarat3'), $filename);
				}else{
					unlink(public_path('file/syarat3').'/'.$iling->syarat3);
					$data_file = $request->syarat3;
					$filename = 'syarat3_'.date("dmYHis").'.'.$request->syarat3->extension();
					$data_file->move(public_path('file/syarat3'), $filename);
				}
				$iling->syarat3     = $filename;
			}elseif($request->tipe_data == 'data_syarat4'){
				$request->validate([
					'syarat4'   =>  'required|max:5120'
				]);
				if(is_null($iling->syarat4)){
					$data_file = $request->syarat4;
					$filename = 'syarat4_'.date("dmYHis").'.'.$request->syarat4->extension();
					$data_file->move(public_path('file/syarat4'), $filename);
				}else{
					unlink(public_path('file/syarat4').'/'.$iling->syarat4);
					$data_file = $request->syarat4;
					$filename = 'syarat4_'.date("dmYHis").'.'.$request->syarat4->extension();
					$data_file->move(public_path('file/syarat4'), $filename);
				}
				$iling->syarat4     = $filename;
			}elseif($request->tipe_data == 'data_syarat5'){
				$request->validate([
					'syarat5'   =>  'required|max:5120'
				]);
				if(is_null($iling->syarat5)){
					$data_file = $request->syarat5;
					$filename = 'syarat5_'.date("dmYHis").'.'.$request->syarat5->extension();
					$data_file->move(public_path('file/syarat5'), $filename);
				}else{
					unlink(public_path('file/syarat5').'/'.$iling->syarat5);
					$data_file = $request->syarat5;
					$filename = 'syarat5_'.date("dmYHis").'.'.$request->syarat5->extension();
					$data_file->move(public_path('file/syarat5'), $filename);
				}
				$iling->syarat5     = $filename;
			}elseif($request->tipe_data == 'data_syarat6'){
				$request->validate([
					'syarat6'   =>  'required|max:5120'
				]);
				if(is_null($iling->syarat6)){
					$data_file = $request->syarat6;
					$filename = 'syarat6_'.date("dmYHis").'.'.$request->syarat6->extension();
					$data_file->move(public_path('file/syarat6'), $filename);
				}else{
					unlink(public_path('file/syarat6').'/'.$iling->syarat6);
					$data_file = $request->syarat6;
					$filename = 'syarat6_'.date("dmYHis").'.'.$request->syarat6->extension();
					$data_file->move(public_path('file/syarat6'), $filename);
				}
				$iling->syarat6     = $filename;
			}elseif($request->tipe_data == 'data_syarat7'){
				$request->validate([
					'syarat7'   =>  'required|max:5120'
				]);
				if(is_null($iling->syarat7)){
					$data_file = $request->syarat7;
					$filename = 'syarat7_'.date("dmYHis").'.'.$request->syarat7->extension();
					$data_file->move(public_path('file/syarat7'), $filename);
				}else{
					unlink(public_path('file/syarat7').'/'.$iling->syarat7);
					$data_file = $request->syarat7;
					$filename = 'syarat7_'.date("dmYHis").'.'.$request->syarat7->extension();
					$data_file->move(public_path('file/syarat7'), $filename);
				}
				$iling->syarat7     = $filename;
			}elseif($request->tipe_data == 'data_syarat8'){
				$request->validate([
					'syarat8'   =>  'required|max:5120'
				]);
				if(is_null($iling->syarat8)){
					$data_file = $request->syarat8;
					$filename = 'syarat8_'.date("dmYHis").'.'.$request->syarat8->extension();
					$data_file->move(public_path('file/syarat8'), $filename);
				}else{
					unlink(public_path('file/syarat8').'/'.$iling->syarat8);
					$data_file = $request->syarat8;
					$filename = 'syarat8_'.date("dmYHis").'.'.$request->syarat8->extension();
					$data_file->move(public_path('file/syarat8'), $filename);
				}
				$iling->syarat8     = $filename;
			}elseif($request->tipe_data == 'data_syarat9'){
				$request->validate([
					'syarat9'   =>  'required|max:5120'
				]);
				if(is_null($iling->syarat9)){
					$data_file = $request->syarat9;
					$filename = 'syarat9_'.date("dmYHis").'.'.$request->syarat9->extension();
					$data_file->move(public_path('file/syarat9'), $filename);
				}else{
					unlink(public_path('file/syarat9').'/'.$iling->syarat9);
					$data_file = $request->syarat9;
					$filename = 'syarat9_'.date("dmYHis").'.'.$request->syarat9->extension();
					$data_file->move(public_path('file/syarat9'), $filename);
				}
				$iling->syarat9     = $filename;
			}elseif($request->tipe_data == 'data_syarat10'){
				$request->validate([
					'syarat10'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat10)){
					$data_file = $request->syarat10;
					$filename = 'syarat10_'.date("dmYHis").'.'.$request->syarat10->extension();
					$data_file->move(public_path('file/syarat10'), $filename);
				}else{
					unlink(public_path('file/syarat10').'/'.$iling->syarat10);
					$data_file = $request->syarat10;
					$filename = 'syarat10_'.date("dmYHis").'.'.$request->syarat10->extension();
					$data_file->move(public_path('file/syarat10'), $filename);
				}
				$iling->syarat10    = $filename;
			}elseif($request->tipe_data == 'data_syarat11'){
				$request->validate([
					'syarat11'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat11)){
					$data_file = $request->syarat11;
					$filename = 'syarat11_'.date("dmYHis").'.'.$request->syarat11->extension();
					$data_file->move(public_path('file/syarat11'), $filename);
				}else{
					unlink(public_path('file/syarat11').'/'.$iling->syarat11);
					$data_file = $request->syarat11;
					$filename = 'syarat11_'.date("dmYHis").'.'.$request->syarat11->extension();
					$data_file->move(public_path('file/syarat11'), $filename);
				}
				$iling->syarat11    = $filename;
			}elseif($request->tipe_data == 'data_syarat12'){
				$request->validate([
					'syarat12'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat12)){
					$data_file = $request->syarat12;
					$filename = 'syarat12_'.date("dmYHis").'.'.$request->syarat12->extension();
					$data_file->move(public_path('file/syarat12'), $filename);
				}else{
					unlink(public_path('file/syarat12').'/'.$iling->syarat12);
					$data_file = $request->syarat12;
					$filename = 'syarat12_'.date("dmYHis").'.'.$request->syarat12->extension();
					$data_file->move(public_path('file/syarat12'), $filename);
				}
				$iling->syarat12    = $filename;
			}elseif($request->tipe_data == 'data_syarat13'){
				$request->validate([
					'syarat13'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat13)){
					$data_file = $request->syarat13;
					$filename = 'syarat13_'.date("dmYHis").'.'.$request->syarat13->extension();
					$data_file->move(public_path('file/syarat13'), $filename);
				}else{
					unlink(public_path('file/syarat13').'/'.$iling->syarat13);
					$data_file = $request->syarat13;
					$filename = 'syarat13_'.date("dmYHis").'.'.$request->syarat13->extension();
					$data_file->move(public_path('file/syarat13'), $filename);
				}
				$iling->syarat13    = $filename;
			}elseif($request->tipe_data == 'data_syarat14'){
				$request->validate([
					'syarat14'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat14)){
					$data_file = $request->syarat14;
					$filename = 'syarat14_'.date("dmYHis").'.'.$request->syarat14->extension();
					$data_file->move(public_path('file/syarat14'), $filename);
				}else{
					unlink(public_path('file/syarat14').'/'.$iling->syarat14);
					$data_file = $request->syarat14;
					$filename = 'syarat14_'.date("dmYHis").'.'.$request->syarat14->extension();
					$data_file->move(public_path('file/syarat14'), $filename);
				}
				$iling->syarat14    = $filename;
			}elseif($request->tipe_data == 'data_syarat15'){
				$request->validate([
					'syarat15'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat15)){
					$data_file = $request->syarat15;
					$filename = 'syarat15_'.date("dmYHis").'.'.$request->syarat15->extension();
					$data_file->move(public_path('file/syarat15'), $filename);
				}else{
					unlink(public_path('file/syarat15').'/'.$iling->syarat15);
					$data_file = $request->syarat15;
					$filename = 'syarat15_'.date("dmYHis").'.'.$request->syarat15->extension();
					$data_file->move(public_path('file/syarat15'), $filename);
				}
				$iling->syarat15    = $filename;
			}elseif($request->tipe_data == 'data_syarat16'){
				$request->validate([
					'syarat16'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat16)){
					$data_file = $request->syarat16;
					$filename = 'syarat16_'.date("dmYHis").'.'.$request->syarat16->extension();
					$data_file->move(public_path('file/syarat16'), $filename);
				}else{
					unlink(public_path('file/syarat16').'/'.$iling->syarat16);
					$data_file = $request->syarat16;
					$filename = 'syarat16_'.date("dmYHis").'.'.$request->syarat16->extension();
					$data_file->move(public_path('file/syarat16'), $filename);
				}
				$iling->syarat16    = $filename;
			}elseif($request->tipe_data == 'data_syarat17'){
				$request->validate([
					'syarat17'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat17)){
					$data_file = $request->syarat17;
					$filename = 'syarat17_'.date("dmYHis").'.'.$request->syarat17->extension();
					$data_file->move(public_path('file/syarat17'), $filename);
				}else{
					unlink(public_path('file/syarat17').'/'.$iling->syarat17);
					$data_file = $request->syarat17;
					$filename = 'syarat17_'.date("dmYHis").'.'.$request->syarat17->extension();
					$data_file->move(public_path('file/syarat17'), $filename);
				}
				$iling->syarat17    = $filename;
			}elseif($request->tipe_data == 'data_syarat18'){
				$request->validate([
					'syarat18'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat18)){
					$data_file = $request->syarat18;
					$filename = 'syarat18_'.date("dmYHis").'.'.$request->syarat18->extension();
					$data_file->move(public_path('file/syarat18'), $filename);
				}else{
					unlink(public_path('file/syarat18').'/'.$iling->syarat18);
					$data_file = $request->syarat18;
					$filename = 'syarat18_'.date("dmYHis").'.'.$request->syarat18->extension();
					$data_file->move(public_path('file/syarat18'), $filename);
				}
				$iling->syarat18    = $filename;
			}elseif($request->tipe_data == 'data_syarat19'){
				$request->validate([
					'syarat19'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat19)){
					$data_file = $request->syarat19;
					$filename = 'syarat19_'.date("dmYHis").'.'.$request->syarat19->extension();
					$data_file->move(public_path('file/syarat19'), $filename);
				}else{
					unlink(public_path('file/syarat19').'/'.$iling->syarat19);
					$data_file = $request->syarat19;
					$filename = 'syarat19_'.date("dmYHis").'.'.$request->syarat19->extension();
					$data_file->move(public_path('file/syarat19'), $filename);
				}
				$iling->syarat19    = $filename;
			}elseif($request->tipe_data == 'data_syarat20'){
				$request->validate([
					'syarat20'  =>  'required|max:5120'
				]);
				if(is_null($iling->syarat20)){
					$data_file = $request->syarat20;
					$filename = 'syarat20_'.date("dmYHis").'.'.$request->syarat20->extension();
					$data_file->move(public_path('file/syarat20'), $filename);
				}else{
					unlink(public_path('file/syarat20').'/'.$iling->syarat20);
					$data_file = $request->syarat20;
					$filename = 'syarat20_'.date("dmYHis").'.'.$request->syarat20->extension();
					$data_file->move(public_path('file/syarat20'), $filename);
				}
				$iling->syarat20    = $filename;
			}else{}
			$iling->save();
		}else{}
		return redirect()->back()->with('message','Upload Berhasil');
	}

	public function deleteperijinan($slug, $id){
		$perijinan      = Perijinan::where('slug_perijinan',$slug)->first();
		if($perijinan->slug_perijinan == 'izin-pendidikan')
		{
			IjinPendidikan::find($id)->delete();
		}elseif ($perijinan->slug_perijinan == 'izin-lingkungan') {
			IjinLingkungan::find($id)->delete();
		}elseif($perijinan->slug_perijinan == 'siujk'){
			IjinSiujk::find($id)->delete();
		}else{}
		return redirect()->back()->with('message','Delete Perijinan '.$slug.' berhasil.');
	}

}
