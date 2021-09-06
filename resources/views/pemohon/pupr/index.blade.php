@extends('layouts.app')
@section('title')
{{ $perijinan->nama_perijinan }} - {{ $perijinan->singkatan_perijinan }}
@endsection
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> {{ $perijinan->nama_perijinan }}</h1>
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
			<div class="tile-body">
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tambahIjinSiujk" aria-expanded="false" aria-controls="tambahIjinSiujk">
					Tambah
				</button>
			</div>
		</div>
		<div class="collapse" id="tambahIjinSiujk">
			<div class="card card-body">
				{{ Form::open(['route'=>['pemohon.perijinan.post',$perijinan->slug_perijinan],'method'=>'POST','files'=>true]) }}
				@include('pemohon.pupr.tambah_data_ijin')
				{{ Form::close() }}
			</div>
		</div>
		<div class="tile">
			<div class="tile-body">
				<table class="table table-bordered ijin_lingkungan">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Daftar</th>
							<th>NIK</th>
							<th>Nama Lengkap</th>
							<th>Status Pemohon</th>
							<th>Detail</th>
							<th>Ubah Status</th>
							<th width="100px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($dataIjinSiujk as $dis)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $dis->tanggal_daftar }}</td>
							@if($dis->pemohon_id == 0)
							<td>-</td>
							<td>-</td>
							@else
							<td>{{ $dis->pemohon->nik }}</td>
							<td>{{ $dis->pemohon->nama_lengkap }}</td>
							@endif
							<td>{{ $dis->datastatus->nama_status }}</td>
							<td>
								<a href="{{ route('pemohon.perijinan.detail',[$perijinan->slug_perijinan,$dis->id]) }}" class="btn btn-block btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
							</td>
							@include('pemohon.pupr.ubah_status')
							<td>
								{{ Form::model($dis, ['route'=>['pemohon.perijinan.deleteperijinan', $perijinan->slug_perijinan,$dis->id],'method'=>'POST']) }}
									@method('DELETE')
									<button type="submit" onclick="return confirm('Yakin mau hapus data ini ?');" class="btn btn-block btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
								{{ Form::close() }}
							</td>
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
<link rel="stylesheet" href="{{ asset('css/9oExJP7cAB_ts.css') }}">
<link href="{{ asset('css/8mCcq93x7C_s2.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/JMtvK2onmA_fltpckr.css') }}">
<link rel="stylesheet" href="{{ asset('css/5EC8VBfS_dt.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('js/5EC8VBfS_dt.js') }}"></script>
<script src="{{ asset('js/8mCcq93x7C_s2.js') }}"></script>
<script src="{{ asset('js/9oExJP7cAB_ts.js') }}"></script>
<script src="{{ asset('js/JMtvK2onmA_fltpckr.js') }}"></script>

<script>
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$(document).ready(function() {
		$('.ijin_lingkungan').DataTable({
			'order': [[0,'desc']],
		});
		$('#pemohon_id').select2({
			theme: "bootstrap",
			ajax: {
				url: "{{ route('pemohon.getdatapemohon') }}",
				type: 'post',
				delay: 250,
				dataType: 'json',
				data: function(params){
					return{
						_token: CSRF_TOKEN,
						search: params.term
					};
				},
				processResults: function(response){
					return{
						results: response
					};
				},
				cache: true
			}
		});
		$('#sbu_id').select2({
			theme: "bootstrap",
			ajax: {
				url: "{{ route('pemohon.getdatajenis.sbu') }}",
				type: 'post',
				delay: 250,
				dataType: 'json',
				data: function(params){
					return{
						_token: CSRF_TOKEN,
						search: params.term
					};
				},
				processResults: function(response){
					return{
						results: response
					};
				},
				cache: true
			}
		});
		$('#skt_id').select2({
			theme: "bootstrap",
			ajax: {
				url: "{{ route('pemohon.getdatajenis.skt') }}",
				type: 'post',
				delay: 250,
				dataType: 'json',
				data: function(params){
					return{
						_token: CSRF_TOKEN,
						search: params.term
					};
				},
				processResults: function(response){
					return{
						results: response
					};
				},
				cache: true
			}
		});
		$('#ska_id').select2({
			theme: "bootstrap",
			ajax: {
				url: "{{ route('pemohon.getdatajenis.ska') }}",
				type: 'post',
				delay: 250,
				dataType: 'json',
				data: function(params){
					return{
						_token: CSRF_TOKEN,
						search: params.term
					};
				},
				processResults: function(response){
					return{
						results: response
					};
				},
				cache: true
			}
		});
	});
	flatpickr("#tgl_sbu",{
		altInput: true,
		altFormat: "F j, Y",
		dateFormat: "d-m-Y",
	});
	flatpickr("#tgl_skt",{
		altInput: true,
		altFormat: "F j, Y",
		dateFormat: "d-m-Y",
	});
	flatpickr("#tgl_ska",{
		altInput: true,
		altFormat: "F j, Y",
		dateFormat: "d-m-Y",
	});
	flatpickr("#tgl_oss",{
		altInput: true,
		altFormat: "F j, Y",
		dateFormat: "d-m-Y",
	});
	$('#kecamatan_id').change(function(e){
		console.log(e);
		var kab_id = e.target.value;
		$.get('/pemohon/ajax_kecamatanid?kab_id='+kab_id, function(data){
			console.log(data);
			$('#desa_id').empty();
			$.each(data, function(index, kabidObj){
				$('#desa_id').append('<option value="'+kabidObj.id+'">'+kabidObj.name+'</option>');
			});
		});
	});
	new TomSelect("#kecamatan_id",{
		create: false,
		sortField: {
			field: "text",
			direction: "asc"
		}
	});
	$('#desa_id').select2({
		theme: "bootstrap"
	});
	$('#jenis_izin').select2({
		theme: "bootstrap"
	});
</script>
@endpush