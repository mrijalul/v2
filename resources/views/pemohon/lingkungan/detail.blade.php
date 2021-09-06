@extends('layouts.app')

@section('title')
{{ $ijin_lingkungan->kode_pendaftaran }} | {{ $perijinan->nama_perijinan }}
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
						<h2 class="page-header"><i class="fa fa-bell"></i> {{ $ijin_lingkungan->kode_pendaftaran }}</h2>
					</div>
					<div class="col-6">
						<h5 class="text-right">Tanggal Daftar: {{ $ijin_lingkungan->tanggal_daftar }}</h5>
					</div>
				</div>
				<div class="row invoice-info">
					<div class="col-6">
						<strong>Status Ijin :</strong><u>{{ $ijin_lingkungan->datastatus->nama_status }}</u><br>
						@if($ijin_lingkungan->pemohon_id == 0)
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
						<strong>NIK :</strong> {{ $ijin_lingkungan->pemohon->nik }} <br>
						<strong>Nama Lengkap :</strong> {{ ucwords($ijin_lingkungan->pemohon->nama_lengkap) }} <br>
						<strong>Pekerjaan :</strong> {{ ucwords($ijin_lingkungan->pemohon->pekerjaan) }} <br>
						<strong>Jenis Kelamin :</strong> {{ $ijin_lingkungan->pemohon->jenis_kelamin }} <br>
						<strong>Tempat/Tanggal Lahir :</strong> {{ ucwords($ijin_lingkungan->pemohon->tempat_lahir) }}/{{ $ijin_lingkungan->pemohon->tanggal_lahir }} <br>
						<strong>RT/RW :</strong> {{ $ijin_lingkungan->pemohon->rt }}/{{ $ijin_lingkungan->pemohon->rw }} <br>
						<strong>Alamat :</strong> {{ ucwords($ijin_lingkungan->pemohon->alamat) }} <br>
						<strong>NPWP :</strong> {{ $ijin_lingkungan->pemohon->npwp }} <br>
						<strong>No.Telp :</strong> {{ $ijin_lingkungan->pemohon->no_telp }} <br>
						@endif
					</div>

					<div class="col-6">
						<strong>Nama Perusahaan : </strong> {{ $ijin_lingkungan->nama_perusahaan }}<br>
						<strong>Alamat Perusahaan : </strong> {{ $ijin_lingkungan->alamat_perusahaan }}<br>
						<strong>RT/RW : </strong> {{ $ijin_lingkungan->rt }}/{{ $ijin_lingkungan->rw }}<br>
						<strong>Desa : </strong> {{ $ijin_lingkungan->village->name }}<br>
						<strong>Nama Penanggungjawab : </strong> {{ $ijin_lingkungan->nama_penanggungjawab }}<br>
						<strong>Jenis Usaha : </strong> {{ $ijin_lingkungan->jenis_usaha }}<br>
					</div>
				</div>
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
								<td>Ijin mendirikan bangunan (IMB)</td>
								@if(is_null($ijin_lingkungan->data_imb))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_imb')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_imb')</td>
							</tr>
							<tr>
								<td>Surat pengantar pengajuan izin lingkungan dari Dinas Lingkungan Hidup</td>
								@if(is_null($ijin_lingkungan->s_pengantar_dlh))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_s_pengantar_dlh')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_s_pengantar_dlh')</td>
							</tr>
							<tr>
								<td>Dokumen Pendirian Usaha/Kegiatan</td>
								@if(is_null($ijin_lingkungan->d_pendirian_usaha))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_d_pendirian_usaha')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_d_pendirian_usaha')</td>
							</tr>
							<tr>
								<td>Izin Usaha (Belum Efektif)</td>
								@if(is_null($ijin_lingkungan->izin_usaha))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_izin_usaha')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_izin_usaha')</td>
							</tr>
							<tr>
								<td>Foto copy KTP</td>
								@if(is_null($ijin_lingkungan->fc_ktp))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_fc_ktp')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_fc_ktp')</td>
							</tr>
							<tr>
								<td>SLF (Sertifikat Laik Fungsi)</td>
								@if(is_null($ijin_lingkungan->slf))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_slf')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_slf')</td>
							</tr>
							<tr>
								<td>Dokumen NIB</td>
								@if(is_null($ijin_lingkungan->d_nib))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_d_nib')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_d_nib')</td>
							</tr>
							<tr>
								<td>Izin Lokasi</td>
								@if(is_null($ijin_lingkungan->i_lokasi))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_i_lokasi')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_i_lokasi')</td>
							</tr>
							<tr>
								<td>Dokumen UKL - UPL/ SPPL/Amdal</td>
								@if(is_null($ijin_lingkungan->d_ukl))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_d_ukl')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_d_ukl')</td>
							</tr>
							<tr>
								<td>NPWP (Pribadi)</td>
								@if(is_null($ijin_lingkungan->npwp_pribadi))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_npwp_pribadi')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_npwp_pribadi')</td>
							</tr>
							<tr>
								<td>Izin Komersial/Operasional</td>
								@if(is_null($ijin_lingkungan->i_operasional))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_i_operasional')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_i_operasional')</td>
							</tr>
							<tr>
								<td>Surat permohonan yang diajukan kepada Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu bermaterai 6000</td>
								@if(is_null($ijin_lingkungan->sk_dpmptsp))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_sk_dpmptsp')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_sk_dpmptsp')</td>
							</tr>
							<tr>
								<td>Dokumen Profil Usaha/Kegiatan</td>
								@if(is_null($ijin_lingkungan->dp_usaha))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_dp_usaha')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_dp_usaha')</td>
							</tr>
							<tr>
								<td>NPWP (Badan Hukum)</td>
								@if(is_null($ijin_lingkungan->npwp_bhukum))
								<td>-</td>
								@else
								<td>@include('pemohon.lingkungan.part.detail_npwp_bhukum')</td>
								@endif
								<td>@include('pemohon.lingkungan.part.upload_npwp_bhukum')</td>
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