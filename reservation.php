<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Hotel Online Reservation</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "style.css" />
	</head>
<body>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="img/favicon.png" type="image/png">
		<title>Blog</title>
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
									<li class="nav-item"><a class="nav-link" href="blog.php">Places</a></li>
										<li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
									<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
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



	<!--<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Hotel Online Reservation</a>
			</div>
		</div>
	</nav>
	<ul id = "menu">
		<li><a href = "index.html">Home</a></li> |
		<li><a href = "about-us.html">About us</a></li> |
		<li><a href = "contact.html">Contact us</a></li> |
		<li><a href = "reservation.php">Make a reservation</a></li> |
	</ul>-->
	<div style = "margin-left:0;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h3>Make A Reservation</h3></strong>
				<br>
				<?php
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` ORDER BY `price` ASC") or die(mysql_error());
					while($fetch = $query->fetch_array()){
				?>
					<div class = "well" style = "height:300px; width:100%;">
						<div style = "float:left;">
							<img src = "photo/<?php echo $fetch['photo']?>" height = "250" width = "350"/>
						</div>
						<div style = "float:left; margin-left:10px;">
							<h3><?php echo $fetch['room_type']?></h3>
							<h4 style = "color:#00ff00;"><?php echo "Price: BDT ".$fetch['price'].".00"?></h4>
							<br /><br /><br /><br /><br /><br />
							<a style = "margin-left:580px;" href = "add_reserve.php?room_id=<?php echo $fetch['room_id']?>" class = "btn btn-info"><i class = "glyphicon glyphicon-list"></i> Reserve</a>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>&copy; Copyright Spidey 2019 </label>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>
</html>
