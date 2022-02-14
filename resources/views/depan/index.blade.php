@extends('layouts.frontend.main')

@section('navbar')
<div class="navbar-start">
	<div class="navbar-item has-dropdown is-hoverable">
		<a class="navbar-link">
			Jenjang
		</a>

		<div class="navbar-dropdown">
			@foreach ($jenjang->all() as $jenjang)
				<a class="navbar-item" href="{{url('jenjang', $jenjang->id)}}" style="text-decoration:none; color:black">
					{{$jenjang->nama_jenjang}}
				</a>
			@endforeach
		</div>
	</div>
</div>
@endsection

@section('content')
	<section class="hero is-small is-primary is-bold">
		<div class="hero-body">
			<div class="container">
				@if($jenjang->all() == null)
				<h1 class="title">
					Belum ada data
				</h1>
				<h2 class="subtitle">
					Yah... Belum ada datanya nih
				</h2>
				@else
				<h1 class="title">
					Kumpulan Soal dan Materi {{ $nama }}
				</h1>
				<h2 class="subtitle">
					Klik pada nama tingkatnya ya :)
				</h2>
				@endif
			</div>
		</div>
	</section>

	@if($jenjang->all() == null)
	<div class="container pt-5">
	</div>
	@else
	<div class="container pt-5">
		<nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumbs">
			<ul>
				<li class="is-active">
					<a href="#" aria-current="page">Home</a>
				</li>
			</ul>
		</nav>
	</div>
	@endif

	<section class="hero is-small">
		<div class="hero-body">
			<div class="container">
				<div class="columns is-mobile">
					<div class="owl-carousel owl-theme">
					@foreach($jenjang->all() as $jenjang)
						<div class="item">
						<div class="column">
							<div class="uk-animation-toggle" tabindex="0">
								<div class="uk-card uk-card-default uk-card-body uk-animation-fade is-link">
									<div class="card-content">
										<div class="media">
											<div class="media-left">
												<figure class="image is-96x96">
													<img src="{{asset('storage/'.$jenjang->gambar_jenjang)}}" alt="Gambar Jenjang">
												</figure>
											</div>

											<div class="media-content">
												<p class="title is-4"><a href="{{url('jenjang', $jenjang->id)}}" style="text-decoration:none; color:black">{{$jenjang->nama_jenjang}}</a></p>
												<p class="subtitle is-6">{!! $jenjang->deskripsi_content !!}</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection