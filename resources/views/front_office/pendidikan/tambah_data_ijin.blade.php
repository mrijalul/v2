<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('tanggal_daftar','Tanggal Daftar') }}
			{{ Form::text('tanggal_daftar',\Carbon\Carbon::now()->format('d-m-Y'),['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('status_pemohon','Status Pemohon') }}
			{{ Form::select('status_pemohon',$status,old('status_pemohon'),['placeholder'=>'Pilih Status Pemohon','id'=>'status_pemohon','class'=>'form-control','required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('pemohon_id','Pilih Pemohon Terdaftar') }}
			<select name="pemohon_id" id="pemohon_id" class="form-control" required="">
				<option value="0">Pilih Pemohon Terdaftar</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
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
			{{ Form::label('nama_instansi','Nama Instansi/Perusahaan/Lembaga') }}
			{{ Form::text('nama_instansi',old('nama_instansi'),['class'=>'form-control','placeholder'=>'Nama Instansi/Perusahaan/Lembaga','id'=>'nama_instansi']) }}
		</div>
		<div class="form-group">
			{{ Form::label('jenis_izin','Jenis Izin') }}
			{{ Form::select('jenis_izin',$jenis_izin,NULL,['class'=>'form-control','placeholder'=>'Pilih Izin','required','id'=>'jenis_izin']) }}
		</div>
		<div style="display: none;" id="pilihsatu">
			<h5>IPSP Non Formal</h5><hr>
			<div class="form-group">
				{{ Form::label('alamat_sekolah1','Alamat Sekolah') }}
				{{ Form::text('alamat_sekolah1',old('alamat_sekolah1'),['class'=>'form-control','id'=>'alamat_sekolah1','placeholder'=>'Alamat Sekolah']) }}
			</div>
			<div class="form-group">
				{{ Form::label('nss','Nomor Statistik Sekolah(NSS)') }}
				{{ Form::number('nss',old('nss'),['class'=>'form-control','id'=>'nss','placeholder'=>'Nomor Statistik Sekolah(NSS)']) }}
			</div>
			<div class="form-group">
				{{ Form::label('npsn','Nomor Pokok Sekolah Nasional(NPSN)') }}
				{{ Form::number('npsn',old('npsn'),['class'=>'form-control','id'=>'npsn','placeholder'=>'Nomor Pokok Sekolah Nasional(NPSN)']) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_sekolah','Status Sekolah (Hasil Akreditasi)') }}
				{{ Form::text('status_sekolah',old('status_sekolah'),['class'=>'form-control','id'=>'status_sekolah','placeholder'=>'Status Sekolah (Hasil Akreditasi)']) }}
			</div>
			<div class="form-group">
				{{ Form::label('penanggungjawab','Penanggungjawab') }}
				{{ Form::text('penanggungjawab',old('penanggungjawab'),['class'=>'form-control','id'=>'penanggungjawab','placeholder'=>'Penanggungjawab']) }}
			</div>
			<div class="form-group">
				{{ Form::label('tgl_no_akte','Tanggal dan Nomor Akte Lembaga') }}
				{{ Form::text('tgl_no_akte',old('tgl_no_akte'),['class'=>'form-control','id'=>'tgl_no_akte','placeholder'=>'Tanggal dan Nomor Akte Lembaga']) }}
			</div>
			<div class="form-group">
				{{ Form::label('nib1','NIB') }}
				{{ Form::number('nib1',old('nib1'),['class'=>'form-control','id'=>'nib1','placeholder'=>'NIB']) }}
			</div>
			<div class="form-group">
				{{ Form::label('tgl_nib1','Tanggal NIB') }}
				{{ Form::text('tgl_nib1',old('tgl_nib1'),['class'=>'form-control tgl_nib','id'=>'tgl_nib1','placeholder'=>'Tanggal NIB']) }}
			</div>
			<div class="form-group">
				{{ Form::label('nama_kbli','Nama KBLI') }}
				{{ Form::text('nama_kbli',old('nama_kbli'),['class'=>'form-control','id'=>'nama_kbli','placeholder'=>'Nama KBLI']) }}
			</div>
		</div>
		<div style="display: none;" id="pilihdua">
			<h5>Komitmen Pendirian Program</h5> <hr>
			<div class="form-group">
				{{ Form::label('alamat_sekolah2','Alamat Sekolah') }}
				{{ Form::text('alamat_sekolah2',old('alamat_sekolah2'),['class'=>'form-control','id'=>'alamat_sekolah2','placeholder'=>'Alamat Sekolah']) }}
			</div>
			<div class="form-group">
				{{ Form::label('kepala_sekolah','Kepala Sekolah') }}
				{{ Form::text('kepala_sekolah',old('kepala_sekolah'),['class'=>'form-control','id'=>'kepala_sekolah','placeholder'=>'Kepala Sekolah']) }}
			</div>
			<div class="form-group">
				{{ Form::label('nama_yayasan','Nama Yayasan') }}
				{{ Form::text('nama_yayasan',old('nama_yayasan'),['class'=>'form-control','id'=>'nama_yayasan','placeholder'=>'Nama Yayasan']) }}
			</div>
			<div class="form-group">
				{{ Form::label('nib2','NIB') }}
				{{ Form::number('nib2',old('nib2'),['class'=>'form-control','id'=>'nib2','placeholder'=>'NIB']) }}
			</div>
			<div class="form-group">
				{{ Form::label('tgl_nib2','Tanggal NIB') }}
				{{ Form::text('tgl_nib2',old('tgl_nib2'),['class'=>'form-control tgl_nib','id'=>'tgl_nib2','placeholder'=>'Tanggal NIB']) }}
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<button class="btn btn-primary btn-block">Simpan Data</button>
		</div>
	</div>
</div>