@extends('layouts.frontend.main')

@section('content')
	<section class="hero is-medium is-warning is-bold">
	  <div class="hero-body">
		<div class="container">
		  <h1 class="title">
			Database Soal Bimbel
		  </h1>
		  <h2 class="subtitle">
			Pada halaman ini, hanya akan dibuat Single Page Application berisi Database Soal Soal
		  </h2>
		</div>
	  </div>
	</section>
		
	<section class="section">
		<div class="container">
			<div class="columns">
				@foreach($jenjang as $jenjang)
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
											<p class="title is-4"><a href="{{url('jenjang',$jenjang->id)}}" style="text-decoration:none; color:black">{{$jenjang->nama_jenjang}}</a></p>
											<p class="subtitle is-6">{!! $jenjang->deskripsi_content !!}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</section>
			  {{-- <div class="column">
				<div class="card">
				  <div class="card-image">
					<figure class="image is-4by3">
					  <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
					</figure>
				  </div>
				  <div class="card-content">
					<div class="media">
					  @foreach($jenjang as $jenjang)
					  <div class="media-left">
						<figure class="image is-48x48">
							<img class="card-img-top" src="{{asset('storage/'.$jenjang->gambar_jenjang)}}" style="max-height:200px;max-width:100%;margin-top:0px;">
						</figure>
					  </div>
					  @endforeach
					  <div class="media-content">
						<p class="title is-4">John Smith</p>
						<p class="subtitle is-6">@johnsmith</p>
					  </div>
					</div>

					<div class="content">
					  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					  Phasellus nec iaculis mauris. <a>@bulmaio</a>.
					  <a href="#">#css</a> <a href="#">#responsive</a>
					  <br>
					  <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
					</div>
				  </div>
				</div>
			  </div> --}}
			  {{-- <div class="column">
				<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2 uk-child-width-1-4@s uk-grid-match uk-margin" uk-grid>
					<div class="uk-card-media-left uk-cover-container">
						<img src="https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&" alt="" uk-cover>
						<canvas width="600" height="400"></canvas>
					</div>
					<div>
						<div class="uk-card-body">
							<h3 class="uk-card-title">Media Left</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
						</div>
					</div>
				</div> 
				<article class="media">
					<figure class="media-left">
						<p class="image is-64x64">
						<img src="https://bulma.io/images/placeholders/128x128.png">
						</p>
					</figure>
						<div class="media-content">
							<div class="content">
								<p>
									<strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
									<br>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
								</p>
							</div>
							<nav class="level is-mobile">
								<div class="level-left">
									<a class="level-item">
									<span class="icon is-small"><i class="fas fa-reply"></i></span>
									</a>
									<a class="level-item">
									<span class="icon is-small"><i class="fas fa-retweet"></i></span>
									</a>
									<a class="level-item">
									<span class="icon is-small"><i class="fas fa-heart"></i></span>
									</a>
								</div>
							</nav>
						</div>
					<div class="media-right">
						<button class="delete"></button>
					</div>
					</article>
			 </div> --}}
	
	<div class="uk-container uk-margin">
		{{-- <div class="uk-card uk-card-body uk-card-primary">
			<h3 class="uk-card-title">Example headline</h3>

			<button class="uk-button uk-button-default" uk-tooltip="title: Hello World">Hover</button>
		</div> --}}
		{{-- <div class="uk-child-width-1-2 uk-child-width-1-4@s uk-grid-match uk-margin" uk-grid>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-fade">
					<p class="uk-text-center">Fade</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-scale-up">
					<p class="uk-text-center">Scale Up</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-scale-down">
					<p class="uk-text-center">Scale Down</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-shake">
					<p class="uk-text-center">Shake</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-left">
					<p class="uk-text-center">Left</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-top">
					<p class="uk-text-center">Top</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-bottom">
					<p class="uk-text-center">Bottom</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-right">
					<p class="uk-text-center">Right</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-left-small">
					<p class="uk-text-center">Left Small</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-top-small">
					<p class="uk-text-center">Top Small</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-bottom-small">
					<p class="uk-text-center">Bottom Small</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-right-small">
					<p class="uk-text-center">Right Small</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-left-medium">
					<p class="uk-text-center">Left Medium</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-top-medium">
					<p class="uk-text-center">Top Medium</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-bottom-medium">
					<p class="uk-text-center">Bottom Medium</p>
				</div>
			</div>
			<div class="uk-animation-toggle" tabindex="0">
				<div class="uk-card uk-card-default uk-card-body uk-animation-slide-right-medium">
					<p class="uk-text-center">Right Medium</p>
				</div>
			</div>
		</div> --}}
		
		<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2 uk-child-width-1-4@s uk-grid-match uk-margin" uk-grid>
			<div class="uk-card-media-left uk-cover-container">
				<img src="https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&" alt="" uk-cover>
				<canvas width="600" height="400"></canvas>
			</div>
			<div>
				<div class="uk-card-body">
					<h3 class="uk-card-title">Media Left</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
				</div>
			</div>
			<div class="uk-card-media-left uk-cover-container">
				<img src="https://images.unsplash.com/photo-1531975474574-e9d2732e8386?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9" alt="" uk-cover>
				<canvas width="600" height="400"></canvas>
			</div>
			<div>
				<div class="uk-card-body">
					<h3 class="uk-card-title">Media Left</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
				</div>
			</div>
			<div class="uk-card-media-left uk-cover-container uk-margin">
				<img src="https://images.unsplash.com/photo-1535982330050-f1c2fb79ff78?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&" alt="" uk-cover>
				<canvas width="600" height="400"></canvas>
			</div>
			<div>
				<div class="uk-card-body">
					<h3 class="uk-card-title">Media Left</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
				</div>
			</div>
			<div class="uk-card-media-left uk-cover-container uk-margin">
				<img src="https://miro.medium.com/max/5792/0*l4NY7SxaQerBKu6F" alt="" uk-cover>
				<canvas width="600" height="400"></canvas>
			</div>
			<div>
				<div class="uk-card-body">
					<h3 class="uk-card-title">Media Left</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
				</div>
			</div>
		</div>
	</div>
	
	<footer class="footer">
		<div class="content has-text-centered">
			<p>
			<strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
			<a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
			is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
			</p>
		</div>
	</footer>
@endsection