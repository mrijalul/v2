@extends('layouts.app')

@section('title')
{{ $ijin_siujk->kode_pendaftaran }} | {{ $perijinan->nama_perijinan }}
@endsection

@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Detail {{ $perijinan->nama_perijinan }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item"><a href="#">{{ $perijinan->singkatan_perijinan }}</a></li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		@if(session()->has('message'))
		<div class="bs-component">
			<div class="alert alert-dismissible alert-success">
				<button class="close" type="button" data-dismiss="alert">×</button><strong>{{ session()->get('message') }}</strong>
			</div>
		</div>
		@endif
		<div class="tile">
			<section class="invoice">
				<div class="row mb-4">
					<div class="col-6">
						<h2 class="page-header"><i class="fa fa-bell"></i> {{ $ijin_siujk->kode_pendaftaran }}</h2>
					</div>
					<div class="col-6">
						<h5 class="text-right">Tanggal Daftar: {{ $ijin_siujk->tanggal_daftar }}</h5>
					</div>
				</div>
				<div class="row invoice-info">
					<div class="col-6">
						<strong>Status Ijin :</strong>{{ $ijin_siujk->datastatus->nama_status }}<br>
						@if($ijin_siujk->pemohon_id == 0)
						<strong>NIK :</strong>-<br>
						<strong>Nama Lengkap :</strong>-<br>
						<strong>Pekerjaan :</strong>-<br>
						<strong>Jenis Kelamin :</strong>-<br>
						<strong>Tempat/Tanggal Lahir :</strong>-<br>
						<strong>RT/RW :</strong>-<br>
						<strong>Alamat :</strong>-<br>
						<strong>NPWP :</strong>-<br>
						<strong>No.Telp :</strong>-<br>
						@else
						<strong>NIK :</strong> {{ $ijin_siujk->pemohon->nik }} <br>
						<strong>Nama Lengkap :</strong> {{ ucwords($ijin_siujk->pemohon->nama_lengkap) }} <br>
						<strong>Pekerjaan :</strong> {{ ucwords($ijin_siujk->pemohon->pekerjaan) }} <br>
						<strong>Jenis Kelamin :</strong> {{ $ijin_siujk->pemohon->jenis_kelamin }} <br>
						<strong>Tempat/Tanggal Lahir :</strong> {{ ucwords($ijin_siujk->pemohon->tempat_lahir) }}/{{ $ijin_siujk->pemohon->tanggal_lahir }} <br>
						<strong>RT/RW :</strong> {{ $ijin_siujk->pemohon->rt }}/{{ $ijin_siujk->pemohon->rw }} <br>
						<strong>Alamat :</strong> {{ ucwords($ijin_siujk->pemohon->alamat) }} <br>
						<strong>NPWP :</strong> {{ $ijin_siujk->pemohon->npwp }} <br>
						<strong>No.Telp :</strong> {{ $ijin_siujk->pemohon->no_telp }} <br>
						@endif
					</div>

					<div class="col-6">
						<strong>Nama Perusahaan :</strong> {{ $ijin_siujk->nama_perusahaan }} <br>
						<strong>Alamat Perusahaan :</strong> {{ $ijin_siujk->alamat_perusahaan }} <br>
						<strong>Desa :</strong> {{ $ijin_siujk->village->name }} <br>
						<strong>No. Telp :</strong> {{ $ijin_siujk->notelp_direktur }} <br>
						<strong>Nama Direktur :</strong> {{ $ijin_siujk->nama_direktur }} <br>
						<strong>Alamat Direktur :</strong> {{ $ijin_siujk->alamat_direktur }} <br>
						<strong>Tanggal OSS :</strong> {{ $ijin_siujk->tgl_oss }} <br>
						<strong>NPWP Perusahaan :</strong> {{ $ijin_siujk->npwp_perusahaan }} <br>
						@if(is_null($ijin_siujk->sbu_id))
						<strong>Jenis SBU - Sampai :</strong>- <br>
						@else
						<strong>Jenis SBU - Sampai :</strong> {{ $ijin_siujk->jenissbu->jenis_sbu }} - {{ $ijin_siujk->tgl_sbu }} <br>
						@endif
						@if(is_null($ijin_siujk->skt_id))
						<strong>Jenis SKT - Sampai :</strong>- <br>
						@else
						<strong>Jenis SKT - Sampai :</strong> {{ $ijin_siujk->jenisskt->jenis_ska_skt }} - {{ $ijin_siujk->tgl_skt }} <br>
						@endif
						@if(is_null($ijin_siujk->ska_id))
						<strong>Jenis SKA - Sampai :</strong>- <br>
						@else
						<strong>Jenis SKA - Sampai :</strong> {{ $ijin_siujk->jenisska->jenis_ska_skt }} - {{ $ijin_siujk->tgl_ska }} <br>
						@endif
						
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-12 table-responsive">
					  <table class="table table-striped">
						<thead>
						  <tr>
							<th>Syarat Izin</th>
							<th>Lihat</th>
							<th>Aksi</th>
						  </tr>
						</thead>
						<tbody>
							<tr>
								<td>Fotokopi IMB atau Surat Perjanjian/ Kontrak Sewa</td>
								@if(is_null($ijin_siujk->syarat1))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat1')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat1')</td>
							</tr>
							<tr>
								<td>Pengesahan Badan Usaha Dari Kemenkumham (AHU - ONLINE)</td>
								@if(is_null($ijin_siujk->syarat2))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat2')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat2')</td>
							</tr>
							<tr>
								<td>Foto Copy Kartu Tanda Penduduk (KTP) Penanggung Jawab</td>
								@if(is_null($ijin_siujk->syarat3))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat3')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat3')</td>
							</tr>
							<tr>
								<td>Izin Lokasi</td>
								@if(is_null($ijin_siujk->syarat4))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat4')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat4')</td>
							</tr>
							<tr>
								<td>SLF (Sertifikat Laik Fungsi)</td>
								@if(is_null($ijin_siujk->syarat5))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat5')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat5')</td>
							</tr>
							<tr>
								<td>Fotocopy IMB Dan Ijin Prinsip (bagi Yang Dipersyaratkan) dan Menunjukan Aslinya</td>
								@if(is_null($ijin_siujk->syarat6))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat6')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat6')</td>
							</tr>
							<tr>
								<td>Memiliki Nomor Pokok Wajib Pajak (NPWP)</td>
								@if(is_null($ijin_siujk->syarat7))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat7')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat7')</td>
							</tr>
							<tr>
								<td>Surat Pernyataan Tidak Merangkap Jabatan</td>
								@if(is_null($ijin_siujk->syarat8))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat8')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat8')</td>
							</tr>
							<tr>
								<td>Dokumen UKL - UPL/ SPPL/Amdal</td>
								@if(is_null($ijin_siujk->syarat9))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat9')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat9')</td>
							</tr>
							<tr>
								<td>Izin Komersial/Operasional</td>
								@if(is_null($ijin_siujk->syarat10))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat10')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat10')</td>
							</tr>
							<tr>
								<td>SK IUJK Asli Untuk Perpanjangan/perubahan</td>
								@if(is_null($ijin_siujk->syarat11))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat11')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat11')</td>
							</tr>
							<tr>
								<td>Foto Copy Sertifikat Badan Usaha (SBU)</td>
								@if(is_null($ijin_siujk->syarat12))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat12')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat12')</td>
							</tr>
							<tr>
								<td>Kartu Tanda Anggota Asosiasi (KTA)</td>
								@if(is_null($ijin_siujk->syarat13))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat13')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat13')</td>
							</tr>
							<tr>
								<td>Surat Pernyataan Bukan Pegawai Negeri Sipil/TNI</td>
								@if(is_null($ijin_siujk->syarat14))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat14')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat14')</td>
							</tr>
							<tr>
								<td>Dokumen NIB</td>
								@if(is_null($ijin_siujk->syarat15))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat15')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat15')</td>
							</tr>
							<tr>
								<td>Ijin Mendirikan Bangunan (IMB)</td>
								@if(is_null($ijin_siujk->syarat16))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat16')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat16')</td>
							</tr>
							<tr>
								<td>Sertifikat Keterampilan Kerja (SKT)</td>
								@if(is_null($ijin_siujk->syarat17))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat17')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat17')</td>
							</tr>
							<tr>
								<td>Foto Copy NPWP</td>
								@if(is_null($ijin_siujk->syarat18))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat18')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat18')</td>
							</tr>
							<tr>
								<td>Izin Usaha (Belum Efektif)</td>
								@if(is_null($ijin_siujk->syarat19))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat19')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat19')</td>
							</tr>
							<tr>
								<td>Surat Permohonan Pengefektifan Izin Usaha TTD Direktur Bermaterai 6000</td>
								@if(is_null($ijin_siujk->syarat20))
								<td>-</td>
								@else
								<td>@include('front_office.pupr.part.detail_syarat20')</td>
								@endif
								<td>@include('front_office.pupr.part.upload_syarat20')</td>
							</tr>
						</tbody>
					  </table>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection