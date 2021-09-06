<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FrontController extends Controller
{
	public function pendaftaran_pemohon_user(Request $request)
	{
		$userData = $request->validate([
			'email' 		=> 'required|string|email|max:255|unique:users',
			'password' 		=> 'required|string|min:8|confirmed',
			'foto_profil'	=> 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
		]);
		$foto_profil 		= $request->foto_profil;
		$fotoProfilName		= time().'_'.Str::slug($request->nama_lengkap,'_').'.'.$foto_profil->getClientOriginalExtension();
		$foto_profil->move(public_path('img/user_profile'), $fotoProfilName);
		$user 						= new User;
		$user->name 				= $request->nama_lengkap;
		$user->email 				= $request->email;
		$user->email_verified_at 	= now();
		$user->remember_token 		= Str::random(15);
		$user->password 			= Hash::make($request->password);
		$user->is_pemohon			= '1';
		$user->foto_profil			= $fotoProfilName;
		$user->save();

		$pemohonData = $request->validate([
			'nik'			=> 'required',
			'nama_lengkap'	=> 'required',
			'pekerjaan'		=> 'required',
			'jenis_kelamin'	=> 'required',
			'tempat_lahir'	=> 'required',
			'tanggal_lahir'	=> 'required',
			'rt'			=> 'required',
			'rw'			=> 'required',
			'alamat'		=> 'required',
			'npwp'			=> 'required',
			'no_telp'		=> 'required',
		]);
		$pemohon 			= Pemohon::create($pemohonData);
		$pemohon->user_id 	= $user->id;
		$pemohon->save();

		return redirect()->route('login')->with('message','Pendaftaran Pemohon Berhasil !. Silahkan Login.');
	}
}