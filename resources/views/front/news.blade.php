<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Perguruan Aikido SAF Dojo | Berita</title>
<!---css--->
<link href="{{ asset('front/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('front/css/style.css') }}" rel='stylesheet' type='text/css' />
<!---css--->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Diving Centre Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---js--->
<script src="{{ asset('front/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.js') }}"></script>
<!---js--->
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Contrail+One' rel='stylesheet' type='text/css'>
<!---fonts-->
<!---slider--->
<script src="{{ asset('front/js/responsiveslides.min.js') }}"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<!---slider--->
<link href="{{ asset('front/css/owl.carousel.css') }}" rel="stylesheet">
<script src="{{ asset('front/js/owl.carousel.js') }}"></script>
	<script>
		$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		});
		});
	</script>
<!---slider--->
</head>
<body>
	<!---header--->
		<div class="header-section">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!---Brand and toggle get grouped for better mobile display--->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>				  
							<div class="navbar-brand">
								<h1 style="font-size: 26px;margin-top: 10px;"><a href="{{ url('') }}">Perguruan Aikido SAF Dojo</a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ url('') }}">Beranda <span class="sr-only">(current)</span></a></li>
                                <li><a href="{{ url('about') }}">Tentang Kami</a></li>
                                <li class="active"><a href="{{ url('news') }}">Berita</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeri <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('gallery/foto') }}">Foto</a></li>
                                            <li><a href="{{ url('gallery/video') }}">Video</a></li>
                                        </ul>
                                </li>
                                <li><a href="{{ url('schedule') }}">Jadwal</a></li>
                                <li><a href="{{ url('contact') }}">Kontak</a></li>
                            </ul>
                        </div>
					</div>
				</nav>
			</div>
		</div>
		<!---header--->
		<!---banner--->
			<div class="banner-section">
				<div class="container">
					<h2>Berita</h2>
				</div>
			</div>
		<!---banner--->
				<!---content--->
				<div class="content">
					<div class="events-section">
						<div class="container">
							<div class="event-grids">
								<?php $no = 1; ?>
								@foreach($data as $d_news)

									<div class="col-md-4 event-grid">
									<img src="<?php echo $d_news->news_image!='' ? asset('storage/news/'.$d_news->news_image) : asset('not-available.png');?>" class="img-responsive" alt="/">
											<div class="event-text">
												<h5>{{ date('d', strtotime($d_news->created_at)) }}</h5>
												<span>{{ date('F', strtotime($d_news->created_at)) }}</span>
												<span>{{ date('Y', strtotime($d_news->created_at)) }}</span>
											</div>
										<h4>{{ $d_news->news_title }}</h4>
										<?php echo substr($d_news->news_content,0,100);?>
									</div>
									@if($no % 4 == 0)
										<div class="clearfix"></div>
									@endif
									<?php $no++; ?>
								@endforeach
							</div>	
							{{ $data->links() }}
						</div>
					</div>
				</div>
				<br><br>
		<!---content--->
		<!--footer-->
				<div class="footer-section">
					<div class="container">
						<div class="social-icons">
							<a href="#"><i class="icon1"></i></a>
							<a href="#"><i class="icon2"></i></a>
							<a href="#"><i class="icon3"></i></a>
							<a href="#"><i class="icon4"></i></a>
						</div>
						<div class="footer-top">
							<p>&copy; 2018 Perguruan Aikido SAF Dojo. All rights reserved</p>
						</div>						
					</div>
				</div>
			<!--footer-->
</body>
</html>