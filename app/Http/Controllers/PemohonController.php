<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PemohonController extends Controller
{
	public function index()
	{
		$page		= 'Pendaftaran Pemohon';
		$pemohons	= Pemohon::orderBy('id','desc')->where('registered_id','=',auth()->user()->id)->get();
		// dd($pemohons);
		return view('pemohon.pemohons.index', compact('page','pemohons'));
	}

	public function store(Request $request)
	{
		// start cek foto profil 
		if($request->hasFile('foto_profil')){
			$foto_profil	= $request->foto_profil;
			$fotoProfilName	= time().'_'.Str::slug($request->nama_lengkap,'_').'.'.$foto_profil->getClientOriginalExtension();
			$foto_profil->move(public_path('img/user_profile'), $fotoProfilName);
		}else
		{
			$fotoProfilName = 'user_default.png';
		}
		// end cek foto profil 
		$lastpemohonid 			= Pemohon::orderBy('id','desc')->first();
		$generate_id 			= 'PMHN-'.date("dmYHi").$lastpemohonid->id;
		// dd($generate_id);
		$user						= new User;
		$user->name					= $request->nama_lengkap;
		$user->email				= $request->email;
		$user->email_verified_at	= now();
		$user->remember_token		= Str::random(15);
		$user->password				= Hash::make($request->password);
		$user->is_pemohon			= '1';
		$user->foto_profil			= $fotoProfilName;
		$user->save();
		$user_id				= $user->id;
		// pemohon
		$pemohon					= new Pemohon;
		$pemohon->kode_pemohon		= $generate_id;
		$pemohon->registered_id		= auth()->user()->id;
		$pemohon->registered_name	= auth()->user()->name;
		$pemohon->user_id			= $user->id;
		$pemohon->nik				= $request->nik;
		$pemohon->nama_lengkap		= $request->nama_lengkap;
		$pemohon->pekerjaan			= $request->pekerjaan;
		$pemohon->jenis_kelamin		= $request->jenis_kelamin;
		$pemohon->tempat_lahir		= $request->tempat_lahir;
		$pemohon->tanggal_lahir		= $request->tanggal_lahir;
		$pemohon->rt				= $request->rt;
		$pemohon->rw				= $request->rw;
		$pemohon->alamat			= $request->alamat;
		$pemohon->npwp				= $request->npwp;
		$pemohon->no_telp			= $request->no_telp;
		$pemohon->save();

		return redirect()->back()->with('message','Pendaftaran Pemohon Berhasil.');
	}

	public function foindex()
	{
		$page		= 'Pendaftaran Pemohon';
		$pemohons	= Pemohon::orderBy('id','desc')->where('registered_id','=',auth()->user()->id)->get();
		// dd($pemohons);
		return view('front_office.pemohons.index', compact('page','pemohons'));
	}
	public function fostore(Request $request)
	{
		// start cek foto profil 
		if($request->hasFile('foto_profil')){
			$foto_profil	= $request->foto_profil;
			$fotoProfilName	= time().'_'.Str::slug($request->nama_lengkap,'_').'.'.$foto_profil->getClientOriginalExtension();
			$foto_profil->move(public_path('img/user_profile'), $fotoProfilName);
		}else
		{
			$fotoProfilName = 'user_default.png';
		}
		// end cek foto profil 
		$lastpemohonid 			= Pemohon::orderBy('id','desc')->first();
		$generate_id 			= 'PMHN-'.date("dmYHi").$lastpemohonid->id;
		// dd($generate_id);
		$user						= new User;
		$user->name					= $request->nama_lengkap;
		$user->email				= $request->email;
		$user->email_verified_at	= now();
		$user->remember_token		= Str::random(15);
		$user->password				= Hash::make($request->password);
		$user->is_pemohon			= '1';
		$user->foto_profil			= $fotoProfilName;
		$user->save();
		$user_id				= $user->id;
		// pemohon
		$pemohon					= new Pemohon;
		$pemohon->kode_pemohon		= $generate_id;
		$pemohon->registered_id		= auth()->user()->id;
		$pemohon->registered_name	= auth()->user()->name;
		$pemohon->user_id			= $user->id;
		$pemohon->nik				= $request->nik;
		$pemohon->nama_lengkap		= $request->nama_lengkap;
		$pemohon->pekerjaan			= $request->pekerjaan;
		$pemohon->jenis_kelamin		= $request->jenis_kelamin;
		$pemohon->tempat_lahir		= $request->tempat_lahir;
		$pemohon->tanggal_lahir		= $request->tanggal_lahir;
		$pemohon->rt				= $request->rt;
		$pemohon->rw				= $request->rw;
		$pemohon->alamat			= $request->alamat;
		$pemohon->npwp				= $request->npwp;
		$pemohon->no_telp			= $request->no_telp;
		$pemohon->save();

		return redirect()->back()->with('message','Pendaftaran Pemohon Berhasil.');
	}
}
