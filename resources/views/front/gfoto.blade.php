<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Perguruan Aikido SAF Dojo | Galeri Gambar<</title>
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
<link href='//fonts.googleapis.com/css?family=Arial:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Contrail+One' rel='stylesheet' type='text/css'>
<!---fonts-->
<!---slider--->
<link rel="stylesheet" href="{{ asset('front/css/swipebox.css') }}">
	<script src="{{ asset('front/js/jquery.swipebox.min.js') }}"></script> 
		<script type="text/javascript">
			jQuery(function($) {
			$(".swipebox").swipebox();
			});
		</script>
<!---slider--->
<style type="text/css">
	#myBtn {
	    display: none; /* Hidden by default */
	    position: fixed; /* Fixed/sticky position */
	    bottom: 20px; /* Place the button at the bottom of the page */
	    right: 30px; /* Place the button 30px from the right */
	    z-index: 99; /* Make sure it does not overlap */
	    border: none; /* Remove borders */
	    outline: none; /* Remove outline */
	    background-color: #dc3545; /* Set a background color */
	    color: white; /* Text color */
	    cursor: pointer; /* Add a mouse pointer on hover */
	    padding: 15px; /* Some padding */
	    border-radius: 10px; /* Rounded corners */
	    font-size: 18px; /* Increase font size */
	}

	#myBtn:hover {
	    background-color: #555; /* Add a dark-grey background on hover */
	}
</style>
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
                                <li><a href="{{ url('news') }}">Berita</a></li>
                                <li class="dropdown active">
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
					<h2>Galeri Foto</h2>
				</div>
			</div>
		<!---banner--->
				<!---content--->
				<div class="content">
					<div class="gallery">
						<div class="container">
							<div class="gallery-grids">
							    <?php $no = 1; ?>
							    @foreach ($data as $d_foto)
							    	<div class="col-md-3 gallery-grid gallery1">
									<a href="{{ url('/storage/foto/'.$d_foto->image_path) }}" class="swipebox">
										<img src="{{ url('/storage/foto/'.$d_foto->image_path) }}" height="198" width="265" alt="/">
										<div class="textbox">
											<h4></h4>
											<p>{{ $d_foto->image_title }}</p>
										</div>
									</a>
									</div>
									@if($no % 4 == 0)
										<div class="clearfix"> </div>	  
									@endif
									<?php $no++;?>
							    @endforeach
						</div>
						<div class="clearfix"> </div>
						{{ $data->links() }}
						</div>
					</div><br><br>
					<!---features--->	
				</div>
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
							<p>Copyright &copy; 2018 Perguruan Aikido SAF Dojo. All rights reserved</p>
						</div>						
					</div>
				</div>
			<!--footer-->
			<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="glyphicon glyphicon-chevron-up"></i></button> 
             <script type="text/javascript">
                window.onscroll = function() {scrollFunction()};

                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        document.getElementById("myBtn").style.display = "block";
                    } else {
                        document.getElementById("myBtn").style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0; // For Safari
                    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                } 
             </script>
</body>
</html>