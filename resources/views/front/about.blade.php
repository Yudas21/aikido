<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Perguruan Aikido SAF Dojo | Tentang Kami</title>
<!---css--->
<link href="front/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="front/css/style.css" rel='stylesheet' type='text/css' />
<!---css--->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Diving Centre Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---js--->
<script src="front/js/jquery-1.11.1.min.js"></script>
<script src="front/js/bootstrap.js"></script>
<!---js--->
<!---fonts-->
<link href='//fonts.googleapis.com/css?family=Arial:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Contrail+One' rel='stylesheet' type='text/css'>
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
<!---fonts-->
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
								<h1><a href="{{ url('') }}">Perguruan Aikido SAF Dojo</a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ url('') }}">Beranda <span class="sr-only">(current)</span></a></li>
                                <li class="active"><a href="{{ url('about') }}">Tentang Kami</a></li>
                                <li><a href="{{ url('news') }}">Berita</a></li>
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
					<h2>Tentang Kami</h2>
				</div>
			</div>
		<!---banner--->
				<!---content--->
				<div class="content">
					<!---about--->
						<div class="about-section">
							<div class="container">
								<div class="about-grids">
									<div class="col-md-4 about-grid">
										@if($about->page_image != '' || $about->page_image != NULL)
											<img src="{{ url('/storage/page/'.$about->page_image) }}" class="img-responsive" alt=""/>
										@else
										 	<img src="{{ asset('not-available.png') }}" class="img-responsive" alt=""/>
										@endif
									</div>
									<div class="col-md-8 about-grid1">
										<?php echo $about->page_content;?>
									</div>
								</div>
							</div>
						</div>
					<!---about--->
					<div class="about-bottom">
						<div class="container">
							<div class="aboutbottom-grids">
								<div class="col-md-8 aboutbottom-grid">
									<div class="about-bottom1">
										<h3>Kepengurusan</h3>
										<span></span>
										<div class="staff">
											@if(count($organization) > 0)
											   <?php $no_o = 1;?>
											   @foreach($organization as $do)
											    	<div class="col-md-3 bottom1" style="text-align: center;">
											    		@if($do->photo != '' || $do->photo != NULL)
											    		  <img src="{{ url('/storage/org/'.$do->photo) }}" class="img-circle" style="width: 152px;height: 152px;" alt=""/>
											    		@else
											    		  <img src="{{ asset('not-available.png') }}" class="img-circle" style="width: 152px;height: 152px;" alt=""/>
											    		@endif
														
														<h5>{{ $do->name }}</h5>
														<p>{{ $do->position }}</p>
													</div>
											    @if($no_o % 4 == 0)
											    	<div class="clearfix"></div>
											    @endif
											   	<?php $no_o++;?>
											   @endforeach
											@else
												<div class="col-md-3 bottom1">
													<img src="front/images/t1.png" class="img-responsive img-circle" alt=""/>
													<h5>Mark Johnson</h5>
													<p>Nulla facilisi. Aenean nec eros.... </p>
												</div>
												<div class="col-md-3 bottom1">
													<img src="front/images/t2.png" class="img-responsive img-circle" alt=""/>
													<h5>Mark Johnson</h5>
													<p>Nulla facilisi. Aenean nec eros.... </p>
												</div>
												<div class="col-md-3 bottom1">
													<img src="front/images/t3.png" class="img-responsive img-circle" alt=""/>
													<h5>Mark Johnson</h5>
													<p>Nulla facilisi. Aenean nec eros.... </p>
												</div>
												<div class="col-md-3 bottom1">
													<img src="front/images/t4.png" class="img-responsive img-circle" alt=""/>
													<h5>Mark Johnson</h5>
													<p>Nulla facilisi. Aenean nec eros.... </p>
												</div>
												<div class="clearfix"></div>
												<div class="col-md-3 bottom1">
													<img src="front/images/t1.png" class="img-responsive img-circle" alt=""/>
													<h5>Mark Johnson</h5>
													<p>Nulla facilisi. Aenean nec eros.... </p>
												</div>
												<div class="col-md-3 bottom1">
													<img src="front/images/t2.png" class="img-responsive img-circle" alt=""/>
													<h5>Mark Johnson</h5>
													<p>Nulla facilisi. Aenean nec eros.... </p>
												</div>
												<div class="col-md-3 bottom1">
													<img src="front/images/t3.png" class="img-responsive img-circle" alt=""/>
													<h5>Mark Johnson</h5>
													<p>Nulla facilisi. Aenean nec eros.... </p>
												</div>
												<div class="col-md-3 bottom1">
													<img src="front/images/t4.png" class="img-responsive img-circle" alt=""/>
													<h5>Mark Johnson</h5>
													<p>Nulla facilisi. Aenean nec eros.... </p>
												</div>
												<div class="clearfix"></div>
											@endif
											<div class="clearfix"></div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-md-4 aboutbottom-grid1">
									<h3>Kurikulum</h3>
									<span></span>
									@if(count($kurikulum) > 0)
									   <?php $no_k = 1;?>
									   @foreach($kurikulum as $dk)
									     <div class="actives">
											<div class="active-left">
												<h5>{{ $no_k }} .</h5>
											</div>
											<div class="active-right">
												<h5>{{ $dk->name }}</h5>
												<?php echo $dk->description;?>
											</div>
											<div class="clearfix"></div>
										</div>
										<?php $no_k++;?>
									   @endforeach
									@else
										<div class="actives">
											<div class="active-left">
												<h5>1 .</h5>
											</div>
											<div class="active-right">
												<h5>Nullam in risus dolor</h5>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit massa vel mauris sollicitudin dignissim. Phasellus ultrices... </p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="actives">
											<div class="active-left">
												<h5>2 .</h5>
											</div>
											<div class="active-right">
												<h5>Nullam in risus dolor</h5>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit massa vel mauris sollicitudin dignissim. Phasellus ultrices... </p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="actives">
											<div class="active-left">
												<h5>3 .</h5>
											</div>
											<div class="active-right">
												<h5>Nullam in risus dolor</h5>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit massa vel mauris sollicitudin dignissim. Phasellus ultrices... </p>
											</div>
											<div class="clearfix"></div>
										</div>
									@endif
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
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