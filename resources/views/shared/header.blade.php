<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{url('/')}}">My Joblist Apps</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
	
	<div class="collapse navbar-collapse" id="navbarColor01">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href=" {{url('daftar_lowongan')}} " class="nav-link">Daftar Lowongan</a>
			</li>
		@guest
            <li class="nav-item">
				<a href="{{ route('login') }}" class="nav-link">Masuk</a>
			</li>
            <li class="nav-item">
				<a href="{{ route('register') }}" class="nav-link">Daftar</a>
			</li>
		@else
		@if ( Auth::User()->hasRole('User') )
			<li class="nav-item">
				<a href=" {{route('user_detail.index')}} " class="nav-link">Profil</a>
			</li>
		@endif
		@if (Auth::User()->hasRole('admin'))  
			<li class="nav-item">
				<a href=" {{url('admin')}} " class="nav-link">Dashboard Admin</a>
			</li>
		@endif
			<li class="nav-item">
				<a href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</li>
        @endguest
		</ul>
	</div>
</nav>