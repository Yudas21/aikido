<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Perguruan Aikido SAF Dojo</title>
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
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Contrail+One' rel='stylesheet' type='text/css'>
<!---fonts-->
<link href="front/css/owl.carousel.css" rel="stylesheet">
<script src="front/js/owl.carousel.js"></script>
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
    <style type="text/css">
    #myBtn {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 20px; /* Place the button at the bottom of the page */
        right: 30px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        border: none; /* Remove borders */
        outline: none; /* Remove outline */
        background-color: #6495ED; /* Set a background color */
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
<!---slider--->
</head>
<body>
    <!---header--->
        <div class="header-section">
            <div class="container">
                <nav class="navbar navbar-default fixed-top">
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
                                <li class="active"><a href="{{ url('') }}">Beranda <span class="sr-only">(current)</span></a></li>
                                <li><a href="{{ url('about') }}">Tentang Kami</a></li>
                                <li><a href="{{ url('news') }}">Berita</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeri <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('gallery/foto') }}">Foto</a></li>
                                            <li><a href="{{ url('gallery/video') }}">Video</a></li>
                                        </ul>
                                </li>
                                <li><a href="events.html">Jadwal</a></li>
                                <li><a href="{{ url('contact') }}">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!---header--->
        <!--bannerslider-->
                <div class="header-banner">
                    <div class="container">
                        <div class="caption">
                            <h3>Morihei Ueshiba</h3>
                            <p>Ketika musuh datang, majulah dan sambut dia, bila musuh mundur, antarkan dia ke jalannya</p>          
                        </div>
                    </div>
                </div>
                <!--bannerslider-->
                <!---content--->
                <div class="content" style="margin-top: 50px;">
                    <div class="welcome-section">
                        <div class="container">
                        <h2>Selamat Datang</h2>
                            <span></span>
                            
                            <div class="welcome-grids">
                                @if(count($latest_foto) > 0)
                                    @foreach($latest_foto as $dlf)
                                        <div class="col-md-4 welcome-grid">
                                            <img src="{{ url('/storage/foto/'.$dlf->image_path) }}" width="300" height="300" alt=""/>
                                            <div class="wel-bottom hvr-bounce-to-bottom" style="width:300px;">
                                                <h4>{{ $dlf->image_title }}</h4>
                                                <p>{{ $dlf->image_title }}</p>
                                            </div>
                                        </div>   
                                    @endforeach
                                @else
                                    <div class="col-md-4 welcome-grid">
                                        <img src="front/images/welcome/1.jpg" class="img-responsive" alt=""/>
                                        <div class="wel-bottom  hvr-bounce-to-bottom">
                                            <h4>Lorem Ipsum</h4>
                                            <p>Fusce euismod consequat ante. Lorem ipsum dolor sit amet, cosectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl. </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 welcome-grid">
                                        <img src="front/images/welcome/2.jpg" class="img-responsive" alt=""/>
                                        <div class="wel-bottom hvr-bounce-to-bottom">
                                            <h4>Lorem Ipsum</h4>
                                            <p>Fusce euismod consequat ante. Lorem ipsum dolor sit amet, cosectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl. </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 welcome-grid">
                                        <img src="front/images/welcome/3.jpg" class="img-responsive" alt=""/>
                                        <div class="wel-bottom hvr-bounce-to-bottom">
                                            <h4>Lorem Ipsum</h4>
                                            <p>Fusce euismod consequat ante. Lorem ipsum dolor sit amet, cosectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl.  </p>
                                        </div>
                                    </div>
                                @endif
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="news-section">
                        <div class="container">
                            <h3>Berita Terbaru</h3>
                            <span style="color: blue;"></span>
                            @if(count($latest_news) > 0)
                              @foreach($latest_news as $dln)
                                <div class="news-grids">
                                    <div class="col-md-4 new-grid">
                                        @if($dln->news_image != '' || $dln->news_image != NULL)
                                          <a href="#" class="mask"><img src="{{ url('/storage/news/'.$dln->news_image) }}" class="img-responsive zoom-img" alt=""/></a>
                                        @else
                                          <a href="#" class="mask"><img src="{{ asset('not-available.png') }}" class="img-responsive zoom-img" alt=""/></a>
                                        @endif
                                        
                                    </div>
                                    <div class="col-md-8 new-grid1 hvr-bounce-to-right">
                                        <div style="color:#555;"><i class="glyphicon glyphicon-calendar"></i> {{ date('d F Y | H:i', strtotime($dln->created_at)) }} <i class="glyphicon glyphicon-user"></i></div>
                                        <h4><a href="#">{{ $dln->news_title }}</a></h4>
                                        <?php echo $dln->news_content; ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                              @endforeach
                            @else
                            <div class="news-grids">
                                <div class="col-md-4 new-grid">
                                    <a href="events.html" class="mask"><img src="front/images/welcome/1.jpg" class="img-responsive zoom-img" alt=""/></a>
                                </div>
                                <div class="col-md-8 new-grid1 hvr-bounce-to-right">
                                    <h5><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> 25 November 2015 </h5>
                                    <h4><a href="#">Fusce euismod consequat ante Lorem ipsum dolor sit amet</a></h4>
                                    <p>Nam aliquam pretium feugiat. Duis sem est, viverra eu interdum ac, suscipit nec mauris. Suspendisse commodo tempor sagittis! In justo est, sollicitudin eu scelerisque pretium, placerat eget elit. Praesent faucibus rutrum odio at rhoncus. Pel ermentum pretium. Maecenas ac lacus ut neque rhoncus laoreet sed id tellus. Donec justo tellus.</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="news-grids">
                                <div class="col-md-4 new-grid">
                                    <a href="events.html" class="mask"><img src="front/images/welcome/2.jpg" class="img-responsive zoom-img" alt=""/></a>
                                </div>
                                <div class="col-md-8 new-grid1 hvr-bounce-to-right">
                                    <h5><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> 25 November 2015 </h5>
                                    <h4><a href="#">Fusce euismod consequat ante Lorem ipsum dolor sit amet</a></h4>
                                    <p>Nam aliquam pretium feugiat. Duis sem est, viverra eu interdum ac, suscipit nec mauris. Suspendisse commodo tempor sagittis! In justo est, sollicitudin eu scelerisque pretium, placerat eget elit. Praesent faucibus rutrum odio at rhoncus. Pel ermentum pretium. Maecenas ac lacus ut neque rhoncus laoreet sed id tellus. Donec justo tellus.</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="news-grids">
                                <div class="col-md-4 new-grid">
                                    <a href="events.html" class="mask"><img src="front/images/welcome/3.jpg" class="img-responsive zoom-img" alt=""/></a>
                                </div>
                                <div class="col-md-8 new-grid1 hvr-bounce-to-right">
                                    <h5><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> 25 November 2015 </h5>
                                    <h4><a href="#">Fusce euismod consequat ante Lorem ipsum dolor sit amet</a></h4>
                                    <p>Nam aliquam pretium feugiat. Duis sem est, viverra eu interdum ac, suscipit nec mauris. Suspendisse commodo tempor sagittis! In justo est, sollicitudin eu scelerisque pretium, placerat eget elit. Praesent faucibus rutrum odio at rhoncus. Pel ermentum pretium. Maecenas ac lacus ut neque rhoncus laoreet sed id tellus. Donec justo tellus.</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endif
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