@extends('layouts.frontend.main')

@section('navbar')
<div class="navbar-start">
	<div class="navbar-item has-dropdown is-hoverable">
		@if($mapel->all() == null)

		@else
		<a class="navbar-link">
			List Mapel 
		</a>
		<div class="navbar-dropdown">
			@foreach ($mapel->all() as $mapel)
				<a class="navbar-item" href="{{url('mapel', $mapel->id)}}" style="text-decoration:none; color:black">
					{{$mapel->nama_mapel}}
				</a>
			@endforeach
		</div>
		@endif
	</div>
</div>
@endsection

@section('content')
    <section class="hero is-small is-link is-bold">
        <div class="hero-body">
            <div class="container">
                @if($breadcrumb_map->all() == null)
                    <h1 class="title">
                        Mapel 
                    </h1>
                    <h2 class="subtitle">
                        Yah... Belum ada datanya nih
                    </h2>
				@else
                    <h1 class="title">
                        Mapel @if($breadcrumb_map) {{ $mapel->kelas->nama_kelas }} @endif
                    </h1>
                    <h2 class="subtitle">
                        Klik Nama Mapelnya ya :)
                    </h2>
				@endif
            </div>
        </div>
    </section>

    @if($mapel->all() == null)
        <div class="container pt-5">
        </div>
	@else
    <div class="container pt-5">
		<nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumbs">
			<ul>
				<li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href= @foreach($breadcrumb_map->all() as $bck) "{{url('jenjang', $bck->kelas->jenjang_id)}}" @endforeach>Kelas</a>
                </li>
				<li class="is-active">
                    <a href="#" aria-current="page">Mata Pelajaran</a>
                </li>
			</ul>
		</nav>
	</div>
    @endif

    <section class="hero is-small">
        <div class="hero-body">      
            <div class="container">
            @if($mapel->all() == null)
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
									@foreach($map->all() as $link)
										<a href="{{url('mapel', $link->id)}}" class="has-text-link-dark" >
											{{ $link->nama_mapel }}
										</a>
									@endforeach
								</p>
							</aside>
						</div>
					</div>
				@endif
                <div class="columns is-multiline is-mobile">
                    @foreach($breadcrumb_map->all() as $mapel)
                        <div class="column is-3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="content">
                                        <div class="block">
                                            <p class="title is-4">
                                                <a href="{{url('mapel', $mapel->id)}}" style="text-decoration:none">{{$mapel->nama_mapel}}</a>
                                            </p>
                                        </div>
                                        <div class="block">
                                            <p class="subtitle is-6">{!! $mapel->deskripsi_mapel !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>  
    </section>
@endsection