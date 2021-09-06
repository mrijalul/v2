<aside class="app-sidebar">
	<div class="app-sidebar__user">
		<img class="app-sidebar__user-avatar" src="
		@if(is_null(auth()->user()->foto_profil)) {{ asset('img') }}/user_default.png
		@else
		{{ asset('img/user_profile') }}/{{ auth()->user()->foto_profil }}
		@endif
		" alt="User Image" style="width: 25%;">
		<div style="word-wrap: break-word;overflow-wrap: break-word;">
			<p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
			<p class="app-sidebar__user-designation">@if(auth()->user()->is_pemohon == '1')
			Level Pemohon
			@else
			@endif
		</div>
	</div>

	<ul class="app-menu">
		@if(auth()->user()->is_pemohon == '1')
		<li>
			<a class="app-menu__item {{ Request::is('pemohon/home') ? 'active' : '' }}" href="{{ route('pemohon.home') }}">
				<i class="app-menu__icon fa fa-dashboard"></i>
				<span class="app-menu__label">Dashboard</span>
			</a>
		</li>

		<li>
			<a class="app-menu__item {{ Request::is('pemohon/pemohon') ? 'active' : '' }}" href="{{ route('pemohon.pemohon.index') }}">
				<i class="app-menu__icon fa fa-user-plus"></i>
				<span class="app-menu__label">Pemohon</span>
			</a>
		</li>

		<li class="treeview {{ Request::is('pemohon/izin/*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Perizinan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				@foreach($ijin as $ijn)
				<li><a class="treeview-item {{ Request::is('pemohon/izin/'.$ijn->slug_perijinan.'*') ? 'active' : '' }}" href="{{ route('pemohon.perijinan',$ijn->slug_perijinan) }}"><i class="icon fa fa-circle-o"></i> {{ $ijn->nama_perijinan }}</a></li>
				@endforeach
			</ul>
		</li>
		@elseif(auth()->user()->is_frontoffice == '1')
		<li>
			<a class="app-menu__item {{ Request::is('front-office/home') ? 'active' : '' }}" href="{{ route('frontOffice.home') }}">
				<i class="app-menu__icon fa fa-dashboard"></i>
				<span class="app-menu__label">Dashboard</span>
			</a>
		</li>

		<li>
			<a class="app-menu__item {{ Request::is('front-office/pemohon') ? 'active' : '' }}" href="{{ route('frontOffice.pemohon.foindex') }}">
				<i class="app-menu__icon fa fa-user-plus"></i>
				<span class="app-menu__label">Pemohon</span>
			</a>
		</li>

		<li class="treeview {{ Request::is('front-office/izin/*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Perizinan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				@foreach($ijin as $ijn)
				<li><a class="treeview-item {{ Request::is('front-office/izin/'.$ijn->slug_perijinan.'*') ? 'active' : '' }}" href="{{ route('frontOffice.perijinan',$ijn->slug_perijinan) }}"><i class="icon fa fa-circle-o"></i> {{ $ijn->nama_perijinan }}</a></li>
				@endforeach
			</ul>
		</li>
		@else
		@endif
	</ul>
</aside>