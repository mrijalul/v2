<div class="form-group">
	{{ Form::label('nik','NIK') }}
	{{ Form::number('nik',old('nik'),['class'=>'form-control','id'=>'nik','aria-describedby'=>'id_nik','placeholder'=>'NIK','required']) }}
</div>
<div class="form-group">
	{{ Form::label('nama_lengkap','Nama Lengkap') }}
	{{ Form::text('nama_lengkap',old('nama_lengkap'),['class'=>'form-control','id'=>'nama_lengkap','placeholder'=>'Nama Lengkap','required']) }}
</div>
<div class="form-group">
	{{ Form::label('pekerjaan','Pekerjaan') }}
	{{ Form::text('pekerjaan',old('pekerjaan'),['class'=>'form-control','id'=>'pekerjaan','placeholder'=>'Pekerjaan']) }}
</div>
<div class="form-group">
	{{ Form::label('jenis_kelamin','Jenis Kelamin') }}
	{{ Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], old('jenis_kelamin'), ['placeholder' => '-- Pilih Jenis Kelamin --','class'=>'form-control','id'=>'jenis_kelamin']) }}
</div>
<div class="row">
	<div class="col-md-5">
		<div class="form-group">
			{{ Form::label('tempat_lahir','Tempat Lahir') }}
			{{ Form::text('tempat_lahir',old('tempat_lahir'),['class'=>'form-control','id'=>'tempat_lahir','placeholder'=>'Tempat Lahir']) }}
		</div>
	</div>
	<div class="col-md-7">
		<div class="form-group">
			{{ Form::label('tanggal_lahir','Tanggal Lahir') }}
			{{ Form::text('tanggal_lahir',old('tanggal_lahir'),['class'=>'form-control','id'=>'tanggal_lahir','placeholder'=>'Tanggal Lahir']) }}
		</div>
	</div>
</div>
<div class="form-group">
	{{ Form::label('rt','RT') }}
	{{ Form::number('rt',old('rt'),['class'=>'form-control'. ($errors->has('rt') ? ' is-invalid' : NULL),'id'=>'rt','aria-describedby'=>'id_rt','placeholder'=>'RT']) }}
</div>
<div class="form-group">
	{{ Form::label('rw','RW') }}
	{{ Form::number('rw',old('rw'),['class'=>'form-control'. ($errors->has('rw') ? ' is-invalid' : NULL),'id'=>'rw','aria-describedby'=>'id_rw','placeholder'=>'RW']) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::textarea('alamat',old('alamat'),['class'=>'form-control'. ($errors->has('alamat') ? ' is-invalid' : NULL),'id'=>'alamat','aria-describedby'=>'id_alamat','placeholder'=>'Alamat','rows'=>'2']) }}
</div>
<div class="form-group">
	{{ Form::label('npwp','NPWP') }}
	{{ Form::number('npwp',old('npwp'),['class'=>'form-control'. ($errors->has('npwp') ? ' is-invalid' : NULL),'id'=>'npwp','aria-describedby'=>'id_npwp','placeholder'=>'NPWP']) }}
</div>
<div class="form-group">
	{{ Form::label('no_telp','No.Telp') }}
	{{ Form::number('no_telp',old('no_telp'),['class'=>'form-control'. ($errors->has('no_telp') ? ' is-invalid' : NULL),'id'=>'no_telp','aria-describedby'=>'id_no_telp','placeholder'=>'No.Telp']) }}
</div>
<div class="form-group">
	{{ Form::label('email','E-Mail') }}
	{{ Form::email('email',old('email'),['class'=>'form-control'. ($errors->has('email') ? ' is-invalid' : NULL),'id'=>'email','aria-describedby'=>'id_email','placeholder'=>'E-Mail','required']) }}
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
</div>

<div class="form-group" id="cpwd-container">
	{{ Form::label('password-confirm','Konfirmasi Password') }}
	<div class="input-group mb-3" id="show_hide_confirm_password">
		{{ Form::password('password_confirmation',['class'=>'form-control','autocomplete'=>'new-password','new_password']) }}
		<div class="input-group-append">
			<a href="" class="input-group-text" id="new_password"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
		</div>
	</div>
</div>

<div class="form-group">
	{{ Form::label('foto','Foto') }}
	{{ Form::file('foto_profil',['class'=>'form-control-file','id'=>'foto']) }}
	<small class="form-text text-muted">
		<code>
			- satu file saja
			- ukuran foto maksimal 5MB
			- hanya png,jpg,jpeg
		</code>
	</small>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary btn-block">Daftar Pemohon</button>
</div>