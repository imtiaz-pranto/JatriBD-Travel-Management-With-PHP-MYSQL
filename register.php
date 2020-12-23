<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>



<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Registration</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">

	<style type="text/css">
			body{ font: 14px sans-serif; }
			.wrapper{ width: 350px; padding: 20px; }
	</style>
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
								<li class="nav-item"><a class="nav-link" href="packages.html">Packages</a></li>
								<li class="nav-item"><a class="nav-link" href="blog.html">Places</a></li>
									<li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

								<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
							</ul>
							<ul class="nav navbar-nav ml-auto">
								<li class="nav-item">
									<a href="login.php" class="primary-btn">Login For Booking</a>
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
					<h2>User Registration</h2>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<div class="wrapper">
			<h2>Sign Up</h2>
			<p>Please fill this form to create an account.</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
							<label>Username</label>
							<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
							<span class="help-block"><?php echo $username_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
							<label>Password</label>
							<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
							<span class="help-block"><?php echo $password_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
							<label>Confirm Password</label>
							<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
							<span class="help-block"><?php echo $confirm_password_err; ?></span>
					</div>
					<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Submit">
							<input type="reset" class="btn btn-default" value="Reset">
					</div>
					<p>Already have an account? <a href="login.php">Login here</a>.</p>
			</form>
	</div>

	<!--================ Start CTA Area =================
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
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
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
	</div>-->
	<!--================ End CTA Area =================-->

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

  									<li><img height="60px" width="100px" src="img/i1.jpg" alt=""></li>
  									<li><img height="60px" width="100px"src="img/i2.jpg" alt=""></li>
  									<li><img height="60px" width="100px"src="img/i3.jpg" alt=""></li>
  									<li><img height="60px" width="100px"src="img/i4.jpg" alt=""></li>

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
</body>

</html>
