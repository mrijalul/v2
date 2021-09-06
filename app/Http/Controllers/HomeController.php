<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;
use App\User;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	//index
	public function index()
	{
		return view('home');
	}

	// pemohon
	public function pemohonHome()
	{
		$page 			= 'Dashboard Pemohon';
		$user_pemohon 	= Pemohon::where('user_id','=',auth()->user()->id)->first();
		return view('pemohon.home', compact('page','user_pemohon'));
	}

	public function pemohondashboardpost(Request $request)
	{
		$lastpemohonid 			= Pemohon::orderBy('id','desc')->first();
		// pengecekan jika id masih kosong
		if(is_null($lastpemohonid)){
			$generate_id 	= 'PMHN-'.date("dmYHi").'0';
		}else{
			$generate_id 	= 'PMHN-'.date("dmYHi").$lastpemohonid->id;
		}
		$pemohon 					= Pemohon::create($request->all());
		$pemohon->kode_pemohon		= $generate_id;
		$pemohon->registered_id		= auth()->user()->id;
		$pemohon->registered_name	= auth()->user()->name;
		$pemohon->user_id			= auth()->user()->id;
		$pemohon->save();

		return redirect()->back()->with('message','Update Data Pemohon Berhasil');
	}
	public function pemohondashboardupdate($id,$user_id, Request $request)
	{
		$pemohon = Pemohon::find($id);
		$pemohon->nik			= $request->nik;
		$pemohon->nama_lengkap	= $request->nama_lengkap;
		$pemohon->pekerjaan		= $request->pekerjaan;
		$pemohon->jenis_kelamin	= $request->jenis_kelamin;
		$pemohon->tempat_lahir	= $request->tempat_lahir;
		$pemohon->tanggal_lahir	= $request->tanggal_lahir;
		$pemohon->rt			= $request->rt;
		$pemohon->rw			= $request->rw;
		$pemohon->alamat		= $request->alamat;
		$pemohon->npwp			= $request->npwp;
		$pemohon->no_telp		= $request->no_telp;
		$pemohon->save();

		$user 		= User::find($user_id);
		$user->name = $request->nama_lengkap;
		$user->save();
		return redirect()->back()->with('message','Update Data Pemohon Berhasil');
	}

	// bagian pemeriksa
	public function bagPemeriksaHome()
	{
		return view('bagian_pemeriksa.home');
	}

	// front office
	public function frontOfficeHome()
	{
		$page		= 'Dashboard Pemohon';
		$user_fo 	= Pemohon::where('user_id','=',auth()->user()->id)->first();
		return view('front_office.home', compact('page','user_fo'));
	}
	public function fodashboardpost(Request $request)
	{
		$lastpemohonid 		= Pemohon::orderBy('id','desc')->first();
		// pengecekan jika id masih kosong
		if(is_null($lastpemohonid)){
			$generate_id 	= 'PMHN-'.date("dmYHi").'0';
		}else{
			$generate_id 	= 'PMHN-'.date("dmYHi").$lastpemohonid->id;
		}
		$pemohon 					= Pemohon::create($request->all());
		$pemohon->kode_pemohon		= $generate_id;
		$pemohon->registered_id		= auth()->user()->id;
		$pemohon->registered_name	= auth()->user()->name;
		$pemohon->user_id			= auth()->user()->id;
		$pemohon->save();

		return redirect()->back()->with('message','Update Data Pemohon Berhasil');
	}
	public function fodashboardupdate($id,$user_id, Request $request)
	{
		$pemohon = Pemohon::find($id);
		$pemohon->nik			= $request->nik;
		$pemohon->nama_lengkap	= $request->nama_lengkap;
		$pemohon->pekerjaan		= $request->pekerjaan;
		$pemohon->jenis_kelamin	= $request->jenis_kelamin;
		$pemohon->tempat_lahir	= $request->tempat_lahir;
		$pemohon->tanggal_lahir	= $request->tanggal_lahir;
		$pemohon->rt			= $request->rt;
		$pemohon->rw			= $request->rw;
		$pemohon->alamat		= $request->alamat;
		$pemohon->npwp			= $request->npwp;
		$pemohon->no_telp		= $request->no_telp;
		$pemohon->save();

		$user 		= User::find($user_id);
		$user->name = $request->nama_lengkap;
		$user->save();
		return redirect()->back()->with('message','Update Data Pemohon Berhasil');
	}
}
