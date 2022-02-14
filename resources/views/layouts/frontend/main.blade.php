<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $nama }}</title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
		<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

		<!-- UIkit CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/css/uikit.min.css" />
		
		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.theme.default.min.css">
	</head>

	<body>
		<nav class="navbar" role="navigation" aria-label="main navigation">
			<div class="container">
				<div class="navbar-brand">
					<a class="navbar-item" href="/">
						Logo {{ $nama }}
						<!-- <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28"> -->
					</a>
				
					<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</a>
				</div>
			
				<div id="navbarBasicExample" class="navbar-menu">
					@yield('navbar')
			
					<div class="navbar-end">
						<div class="navbar-item">
							<div class="buttons">
								<a href="{{route('belakang')}}" class="button is-primary">
									<strong>Login Admin</strong>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		
		@yield('content')

		<footer class="footer">
			<div class="content has-text-centered">
				<p>
					Coded with <strong>bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
					<a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
				</p>
			</div>
		</footer>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	
		<!-- UIkit JS -->
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.1/dist/js/uikit-icons.min.js"></script>

		<!-- Owl Carousel JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/owl.carousel.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/owl.carousel.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.owl-carousel').owlCarousel({
					loop:false,
					margin:10,
					responsiveClass:true,
					responsive:{
						0:{
							items:1,
							nav:true
						},
						600:{
							items:2,
							nav:false
						},
					}
				})
			});

			$(document).ready(function() {
				// Check for click events on the navbar burger icon
				$(".navbar-burger").click(function() {

					// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
					$(".navbar-burger").toggleClass("is-active");
					$(".navbar-menu").toggleClass("is-active");

				});
			});
		</script>
	</body>
</html>