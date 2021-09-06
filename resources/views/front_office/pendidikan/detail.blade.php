@extends('layouts.app')

@section('title')
{{ $ijin_pendidikan->kode_pendaftaran }} | {{ $perijinan->nama_perijinan }}
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
						<h2 class="page-header"><i class="fa fa-bell"></i> {{ $ijin_pendidikan->kode_pendaftaran }} | {{ $ijin_pendidikan->jenisijin->nama_jenisijin }}</h2>
					</div>
					<div class="col-6">
						<h5 class="text-right">Tanggal Daftar: {{ $ijin_pendidikan->tanggal_daftar }}</h5>
					</div>
				</div>
				<div class="row invoice-info">
					<div class="col-6">
						<strong>Status Ijin :</strong>{{ $ijin_pendidikan->datastatus->nama_status }}<br>
						@if($ijin_pendidikan->pemohon_id == 0)
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
						<strong>NIK :</strong> {{ $ijin_pendidikan->pemohon->nik }} <br>
						<strong>Nama Lengkap :</strong> {{ ucwords($ijin_pendidikan->pemohon->nama_lengkap) }} <br>
						<strong>Pekerjaan :</strong> {{ ucwords($ijin_pendidikan->pemohon->pekerjaan) }} <br>
						<strong>Jenis Kelamin :</strong> {{ $ijin_pendidikan->pemohon->jenis_kelamin }} <br>
						<strong>Tempat/Tanggal Lahir :</strong> {{ ucwords($ijin_pendidikan->pemohon->tempat_lahir) }}/{{ $ijin_pendidikan->pemohon->tanggal_lahir }} <br>
						<strong>RT/RW :</strong> {{ $ijin_pendidikan->pemohon->rt }}/{{ $ijin_pendidikan->pemohon->rw }} <br>
						<strong>Alamat :</strong> {{ ucwords($ijin_pendidikan->pemohon->alamat) }} <br>
						<strong>NPWP :</strong> {{ $ijin_pendidikan->pemohon->npwp }} <br>
						<strong>No.Telp :</strong> {{ $ijin_pendidikan->pemohon->no_telp }} <br>
						@endif
					</div>

					<div class="col-6">
						@if($ijin_pendidikan->jenis_izin == 2222)
							<strong>Alamat Sekolah :</strong>{{ $ijin_pendidikan->alamat_sekolah }}<br>
							<strong>Nomor Statistik Sekolah(NSS) :</strong>{{ $ijin_pendidikan->nss }}<br>
							<strong>Nomor Pokok Sekolah Nasional(NPSN) :</strong>{{ $ijin_pendidikan->npsn }}<br>
							<strong>Status Sekolah (Hasil Akreditasi) :</strong>{{ $ijin_pendidikan->status_sekolah }}<br>
							<strong>Penanggungjawab :</strong>{{ $ijin_pendidikan->penanggungjawab }}<br>
							<strong>Tanggal dan Nomor Akte Lembaga :</strong>{{ $ijin_pendidikan->tgl_no_akte }}<br>
							<strong>NIB :</strong>{{ $ijin_pendidikan->nib }}<br>
							<strong>Tanggal NIB :</strong>{{ $ijin_pendidikan->tgl_nib }}<br>
							<strong>Nama KBLI :</strong>{{ $ijin_pendidikan->nama_kbli }}<br>
						@elseif($ijin_pendidikan->jenis_izin == 2223)
							<strong>Alamat Sekolah :</strong>{{ $ijin_pendidikan->alamat_sekolah }}<br>
							<strong>Kepala Sekolah :</strong>{{ $ijin_pendidikan->kepala_sekolah }}<br>
							<strong>Nama Yayasan :</strong>{{ $ijin_pendidikan->nama_yayasan }}<br>
							<strong>NIB :</strong>{{ $ijin_pendidikan->nib }}<br>
							<strong>Tanggal NIB :</strong>{{ $ijin_pendidikan->tgl_nib }}<br>
						@else
						@endif
					</div>
				</div>
				@if($ijin_pendidikan->jenis_izin == 2222)
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
								<td>Foto direktur berwarna 4x6 (2 lembar)</td>
								@if(is_null($ijin_pendidikan->foto_direktur))
								<td>-</td>
								@else
								<td>@include('front_office.pendidikan.part.detail_foto_direktur')</td>
								@endif
								<td>@include('front_office.pendidikan.part.upload_foto_direktur')</td>
							</tr>
							<tr>
								<td>Denah lokasi dan bangunan dengan situasi sekitar</td>
								@if(is_null($ijin_pendidikan->denah_lokasi))
								<td>-</td>
								@else
								<td>@include('front_office.pendidikan.part.detail_denah_lokasi')</td>
								@endif
								<td>@include('front_office.pendidikan.part.upload_denah_lokasi')</td>
							</tr>
							<tr>
								<td>Alamat dan denah lokasi tempat usaha</td>
								@if(is_null($ijin_pendidikan->alamat_lokasi))
								<td>-</td>
								@else
								<td>@include('front_office.pendidikan.part.detail_alamat_lokasi')</td>
								@endif
								<td>@include('front_office.pendidikan.part.upload_alamat_lokasi')</td>
							</tr>
							<tr>
								<td>Akta sewa menyewa, kontrak atau akte hak milik dari bangunan</td>
								@if(is_null($ijin_pendidikan->akta_sewa))
								<td>-</td>
								@else
								<td>@include('front_office.pendidikan.part.detail_akta_sewa')</td>
								@endif
								<td>@include('front_office.pendidikan.part.upload_akta_sewa')</td>
							</tr>
						</tbody>
					  </table>
					</div>
				</div>
				@else
				@endif
			</section>
		</div>
	</div>
</div>
@endsection