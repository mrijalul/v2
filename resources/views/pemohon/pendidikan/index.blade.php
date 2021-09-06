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
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tambahIjinPendidikan" aria-expanded="false" aria-controls="tambahIjinPendidikan">
					Tambah
				</button>
			</div>
		</div>
		<div class="collapse" id="tambahIjinPendidikan">
			<div class="card card-body">
				{{ Form::open(['route'=>['pemohon.perijinan.post',$perijinan->slug_perijinan],'method'=>'POST','files'=>true]) }}
				@include('pemohon.pendidikan.tambah_data_ijin')
				{{ Form::close() }}
			</div>
		</div>
		<div class="tile">
			<div class="tile-body">
				<table class="table table-bordered ijin_pendidikan">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Daftar</th>
							<th>Jenis Izin</th>
							<th>NIK</th>
							<th>Nama Lengkap</th>
							<th>Status Pemohon</th>
							<th>Detail</th>
							<th>Ubah Status</th>
							<th width="100px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($dataIjinPendidikan as $dip)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $dip->tanggal_daftar }}</td>
							<td>{{ $dip->jenisijin->nama_jenisijin }}</td>
							@if($dip->pemohon_id == 0)
							<td>-</td>
							<td>-</td>
							@else
							<td>{{ $dip->pemohon->nik }}</td>
							<td>{{ $dip->pemohon->nama_lengkap }}</td>
							@endif
							<td>{{ $dip->datastatus->nama_status }}</td>
							<td>
								<a href="{{ route('pemohon.perijinan.detail',[$perijinan->slug_perijinan,$dip->id]) }}" class="btn btn-block btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
							</td>
							@include('pemohon.pendidikan.ubah_status')
							<td>
								{{ Form::model($dip, ['route'=>['pemohon.perijinan.deleteperijinan', $perijinan->slug_perijinan,$dip->id],'method'=>'POST']) }}
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
		$('.ijin_pendidikan').DataTable({
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
	});
	flatpickr(".tgl_nib",{
		altInput: true,
		altFormat: "F j, Y",
		dateFormat: "d-m-Y",
	});
	$('#kecamatan_id').change(function(e){
		console.log(e);
		var kab_id = e.target.value;
		$.get('/pemohon/ajax_kecamatanid?kab_id='+kab_id, function(data){
			console.log(data);
			$('#desa_group').show();
			$('#desa_id').empty();
			$.each(data, function(index, kabidObj){
				$('#desa_id').append('<option value="'+kabidObj.id+'">'+kabidObj.name+'</option>');
			});
		});
	});
	$('#jenis_izin').change(function(e){
		console.log(e.target.value);
		var izin_id = e.target.value;
		if(izin_id == 2222){
			$('#pilihsatu').show();
			$('#pilihdua').hide();
		}else if(izin_id == 2223){
			$('#pilihsatu').hide();
			$('#pilihdua').show();
		}else{
			$('#pilihsatu').hide();
			$('#pilihdua').hide();
		}
	});
	$('#pilih_pemohon').change(function(e){
		console.log(e.target.value);
		var pil_pemohon = e.target.value;
		if(pil_pemohon == 1){
			$('#pemohon1').show();
			$('#pemohon2').hide();
		}else if(pil_pemohon == 2){
			$('#pemohon1').hide();
			$('#pemohon2').show();
		}else{
			$('#pemohon1').hide();
			$('#pemohon2').hide();
		}
	});
	new TomSelect("#kecamatan_id",{
		create: false,
		sortField: {
			field: "text",
			direction: "asc"
		}
	});
	new TomSelect("#status_pemohon",{
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