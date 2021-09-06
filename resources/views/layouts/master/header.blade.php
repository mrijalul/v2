<header class="app-header">
	<a class="app-header__logo" href="#" style="font-family: Lato; font-size: 18px;">{{ config('app.name') }}</a>
	<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
	<ul class="app-nav">
		<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
			<ul class="dropdown-menu settings-menu dropdown-menu-right">
				<li>
					<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
						<i class="fa fa-sign-out fa-lg"></i>{{ __('Logout') }}</a>
						{{ Form::open(['route'=>'logout','method'=>'POST','id'=>'logout-form','style'=>'display:none;']) }}
						{{ Form::close() }}
				</li>
			</ul>
		</li>
	</ul>
</header>