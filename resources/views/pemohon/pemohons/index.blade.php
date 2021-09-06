@extends('layouts.app')

@section('title')
{{ $page }}
@endsection

@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> {{ $page }}</h1>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item"><a href="#">{{ $page }}</a></li>
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
			<div class="tile-body">
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tambahPendaftaranPemohon" aria-expanded="false" aria-controls="tambahPendaftaranPemohon">
					Tambah
				</button>
			</div>
		</div>
		<div class="collapse" id="tambahPendaftaranPemohon">
			<div class="card card-body">
				{{ Form::open(['route'=>['pemohon.pemohon.store'],'method'=>'POST','files'=>true]) }}
				@include('pemohon.pemohons.create')
				{{ Form::close() }}
			</div>
		</div>
		<div class="tile">
			<div class="tile-body">
				<table class="table" id="list_pemohon">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kode Pemohon</th>
							<th>Pendaftar Akun Pemohon</th>
							<th>NIK</th>
							<th>Nama Lengkap</th>
							<th>Alamat</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($pemohons as $pemohon)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $pemohon->kode_pemohon }}</td>
							<td>{{ $pemohon->registered_name }}</td>
							<td>{{ $pemohon->nik }}</td>
							<td>{{ $pemohon->nama_lengkap }}</td>
							<td>{{ $pemohon->alamat }}</td>
							<td>asd</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/5EC8VBfS_dt.css') }}">
<link rel="stylesheet" href="{{ asset('css/JMtvK2onmA_fltpckr.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/5EC8VBfS_dt.js') }}"></script>
<script src="{{ asset('js/JMtvK2onmA_fltpckr.js') }}"></script>
<script>
	$(document).ready(function() {
		$('#list_pemohon').DataTable({
			'order': [[0,'asc']],
		});
		// flatpickr
		flatpickr("#tanggal_lahir",{
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "d-m-Y",
		});
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
		$("#show_hide_confirm_password a").on('click', function(event) {
			event.preventDefault();
			if($('#show_hide_confirm_password input').attr("type") == "text"){
				$('#show_hide_confirm_password input').attr('type', 'password');
				$('#show_hide_confirm_password i').addClass( "fa-eye-slash" );
				$('#show_hide_confirm_password i').removeClass( "fa-eye" );
			}else if($('#show_hide_confirm_password input').attr("type") == "password"){
				$('#show_hide_confirm_password input').attr('type', 'text');
				$('#show_hide_confirm_password i').removeClass( "fa-eye-slash" );
				$('#show_hide_confirm_password i').addClass( "fa-eye" );
			}
		});
	});
</script>
@endpush