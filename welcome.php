<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Packages</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!--================ Start Header Menu Area =================-->
		<header class="header_area">
			<div class="main_menu">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
								<li class="nav-item"><a class="nav-link" href="packages.php">Packages</a></li>
								<li class="nav-item"><a class="nav-link" href="blog.html">Places</a></li>
									<li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

								<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
							</ul>
							<ul class="nav navbar-nav ml-auto">
								<li class="nav-item">
									<a href="logout.php" class="primary-btn">Logout</a>
								</li>
								<li class="nav-item">
									<button type="button" class="search nav-link">
										<i class="lnr lnr-magnifier" id="search"></i>
									</button>
								</li>
							</ul>
						</div>
					</div>
				</nav>

				<div class="search_input" id="search_input_box">
					<div class="container">
						<form class="d-flex justify-content-between">
							<input type="text" class="form-control" id="search_input" placeholder="Search Here">
							<button type="submit" class="btn"></button>
							<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
						</form>
					</div>
				</div>
			</div>
		</header>
	<!--================ End Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area ">
		<div class="banner_inner overlay d-flex align-items-center">
			<div class="container">
				<div class="banner_content">
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="packages.html">Packages</a>
					</div>
					<h2>Trip Packages</h2>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<div class="page-header">
			<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
        <h2>My DashBoard </h2>
  </div>
	<p>
		<a href="reservation.php" class="btn btn-danger">Book a Room</a>

<div class="container">
<h3> Account informations </h3>
  Username : <?php echo htmlspecialchars($_SESSION["username"]); ?>
<br>
<p>
<a href="reset-password.php" >Change Your Password</a>
</br></p>
</div>

<div class="container">
<h3> Order Informations </h3>
  Username : <?php echo htmlspecialchars($_SESSION["username"]); ?>
<br>
<p>
<a href="order.php" >Order History</a>
</br></p>
</div>


	<div class="cta-area2 section_gap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<img class="cta-img2 img-fluid" src="img/cta-img2.png" alt="">
				</div>
				<div class="offset-lg-2 col-lg-5">
					<h1>Subscribe <br>
						for our Newsletter</h1>
					<p>
					Enter Your email here to get notified about our special offers
					</p>
					<div class="" id="mc_embed_signup2">
						<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							method="get" class="form-inline">
							<div class="d-flex flex-row">
								<input class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '"
									required="" type="email">
								<button class="click-btn btn text-uppercase">subscribe</button>
								<div style="position: absolute; left: -5000px;">
									<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
								</div>
							</div>
							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!--================  start footer Area =================-->
    <footer class="footer-area">
  		<div class="footer_top section_gap_top">
  			<div class="container">
  				<div class="row">
  					<div class="col-lg-3 col-md-6 col-sm-6">
  						<div class="single-footer-widget">
  							<h5 class="footer_title">About the website</h5>
  							<p class="about-text">We have used dynamic web building technique to ensure your safety while browsing our website. </p>
  						</div>
  					</div>
  					<div class="col-lg-2 col-md-6 col-sm-6">
  						<div class="single-footer-widget">
  							<h5 class="footer_title">Navigation Links</h5>
  							<div class="row">
  								<div class="col-5">
  									<ul class="list">
  										<li><a href="about-us">About Us</a></li>
  										<li><a href="packages.html">Packages</a></li>
  										<li><a href="places.html">Places</a></li>
  										<li><a href="contact.html">Contact</a></li>
  									</ul>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="col-lg-3 col-md-6 col-sm-6">
  						<div class="single-footer-widget">
  							<h5>Newsletter</h5>
  							<p>For business professionals caught between high OEM price and mediocre print and graphic output, </p>
  							<div class="footer-newsletter" id="mc_embed_signup">
  								<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
  								 method="get" class="form-inline">
  									<div class="d-flex flex-row">
  										<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
  										 required="" type="email">
  										<button class="click-btn btn btn-default"><span class="lnr lnr-location" aria-hidden="true"></span></button>
  										<div style="position: absolute; left: -5000px;">
  											<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
  										</div>
  									</div>
  									<div class="info"></div>
  								</form>
  							</div>
  						</div>
  					</div>
  					<div class="col-lg-3  col-md-6 col-sm-6">
  						<div class="single-footer-widget mail-chimp">
  							<h5 class="mb-20">Instragram Feed</h5>
  							<ul class="instafeed d-flex flex-wrap">
                  <li><img height="100px" width="160px" src="img/i1.jpg" alt=""></li>
  								<li><img height="100px" width="160px"src="img/i2.jpg" alt=""></li>
  								<li><img height="100px" width="160px"src="img/i3.jpg" alt=""></li>
  								<li><img height="100px" width="160px"src="img/i4.jpg" alt=""></li>

  							</ul>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  		<div class="copyright">
  			<div class="container">
  				<div class="row">
  					<div class="col-lg-6 col-md-12">

  					</div>

  				</div>
  			</div>
  		</div>
  	</footer>
	<!--================ End footer Area =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/owl-carousel-thumb.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/theme.js"></script>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
</body>

</html>
