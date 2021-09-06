<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('tanggal_daftar','Tanggal Daftar') }}
			{{ Form::text('tanggal_daftar',\Carbon\Carbon::now()->format('d-m-Y'),['class'=>'form-control']) }}
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
		<div class="form-group">
			{{ Form::label('nama_perusahaan','Nama Perusahaan') }}
			{{ Form::text('nama_perusahaan',old('nama_perusahaan'),['class'=>'form-control','id'=>'nama_perusahaan','placeholder'=>'Nama Perusahaan','required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('npwp_perusahaan','NPWP Perusahaan') }}
			{{ Form::number('npwp_perusahaan',old('npwp_perusahaan'),['class'=>'form-control','id'=>'npwp_perusahaan','placeholder'=>'NPWP Perusahaan','required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('alamat_direktur','Alamat Direktur') }}
			{{ Form::text('alamat_direktur',old('alamat_direktur'),['class'=>'form-control','id'=>'alamat_direktur','placeholder'=>'Alamat Direktur','required']) }}
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('sbu_id','Pilih Jenis SBU') }}
					<select name="sbu_id" id="sbu_id" class="form-control" required="">
						<option value="0">Pilih Jenis SBU</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				{{ Form::label('tgl_sbu','Sampai') }}
					{{ Form::text('tgl_sbu',old('tgl_sbu'),['class'=>'form-control tgl_sbu','id'=>'tgl_sbu','placeholder'=>'Sampai']) }}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('ska_id','Pilih Jenis SKA') }}
					<select name="ska_id" id="ska_id" class="form-control" required="">
						<option value="0">Pilih Jenis SKA</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				{{ Form::label('tgl_ska','Sampai') }}
					{{ Form::text('tgl_ska',old('tgl_ska'),['class'=>'form-control tgl_ska','id'=>'tgl_ska','placeholder'=>'Sampai']) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('tgl_oss','Tanggal OSS') }}
			{{ Form::text('tgl_oss',old('tgl_oss'),['class'=>'form-control','id'=>'tgl_oss','placeholder'=>'Tanggal OSS','required']) }}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('pemohon_id','Pilih Pemohon Terdaftar') }}
			<select name="pemohon_id" id="pemohon_id" class="form-control" required="">
				<option value="0">Pilih Pemohon Terdaftar</option>
			</select>
		</div>
		<div class="form-group">
			{{ Form::label('desa_id','Desa') }}
			<select name="desa_id" id="desa_id" class="form-control"></select>
		</div>
		<div class="form-group">
			{{ Form::label('alamat_perusahaan','Alamat Perusahaan') }}
			{{ Form::text('alamat_perusahaan',old('alamat_perusahaan'),['class'=>'form-control','id'=>'alamat_perusahaan','placeholder'=>'Alamat Perusahaan','required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('nama_direktur','Nama Direktur') }}
			{{ Form::text('nama_direktur',old('nama_direktur'),['class'=>'form-control','id'=>'nama_direktur','placeholder'=>'Nama Direktur','required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('notelp_direktur','No. Telp') }}
			{{ Form::number('notelp_direktur',old('notelp_direktur'),['class'=>'form-control','id'=>'notelp_direktur','placeholder'=>'No. Telp','required']) }}
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{{ Form::label('skt_id','Pilih Jenis SKT') }}
					<select name="skt_id" id="skt_id" class="form-control" required="">
						<option value="0">Pilih Jenis SKT</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				{{ Form::label('tgl_skt','Sampai') }}
					{{ Form::text('tgl_skt',old('tgl_skt'),['class'=>'form-control tgl_skt','id'=>'tgl_skt','placeholder'=>'Sampai']) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('status_pemohon','Status Pemohon') }}
			{{ Form::select('status_pemohon',$status,old('status_id'),['placeholder'=>'Pilih Status Pemohon','id'=>'status_pemohon','class'=>'form-control','required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('data_nib','NIB') }}
			{{ Form::number('data_nib',old('data_nib'),['class'=>'form-control','id'=>'data_nib','placeholder'=>'NIB','required']) }}
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<button class="btn btn-primary btn-block">Simpan Data</button>
		</div>
	</div>
</div>