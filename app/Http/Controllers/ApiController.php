<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;
use App\Models\DataSbu;
use App\Models\DataSkaSkt;

class ApiController extends Controller
{
	public function getdatapemohon(Request $request)
	{
		$search = $request->search;
		if($search == ''){
			$pemohons = Pemohon::orderBy('id','desc')->select('id','nama_lengkap')->limit(10)->get();
		}else{
			$pemohons = Pemohon::orderBy('id','desc')->select('id','nama_lengkap')->where('nama_lengkap','like','%'.$search.'%')->limit(10)->get();
		}
		$response = [];
		foreach ($pemohons as $pemohon) {
			$response[] = [
				'id'	=> $pemohon->id,
				'text'	=> $pemohon->nama_lengkap
			];
		}
		echo json_encode($response);
		exit;
	}
	public function getdatajenissbu(Request $request){
		$search = $request->search;
		if($search == ''){
			$datasbu = DataSbu::orderBy('id','desc')->select('id','jenis_sbu')->limit(10)->get();
		}else{
			$datasbu = DataSbu::orderBy('id','desc')->select('id','jenis_sbu')->where('jenis_sbu','like','%'.$search.'%')->limit(10)->get();
		}
		$response = [];
		foreach ($datasbu as $sbu) {
			$response[] = [
				'id'	=> $sbu->id,
				'text'	=> $sbu->jenis_sbu
			];
		}
		echo json_encode($response);
		exit; 
	}
	public function getdatajenisskt(Request $request){
		$search = $request->search;
		if($search == ''){
			$dataskt = DataSkaSkt::orderBy('id','desc')->select('id','jenis_ska_skt')->limit(10)->get();
		}else{
			$dataskt = DataSkaSkt::orderBy('id','desc')->select('id','jenis_ska_skt')->where('jenis_ska_skt','like','%'.$search.'%')->limit(10)->get();
		}
		$response = [];
		foreach ($dataskt as $skt) {
			$response[] = [
				'id'	=> $skt->id,
				'text'	=> $skt->jenis_ska_skt
			];
		}
		echo json_encode($response);
		exit; 
	}
	public function getdatajenisska(Request $request){
		$search = $request->search;
		if($search == ''){
			$dataska = DataSkaSkt::orderBy('id','desc')->select('id','jenis_ska_skt')->limit(10)->get();
		}else{
			$dataska = DataSkaSkt::orderBy('id','desc')->select('id','jenis_ska_skt')->where('jenis_ska_skt','like','%'.$search.'%')->limit(10)->get();
		}
		$response = [];
		foreach ($dataska as $ska) {
			$response[] = [
				'id'	=> $ska->id,
				'text'	=> $ska->jenis_ska_skt
			];
		}
		echo json_encode($response);
		exit;
	}
}
