<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="69 studio is a responsive creative agency template">
    <meta name="keywords" content="portfolio, corporate, business, parallax, creative, agency">
    <meta name="author" content="trendytheme.net">

    <title>Galeri | Kantor Urusan Agama Delta Pawan</title>

    <!-- Favicons -->
    <link href="{{ asset('favicon.png') }}" rel="icon">
    <link href="{{ asset('favicon.png') }}" rel="apple-touch-icon">


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
    <!-- animate CSS -->
    <link href="landing-assets/css/animate.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="landing-assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Flat Icon CSS -->
    <link href="landing-assets/fonts/flaticon/flaticon.css" rel="stylesheet">
    <!-- magnific-popup -->
    <link href="landing-assets/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- owl.carousel -->
    <link href="landing-assets/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="landing-assets/owl-carousel/owl.theme.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="landing-assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="landing-assets/css/style.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="landing-assets/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body id="page-top">

    @include('landing-page.sections.navbar')

    <!-- Portfolio Hover Five-->
    <section class="section-padding">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Galeri</h2>
                <p class="sub-title">Foto Kantor Urusan Agama Delta Pawan</p>
            </div>

            <div class="version-four mt-50">
                <div class="row">
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="col-sm-4">
                            <div class="recent-project">
                                <div class="tt-overlay"></div>
                                <img class="img-responsive" src="images/galleries/gallery-{{ $i }}.jpeg"
                                    alt="image">
                                <div class="project-link">
                                    <a class="tt-lightbox" href="images/galleries/gallery-{{ $i }}.jpeg">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div><!-- /.project-link -->
                            </div><!-- /.recent-project -->
                        </div>
                    @endfor
                </div>
            </div>
        </div><!-- /.container -->
    </section><!-- /.portfolio-section -->


    <!-- map-section -->
    <section class="map-section">
        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="250"
            frameborder="0" style="border:0;" allowfullscreen=""
            src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=KUA Delta Pawan&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </section><!-- /.map-section -->

    @include('landing-page.sections.footer')


    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="landing-assets/js/jquery-2.1.3.min.js"></script>
    <script src="landing-assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="landing-assets/js/jquery.easing.min.js"></script>
    <script src="landing-assets/js/jquery.sticky.min.js"></script>
    <script src="landing-assets/js/smoothscroll.min.js"></script>
    <script src="landing-assets/js/jquery.stellar.min.js"></script>
    <script src="landing-assets/js/jquery.inview.min.js"></script>
    <script src="landing-assets/js/wow.min.js"></script>
    <script src="landing-assets/js/jquery.countTo.min.js"></script>
    <script src="landing-assets/js/jquery.shuffle.min.js"></script>
    <script src="landing-assets/js/jquery.BlackAndWhite.min.js"></script>
    <script src="landing-assets/owl-carousel/owl.carousel.min.js"></script>
    <script src="landing-assets/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="landing-assets/js/scripts.js"></script>
</body>

</html>
