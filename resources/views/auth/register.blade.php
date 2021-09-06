@extends('layouts.app_login')

@section('app_login_register')
Pendaftaran Pemohon
@endsection

@section('content')
<div class="container">
	{{ Form::open(['route'=>'pendaftaran.pemohon', 'method'=>'POST', 'files'=>true]) }}
	<div class="row">
		<div class="col-md-6">
			<div class="tile">
				<h3 class="tile-title">Data Kependudukan (Pemohon)</h3>
				<hr>
				<div class="tile-body">
					<div class="form-group">
						{{ Form::label('nik','NIK') }}
						{{ Form::number('nik',old('nik'),['class'=>'form-control'. ($errors->has('nik') ? ' is-invalid' : NULL),'id'=>'nik','aria-describedby'=>'id_nik','placeholder'=>'NIK','required']) }}
						@error('nik')
						<small class="form-text text-muted" id="id_nik">
							{{ $message }}
						</small>
						@enderror
					</div>
					<div class="form-group">
						{{ Form::label('nama_lengkap','Nama Lengkap') }}
						{{ Form::text('nama_lengkap',old('nama_lengkap'),['class'=>'form-control'. ($errors->has('nama_lengkap') ? ' is-invalid' : NULL),'id'=>'nama_lengkap','aria-describedby'=>'id_nama_lengkap','placeholder'=>'Nama Lengkap','required']) }}
						@error('nama_lengkap')
						<small class="form-text text-muted" id="id_nama_lengkap">
							{{ $message }}
						</small>
						@enderror
					</div>
					<div class="form-group">
						{{ Form::label('pekerjaan','Pekerjaan') }}
						{{ Form::text('pekerjaan',old('pekerjaan'),['class'=>'form-control'. ($errors->has('pekerjaan') ? ' is-invalid' : NULL),'id'=>'pekerjaan','aria-describedby'=>'id_pekerjaan','placeholder'=>'Pekerjaan','required']) }}
						@error('pekerjaan')
						<small class="form-text text-muted" id="id_pekerjaan">
							{{ $message }}
						</small>
						@enderror
					</div>
					<div class="form-group">
						{{ Form::label('jenis_kelamin','Jenis Kelamin') }}
						{{ Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], old('jenis_kelamin'), ['placeholder' => '-- Pilih Jenis Kelamin --','class'=>'form-control'. ($errors->has('jenis_kelamin') ? ' is-invalid' : NULL),'id'=>'jenis_kelamin','aria-describedby'=>'id_jenis_kelamin','required']) }}
						
						@error('jenis_kelamin')
							<small class="form-text text-muted" id="id_jenis_kelamin">
								{{ $message }}
							</small>
						@enderror
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								{{ Form::label('tempat_lahir','Tempat Lahir') }}
								{{ Form::text('tempat_lahir',old('tempat_lahir'),['class'=>'form-control'. ($errors->has('tempat_lahir') ? ' is-invalid' : NULL),'id'=>'tempat_lahir','placeholder'=>'Tempat Lahir','required']) }}
							</div>
						</div>
						<div class="col-md-7">
							<div class="form-group">
								{{ Form::label('tanggal_lahir','Tanggal Lahir') }}
								{{ Form::text('tanggal_lahir',old('tanggal_lahir'),['class'=>'form-control'. ($errors->has('tanggal_lahir') ? ' is-invalid' : NULL),'id'=>'tanggal_lahir','placeholder'=>'Tanggal Lahir','required']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('rt','RT') }}
						{{ Form::number('rt',old('rt'),['class'=>'form-control'. ($errors->has('rt') ? ' is-invalid' : NULL),'id'=>'rt','aria-describedby'=>'id_rt','placeholder'=>'RT','required']) }}
						@error('rt')
						<small class="form-text text-muted" id="id_rt">
							{{ $message }}
						</small>
						@enderror
					</div>
					<div class="form-group">
						{{ Form::label('rw','RW') }}
						{{ Form::number('rw',old('rw'),['class'=>'form-control'. ($errors->has('rw') ? ' is-invalid' : NULL),'id'=>'rw','aria-describedby'=>'id_rw','placeholder'=>'RW','required']) }}
						@error('rw')
						<small class="form-text text-muted" id="id_rw">
							{{ $message }}
						</small>
						@enderror
					</div>
					<div class="form-group">
						{{ Form::label('alamat','Alamat') }}
						{{ Form::textarea('alamat',old('alamat'),['class'=>'form-control'. ($errors->has('alamat') ? ' is-invalid' : NULL),'id'=>'alamat','aria-describedby'=>'id_alamat','placeholder'=>'Alamat','rows'=>'2','required']) }}
						@error('alamat')
						<small class="form-text text-muted" id="id_alamat">
							{{ $message }}
						</small>
						@enderror
					</div>
					<div class="form-group">
						{{ Form::label('npwp','NPWP') }}
						{{ Form::number('npwp',old('npwp'),['class'=>'form-control'. ($errors->has('npwp') ? ' is-invalid' : NULL),'id'=>'npwp','aria-describedby'=>'id_npwp','placeholder'=>'NPWP']) }}
						@error('npwp')
						<small class="form-text text-muted" id="id_npwp">
							{{ $message }}
						</small>
						@enderror
					</div>
					<div class="form-group">
						{{ Form::label('no_telp','No.Telp') }}
						{{ Form::number('no_telp',old('no_telp'),['class'=>'form-control'. ($errors->has('no_telp') ? ' is-invalid' : NULL),'id'=>'no_telp','aria-describedby'=>'id_no_telp','placeholder'=>'No.Telp','required']) }}
						@error('no_telp')
						<small class="form-text text-muted" id="id_no_telp">
							{{ $message }}
						</small>
						@enderror
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile">
				<h3 class="tile-title">Data Login (Pemohon)</h3>
				<hr>
				<div class="tile-body">
					<div class="form-group">
						{{ Form::label('email','E-Mail') }}
						{{ Form::email('email',old('email'),['class'=>'form-control'. ($errors->has('email') ? ' is-invalid' : NULL),'id'=>'email','aria-describedby'=>'id_email','placeholder'=>'E-Mail','required']) }}
						@error('email')
						<small class="form-text text-muted" id="id_email">
							{{ $message }}
						</small>
						@enderror
					</div>
					<div class="form-group" id="pwd-container">
						{{ Form::label('password','Password') }}
						<div class="input-group mb-3" id="show_hide_password">
						{{ Form::password('password',['class'=>'form-control'. ($errors->has('password') ? ' is-invalid' : NULL),'id'=>'password','aria-describedby'=>'id_password','placeholder'=>'Password','autocomplete'=>'new-password','required']) }}
							<div class="input-group-append">
								<a href="" class="input-group-text" id="id_password"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
							</div>
						</div>
						<small class="form-text text-muted" id="id_password">
							<div class="pwstrength_viewport_progress"></div>
							<div id="messages" class="col-sm-12"></div>
						</small>
						@error('password')
						<small class="form-text text-muted" id="id_password">
							{{ $message }}
						</small>
						@enderror
					</div>

					<div class="form-group">
						{{ Form::label('password-confirm','Konfirmasi Password') }}
						{{ Form::password('password_confirmation',['class'=>'form-control','required','autocomplete'=>'new-password']) }}
					</div>

					<div class="form-group">
						{{ Form::label('foto','Foto') }}
						<div class="custom-file mb-3">
							{{ Form::file('foto_profil',['class'=>'custom-file-input','id'=>'foto_profil','required','accept'=>'image/*']) }}
							{{ Form::label('foto_profil','Choose File',['class'=>'custom-file-label']) }}
							<div class="invalid-feedback">Example invalid custom file feedback</div>
							<code>
								- satu file saja
								- ukuran foto maksimal 5MB
								- hanya png,jpg,jpeg,gif
							</code>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<div class="tile">
				<button type="submit" class="btn btn-primary btn-block">Buat Akun Baru</button>
			</div>
		</div>
	</div>
	{{ Form::close() }}
	
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/JMtvK2onmA_fltpckr.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/JMtvK2onmA_fltpckr.js') }}"></script>
<script src="{{ asset('js/CdLS38vf2N_pwd.js') }}"></script>
<script>
	$(document).ready(function(){
		// flatpickr
		flatpickr("#tanggal_lahir",{
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "d-m-Y",
		});
		// strength password
		"use strict";
		var options = {};
		options.ui = {
			bootstrap4: true,
			container: "#pwd-container",
			viewports: {
				progress: ".pwstrength_viewport_progress"
			},
			showVerdictsInsideProgressBar: true
		};
		options.common = {
			debug: true,
			onLoad: function () {
				$('#messages').text('Start typing password');
			}
		};
		$(':password').pwstrength(options);

		// show hide password
		$("#show_hide_password a").on('click', function(event) {
			event.preventDefault();
			if($('#show_hide_password input').attr("type") == "text"){
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass( "fa-eye-slash" );
				$('#show_hide_password i').removeClass( "fa-eye" );
			}else if($('#show_hide_password input').attr("type") == "password"){
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass( "fa-eye-slash" );
				$('#show_hide_password i').addClass( "fa-eye" );
			}
		});
	});
</script>
@endpush
