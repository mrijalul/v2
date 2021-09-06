@extends('layouts.app')

@section('title')
{{ $page }}
@endsection

@section('content')
<div class="row user">
	<div class="col-md-12">
		<div class="profile">
			<div class="info"><img class="user-img" src="
				@if(is_null(auth()->user()->foto_profil)) {{ asset('img') }}/user_default.png
				@else
				{{ asset('img/user_profile') }}/{{ auth()->user()->foto_profil }}
				@endif">
				<h4>{{ auth()->user()->name }}</h4>
				<p>
					@if(auth()->user()->is_pemohon == '1')
					Level Pemohon
					@else
					@endif
					- {{ auth()->user()->created_at->DiffForHumans() }}
				</p>
			</div>
			<div class="cover-image"></div>
		</div>
	</div>
</div>
<br>
<div class="row justify-content-md-center">
	<div class="col-md-8">
		@if(session()->has('message'))
		<div class="bs-component">
			<div class="alert alert-dismissible alert-success">
				<button class="close" type="button" data-dismiss="alert">×</button><strong>{{ session()->get('message') }}</strong>
			</div>
		</div>
		@endif
		<div class="tile user-settings">
			<h4 class="line-head">Profil User</h4>
			@if(is_null($user_fo))
			{{ Form::open(['route'=>'frontOffice.home.dashboard.fo.post','method'=>'POST','id'=>'dasboard_data']) }}
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('nik','NIK') }}
						{{ Form::number('nik',null,['class'=>'form-control','id'=>'nik','placeholder'=>'NIK']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('nama_lengkap','Nama Lengkap') }}
						{{ Form::text('nama_lengkap',auth()->user()->name,['class'=>'form-control','id'=>'nama_lengkap','placeholder'=>'Nama Lengkap']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('pekerjaan','Pekerjaan') }}
						{{ Form::text('pekerjaan',null,['class'=>'form-control','id'=>'pekerjaan','placeholder'=>'Pekerjaan']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('jenis_kelamin','Jenis Kelamin') }}
						{{ Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], old('jenis_kelamin'), ['placeholder' => '-- Pilih Jenis Kelamin --','class'=>'form-control','id'=>'jenis_kelamin']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('tempat_lahir','Tempat Lahir') }}
						{{ Form::text('tempat_lahir',old('tempat_lahir'),['class'=>'form-control','id'=>'tempat_lahir','placeholder'=>'Tempat Lahir']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('tanggal_lahir','Tanggal Lahir') }}
						{{ Form::text('tanggal_lahir',old('tanggal_lahir'),['class'=>'form-control','id'=>'tanggal_lahir','placeholder'=>'Tanggal Lahir']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('rt','RT') }}
						{{ Form::number('rt',old('rt'),['class'=>'form-control','placeholder'=>'RT']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('rw','RW') }}
						{{ Form::number('rw',old('rw'),['class'=>'form-control','id'=>'rw','placeholder'=>'RW']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-12">
						{{ Form::label('alamat','Alamat') }}
						{{ Form::textarea('alamat',old('alamat'),['class'=>'form-control','id'=>'alamat','placeholder'=>'Alamat','rows'=>'2']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('npwp','NPWP') }}
						{{ Form::number('npwp',old('npwp'),['class'=>'form-control','id'=>'npwp','placeholder'=>'NPWP']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('no_telp','No.Telp') }}
						{{ Form::number('no_telp',old('no_telp'),['class'=>'form-control','id'=>'no_telp','placeholder'=>'No.Telp']) }}
					</div>
				</div>
				<div class="row mb-10">
					<div class="col-md-12">
						<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
					</div>
				</div>
			{{ Form::close() }}
			@else
			{{ Form::model($user_fo,['route'=>['frontOffice.home.dashboard.fo.update',[$user_fo->id,auth()->user()->id]],'method'=>'POST','id'=>'dasboard_data']) }}
				@method('PATCH')
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('nik','NIK') }}
						{{ Form::number('nik',$user_fo->nik,['class'=>'form-control','id'=>'nik','placeholder'=>'NIK']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('nama_lengkap','Nama Lengkap') }}
						{{ Form::text('nama_lengkap',$user_fo->nama_lengkap,['class'=>'form-control','id'=>'nama_lengkap','placeholder'=>'Nama Lengkap']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('pekerjaan','Pekerjaan') }}
						{{ Form::text('pekerjaan',$user_fo->pekerjaan,['class'=>'form-control','id'=>'pekerjaan','placeholder'=>'Pekerjaan']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('jenis_kelamin','Jenis Kelamin') }}
						{{ Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'],$user_fo->jenis_kelamin, ['placeholder' => '-- Pilih Jenis Kelamin --','class'=>'form-control','id'=>'jenis_kelamin']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('tempat_lahir','Tempat Lahir') }}
						{{ Form::text('tempat_lahir',$user_fo->tempat_lahir,['class'=>'form-control','id'=>'tempat_lahir','placeholder'=>'Tempat Lahir']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('tanggal_lahir','Tanggal Lahir') }}
						{{ Form::text('tanggal_lahir',$user_fo->tanggal_lahir,['class'=>'form-control','id'=>'tanggal_lahir','placeholder'=>'Tanggal Lahir']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('rt','RT') }}
						{{ Form::number('rt',$user_fo->rt,['class'=>'form-control','placeholder'=>'RT']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('rw','RW') }}
						{{ Form::number('rw',$user_fo->rw,['class'=>'form-control','id'=>'rw','placeholder'=>'RW']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-12">
						{{ Form::label('alamat','Alamat') }}
						{{ Form::textarea('alamat',$user_fo->alamat,['class'=>'form-control','id'=>'alamat','placeholder'=>'Alamat','rows'=>'2']) }}
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6">
						{{ Form::label('npwp','NPWP') }}
						{{ Form::number('npwp',$user_fo->npwp,['class'=>'form-control','id'=>'npwp','placeholder'=>'NPWP']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('no_telp','No.Telp') }}
						{{ Form::number('no_telp',$user_fo->no_telp,['class'=>'form-control','id'=>'no_telp','placeholder'=>'No.Telp']) }}
					</div>
				</div>
				<div class="row mb-10">
					<div class="col-md-12">
						<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
					</div>
				</div>
			{{ Form::close() }}
			@endif

		</div>
	</div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/JMtvK2onmA_fltpckr.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/JMtvK2onmA_fltpckr.js') }}"></script>
<script>
	$(document).ready(function() {
		// flatpickr
		flatpickr("#tanggal_lahir",{
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "d-m-Y",
		});
		$("#dasboard_data").submit(function (e) {
			$("#btn-submit").attr("disabled", true);
			return true;
		});
	});
</script>
@endpush