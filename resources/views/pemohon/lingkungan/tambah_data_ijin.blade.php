<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('tanggal_daftar','Tanggal Daftar') }}
			{{ Form::text('tanggal_daftar',\Carbon\Carbon::now()->format('d-m-Y'),['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('status_pemohon','Status Pemohon') }}
			<select name="status_pemohon" id="status_pemohon" class="form-control" required="">
				<option value="">- Pilih Status Pemohon -</option>
				@foreach($datastatus as $status)
				<option value="{{ $status->id }}">{{ $status->nama_status }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			{{ Form::label('pemohon_id','Pilih Pemohon Terdaftar') }}
			<select name="pemohon_id" id="pemohon_id" class="form-control" required="">
				<option value="0">Pilih Pemohon Terdaftar</option>
			</select>
		</div>
		<div class="form-group">
			{{ Form::label('kecamatan','Kecamatan') }}
			<select name="kecamatan_id" id="kecamatan_id" class="form-control">
				<option value="">Pilih Kecamatan</option>
				@foreach($getkecamatan as $kec)
				<option value="{{ $kec->id }}">{{ $kec->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group" style="display: none;" id="desa_group">
			{{ Form::label('desa_id','Desa') }}
			<select name="desa_id" id="desa_id" class="form-control"></select>
		</div>
		<div class="form-group">
			{{ Form::label('rt','RT') }}
			{{ Form::number('rt',old('rt'),['class'=>'form-control','id'=>'rt','placeholder'=>'RT']) }}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('rw','RW') }}
			{{ Form::number('rw',old('rw'),['class'=>'form-control','id'=>'rw','placeholder'=>'RW']) }}
		</div>
		<div class="form-group">
			{{ Form::label('jenis_usaha','Jenis Usaha') }}
			{{ Form::text('jenis_usaha',old('jenis_usaha'),['class'=>'form-control','id'=>'jenis_usaha','placeholder'=>'Jenis Usaha','required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('nama_perusahaan','Nama Perusahaan') }}
			{{ Form::text('nama_perusahaan',old('nama_perusahaan'),['class'=>'form-control','id'=>'nama_perusahaan','placeholder'=>'Nama Perusahaan','required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('alamat_perusahaan','Alamat Perusahaan') }}
			{{ Form::text('alamat_perusahaan',old('alamat_perusahaan'),['class'=>'form-control','id'=>'alamat_perusahaan','placeholder'=>'Alamat Perusahaan','required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('nama_penanggungjawab','Nama Penanggungjawab') }}
			{{ Form::text('nama_penanggungjawab',old('nama_penanggungjawab'),['class'=>'form-control','id'=>'nama_penanggungjawab','placeholder'=>'Nama Penanggungjawab','required']) }}
		</div>

	</div>
	<div class="col-md-12">
		<div class="form-group">
			<button class="btn btn-primary btn-block">Simpan Data</button>
		</div>
	</div>
</div>