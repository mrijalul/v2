@extends('layouts.app_login')

@section('app_login_register')
Masuk
@endsection

@section('content')
@if(session()->has('message'))
<div class="bs-component">
	<div class="alert alert-dismissible alert-success">
		<button class="close" type="button" data-dismiss="alert">×</button><strong>{{ session()->get('message') }}</strong>
	</div>
</div>
@endif

<div class="login-box">
	{!! Form::open(['route'=>'login', 'class'=>'login-form', 'method'=>'POST']) !!}
		<h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Masuk</h3>
		
		<div class="form-group row">
			{{ Form::label('email','Email',['class'=>'control-label']) }}
			{{ Form::email('email',old('email'), [
				'class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : NULL),
				'required',
				'autocomplete' => 'email',
				'autofocus',
				'placeholder' => 'Email',
				'aria-describedby'=>'id_email'
			]) }}
			
			@error('email')
			<small class="form-text text-muted" id="id_email">
				{{ $message }}
			</small>
			@enderror
		</div>
		
		<div class="form-group row">
			{{ Form::label('password', __('Password'),['class'=>'control-label']) }}
			{{ Form::password('password', [
				'class' => 'form-control'. ($errors->has('password') ? ' is-invalid' : NULL),
				'required',
				'autocomplete' => 'password',
				'autofocus',
				'placeholder' => 'Password',
				'aria-describedby'=>'id_pass'
			]) }}
			@error('password')
			<small class="form-text text-muted" id="id_pass">
				{{ $message }}
			</small>
			@enderror
		</div>
		<div class="form-group">
			<div class="utility">
				<div class="animated-checkbox">
					<label>
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span class="label-text">Stay Signed in</span>
					</label>
				</div>
				<p class="semibold-text mb-2"><a href="{{ route('register') }}" style="color: #03A5ED;">Belum punya akun ?</a></p>
			</div>
		</div>
		<div class="form-group btn-container">
			<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Login') }}</button>
		</div>
	</form>
	</div>
@endsection
