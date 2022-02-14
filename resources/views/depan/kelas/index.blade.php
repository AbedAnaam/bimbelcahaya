@extends('layouts.frontend.main')

@section('navbar')
<div class="navbar-start">
	<div class="navbar-item has-dropdown is-hoverable">
		@if($breadcrumb_kel->all() == null)

		@else
		<a class="navbar-link">
			Kelas
		</a>
		<div class="navbar-dropdown">
			@foreach ($breadcrumb_kel->all() as $kelas)
				<a class="navbar-item" href="{{url('kelas', $kelas->id)}}" style="text-decoration:none; color:black">
					{{$kelas->nama_kelas}}
				</a>
			@endforeach
		</div>
		@endif
	</div>
</div>
@endsection

@section('content')
    <section class="hero is-small is-warning is-bold">
        <div class="hero-body">
			<div class="container">
				@if($kel->all() == null)
				<h1 class="title">
					Kelas
				</h1>
				<h2 class="subtitle">
					Mohon maaf... Belum ada datanya 
				</h2>
				@else
				<h1 class="title">
					Tingkat {{ $kelas->jenjang->nama_jenjang }}
				</h1>
				<h2 class="subtitle">
					Klik link Nama Kelasnya ya :)
				</h2>
				@endif
				
			</div>
        </div>
	</section>

	@if($kel->all() == null)
		<div class="container pt-5">
		</div>
	@else
		<div class="container pt-5">
			<nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumbs">
				<ul>
					<li>
						<a href="{{url ('/')}}">Home</a>
					</li>
					<li class="is-active">
						<a href="#" aria-current="page">Kelas</a>
					</li>
				</ul>
			</nav>
		</div>
	@endif

    <section class="hero is-small">
		<div class="hero-body">
			<div class="container">
				@if($kel->all() == null)
				<div class="columns is-2 is-multiline is-mobile">
					<div class="column is-info is-light">
						<article class="message is-info">
							<div class="message-header">
								Info
							</div>
							<div class="message-body">
								Mohon maaf, kelas untuk jenjang ini belum dilakukan update oleh admin. Bantu ingatkan admin ya, guys :)
							</div>
						</article>
					</div>
					<div class="column is-one-quarter">
						<div class="box has-background-white-bis">
							<div class="content is-normal">
								<h2>Link Terkait</h2>
								<p>Silakan klik <strong>link</strong> berikut untuk menuju ke halaman lainnya</p>
							</div>
							<aside class="menu">
								<p class="menu-list subtitle is-6 has-text-justified">
									<a href="{{url('/')}}" class="has-text-link-dark" style="text-decoration:none">Home</a>
									@foreach($kel->all() as $link)
										<a href="{{url('kelas', $link->id)}}" class="has-text-link-dark" >
											{{ $link->nama_kelas }}
										</a>
									@endforeach
								</p>
							</aside>
						</div>
					</div>
				@endif
				
				<div class="columns is-multiline is-mobile">
					@foreach($kel->all() as $bawah)
						<div class="column is-4">
							<div class="card">
								<div class="card-content">
									<div class="content">
										<div class="block">
											<p class="title is-4">{{ $bawah->nama_kelas }}</a></p>
										</div>
										<div class="block">
											<p class="subtitle">{!! $bawah->deskripsi_kelas !!}</p>
										</div>
									</div>
								</div>
								<footer class="card-footer">
									<a href="{{url('kelas', $bawah->id)}}" class="card-footer-item is-warning" style="text-decoration:none">Klik disini</a>
								</footer>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
@endsection