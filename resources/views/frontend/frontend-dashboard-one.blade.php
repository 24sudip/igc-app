<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>IGC: Impact Global Consultant</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_assets/images') }}/fav.png">

        <!-- bootstrap v4 css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/font-awesome.min.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/animate.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/owl.carousel.css">
		<!-- slick css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/slick.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/magnific-popup.css">
		<!-- Offcanvas CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/off-canvas.css">
		<!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/fonts') }}/flaticon.css">
		<!-- flaticon2 css  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/fonts') }}/fonts2/flaticon.css">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/rsmenu-main.css">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/rsmenu-transitions.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/style.css') }}">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css') }}/responsive.css">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <!--[if lt IE 9]>
        <![endif]-->
    </head>
    <body class="home1">
        <!--Preloader area start here-->
        <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
		<!--Preloader area end here-->

        <!--Full width header Start-->
		<div class="full-width-header">

			<!-- Toolbar Start -->
			<div class="rs-toolbar">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="rs-toolbar-left">
								<div class="welcome-message">
									<i class="fa fa-bank"></i><span>Welcome to IGC</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="rs-toolbar-right">
								<div class="toolbar-share-icon">
									<ul>
										<li><a target="_blank" href="https://web.facebook.com/igcbd?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/impactglobalconsultant/?hl=en"><i class="fa fa-instagram"></i></a></li>
                            <li><a target="_blank" href="https://www.youtube.com/channel/UCMz_DsxeGK77EtAp-lXeiGw"><i class="fa fa-youtube"></i></a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/company/impact-global-consultant-igc"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
								<a href="{{ route('login') }}" class="apply-btn">Login To Enroll</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Toolbar End -->

			<!--Header Start-->
			<header id="rs-header" class="rs-header">

				<!-- Header Top Start -->
				<div class="rs-header-top">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-sm-12">
						        <div class="header-contact">
						            <div id="info-details" class="widget-text">
                                        <i class="glyph-icon flaticon-email"></i>
						                <div class="info-text">
						                    <a href="#">
						                    	<span>Mail</span>
                                                @auth
                                                {{ auth()->user()->email }}
                                                @else
												Guest
                                                @endauth
											</a>
						                </div>
						            </div>
						        </div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="logo-area text-center">
									<a href="{{ route('home') }}"><img src="{{ asset('frontend_assets/images') }}/logo.png" alt="logo"></a>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
						        <div class="header-contact pull-right">
						            <div id="phone-details" class="widget-text">
						                <i class="glyph-icon flaticon-phone-call"></i>
						                <div class="info-text">
						                    <a href="#">
						                    	<span>Name</span>
                                                @auth
                                                {{ auth()->user()->name }}
                                                @else
												Guest
                                                @endauth
											</a>
						                </div>
						            </div>
						        </div>
							</div>
						</div>
					</div>
				</div>
				<!-- Header Top End -->

				<!-- Menu Start -->
				<div class="menu-area menu-sticky">
					<div class="container">
						<div class="main-menu">
							<div class="row">
								<div class="col-sm-12">
									<a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
									<nav class="rs-menu">
										<ul class="nav-menu">
											<!-- Home -->
                                            <li> <a href="{{ route('home') }}">Home</a></li>
											<!-- End Home -->

                                            <!--About Menu Start-->
                                            <li class="menu-item-has-children"> <a href="#">About</a>
												<ul class="sub-menu">
                                                    <li> <a href="{{ route('about') }}">About Us</a></li>
													<li><a href="{{ route('management.list') }}">Management</a></li>
													<li><a href="{{ route('advisor.list') }}">Advisors</a></li>
												</ul>
											</li>
                                            <!--About Menu End-->

											<!--Country Start-->
                                            <li><a href="{{ route('country.list') }}">Countries</a></li>
		                                    <!--Country End-->

                                            <li><a href="{{ route('success.story.list') }}">Success Stories</a></li>

											<!--Testimonial Start-->
                                            <li><a href="{{ route('review.list') }}">Testimonials</a></li>
											<!--Testimonial End-->

											<!--Events Menu Start-->
                                            <li><a href="{{ route('event.list') }}">Events</a></li>
											<!--Events Menu End-->

											<!--blog Menu Start-->
                                            <li><a href="{{ route('blog.list') }}">Blog</a></li>
											<!--blog Menu End-->

											<!--account Menu Start-->
											<li class="menu-item-has-children"> <a href="#">Account</a>
												<ul class="sub-menu">
                                                    @auth
                                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                                    @else
													<li><a href="{{ route('login') }}">Login</a></li>
													<li><a href="{{ route('register') }}">Register</a></li>
                                                    @endauth
												</ul>
											</li>
											<!--account Menu End-->

											<!--Contact Menu Start-->
											<li> <a href="{{ route('contact') }}">Contact</a></li>
								            <!--Contact Menu End-->
										</ul>
									</nav>
                                    <div class="right-bar-icon rs-offcanvas-link text-right">
                                        <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal" href="#"><i class="fa fa-search"></i></a>

                                        <a id="nav-expander" class="nav-expander fixed"><i class="fa fa-bars fa-lg white"></i></a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Menu End -->
			</header>
			<!--Header End-->

		</div>
        <!--Full width header End-->
        @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
            @endif

            @if (Session::has('frontend_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('frontend_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        @yield('frontend_content')

        <!-- Footer Start -->
        <footer id="rs-footer" class="bg3 rs-footer">
			<div class="container">
				<!-- Footer Address -->
				<div>
					<div class="row footer-contact-desc">
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-map-marker"></i>
								<h4 class="contact-title">Address</h4>
								<p class="contact-desc">
									Raisa Bhaban (4th Floor), 100/A-B Sukrabad,<br>
									Dhanmondi, Dhaka 1207, Bangladesh<br>
                                    (Opposite to Metro Shopping Mall)
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-phone"></i>
								<h4 class="contact-title">Phone Number</h4>
								<p class="contact-desc">
									01886462210, 01886462212<br>
									01886462214, 01886462217
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-map-marker"></i>
								<h4 class="contact-title">Email Address</h4>
								<p class="contact-desc">
									counselor@igc.com.bd<br>
									impactglobalconsultant@gmail.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="about-widget">
                                <img src="{{ asset('frontend_assets/images') }}/logo-footer.png" alt="Footer Logo">
                                <p>Impact Global Consultant (IGC) believes in transparency and trust. Therefore, we consult with every student with care and suggest the best-matched courses per their profile. Our team gives our best to provide accurate and authentic information to fulfill their dream of studying abroad.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <h5 class="footer-title">ABOUT US & COUNTRIES</h5>
                            <ul class="sitemap-widget">
                                <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Why choose IGC</a></li>
                                <li ><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Australia</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Course Advice</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Canada</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Scholarship</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>USA</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Student Essentials</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>UK</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Statement of Purpose</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Malaysia</a></li>
                                <li><a href="{{ route('login') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Enrollment</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>China</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <h5 class="footer-title">FACEBOOK POST LINK</h5>
                            <div class="recent-post-widget">
                                <div class="post-item">
                                    <a target="_blank" href="https://web.facebook.com/igcbd/?ref=embed_page">
                                        <img src="{{ asset('frontend_assets/images/fb_link.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="post-item">
                                    <a href="https://web.facebook.com/photo.php?fbid=727747309367677&set=a.502168018592275&type=3&ref=embed_page" target="_blank">
                                        <img src="{{ asset('frontend_assets/images/fb_link.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-share">
                        <ul>
                            <li><a target="_blank" href="https://web.facebook.com/igcbd?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/impactglobalconsultant/?hl=en"><i class="fa fa-instagram"></i></a></li>
                            <li><a target="_blank" href="https://www.youtube.com/channel/UCMz_DsxeGK77EtAp-lXeiGw"><i class="fa fa-youtube"></i></a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/company/impact-global-consultant-igc"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        <p>All Rights Reserved - ©2024
                            <a href="{{ route('privacy.policy') }}"> | Privacy Policy</a>
                            <a href="https://mail5015.site4now.net/interface/root#/login"> | Webmail</a>
                            <a href="https://app.samscrm.co.uk/"> | CRM</a>
                            <a href="https://igc-enrollment.azurewebsites.net/"> | Enrollment</a>
                            Powered by
                            <a href="https://impactdigital360.com.bd/">Impactdigital360 BD</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>

		<!-- Canvas Menu start -->
        <nav class="right_menu_togle">
        	<div class="close-btn"><span id="nav-close" class="text-center">x</span></div>
            <div class="canvas-logo">
                <a href="{{ route('home') }}"><img src="{{ asset('frontend_assets/images') }}/logo-white.png" alt="logo"></a>
            </div>
        	<ul class="sidebarnav_menu list-unstyled main-menu">
                <!--Home Menu Start-->
                <li class="current-menu-item menu-item-has-children"><a href="#">Home</a>
                    <ul class="list-unstyled">
                        <li class="sub-nav active"><a href="{{ route('home') }}">Home<span class="icon"></span></a></li>
                    </ul>
                </li>
                <!--Home Menu End-->

                <!--About Menu Start-->
                <li class="menu-item-has-children"><a href="#">About</a>
                    <ul class="list-unstyled">
                        <li class="sub-nav active"><a href="{{ route('about') }}">About Us<span class="icon"></span></a></li>
                        <li class="sub-nav"><a href="{{ route('management.list') }}">Management<span class="icon"></span></a></li>
                        <li class="sub-nav"><a href="{{ route('advisor.list') }}">Advisors<span class="icon"></span></a></li>
                    </ul>
                </li>
                <!--About Menu End-->

                <!--Pages Menu Start-->
                <li class="menu-item-has-children"><a href="#">Country List</a>
                    <ul class="list-unstyled">
                        <li class="sub-nav active"><a href="{{ route('country.list') }}">Country List<span class="icon"></span></a></li>
                    </ul>
                </li>
                <!--Pages Menu End-->

                <!--Courses Menu Star-->
                <li class="menu-item-has-children"><a href="#">Testimonial</a>
                    <ul class="list-unstyled">
                        <li class="sub-nav"><a href="{{ route('review.list') }}">Testimonial<span class="icon"></span></a></li>
                    </ul>
                </li>
                <!--Courses Menu End-->

                <!--Events Menu Star-->
                <li class="menu-item-has-children"><a href="#">Events</a>
                    <ul class="list-unstyled">
                        <li class="sub-nav"><a href="{{ route('event.list') }}">Events<span class="icon"></span></a></li>
                    </ul>
                </li>
                <!--Events Menu End-->

                <!--blog Menu Star-->
                <li class="menu-item-has-children"><a href="#">Blog</a>
                    <ul class="list-unstyled">
                        <li class="sub-nav"><a href="{{ route('blog.list') }}">Blog<span class="icon"></span></a></li>
                    </ul>
                </li>
                <!--blog Menu End-->
                <li><a href="{{ route('contact') }}">Contact<span class="icon"></span></a></li>
        	</ul>
            <div class="search-wrap">
                <form action="{{ route('search.university') }}" method="post">
                    @csrf
                    <label class="screen-reader-text">Search</label>
                    <input type="search" placeholder="University..." name="university_name" class="search-input" value="">
                    <button type="submit" value="Search"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>
        <!-- Canvas Menu end -->

        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form action="{{ route('search.university') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" name="university_name" placeholder="Search University Name" type="text">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->

        <!-- modernizr js -->
        <script src="{{ asset('frontend_assets/js') }}/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="{{ asset('frontend_assets/js') }}/jquery.min.js"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('frontend_assets/js') }}/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="{{ asset('frontend_assets/js') }}/owl.carousel.min.js"></script>
		<!-- slick.min js -->
        <script src="{{ asset('frontend_assets/js') }}/slick.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="{{ asset('frontend_assets/js') }}/isotope.pkgd.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="{{ asset('frontend_assets/js') }}/imagesloaded.pkgd.min.js"></script>
        <!-- wow js -->
        <script src="{{ asset('frontend_assets/js') }}/wow.min.js"></script>
        <!-- counter top js -->
        <script src="{{ asset('frontend_assets/js') }}/waypoints.min.js"></script>
        <script src="{{ asset('frontend_assets/js') }}/jquery.counterup.min.js"></script>
        <!-- magnific popup -->
        <script src="{{ asset('frontend_assets/js') }}/jquery.magnific-popup.min.js"></script>
        <!-- rsmenu js -->
        <script src="{{ asset('frontend_assets/js') }}/rsmenu-main.js"></script>
        <!-- plugins js -->
        <script src="{{ asset('frontend_assets/js') }}/plugins.js"></script>
		 <!-- main js -->
        <script src="{{ asset('frontend_assets/js') }}/main.js"></script>
    </body>
</html>
