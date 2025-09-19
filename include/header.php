<?php
session_start();
include("include/db_connect.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Veer Bahadur Singh Purvanchal University</title>
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<link rel="stylesheet" type="text/css" href="css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.rateyo.css" />
	<!-- <link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/meanmenu.min.css"> -->
	<link rel="stylesheet" type="text/css" href="inner-page-style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
	<!-- Bootstrap CDN Class -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUa1zY4kaKo2nFeR7E3KD6y2xEg4tUWmZaxFJbN6E2eU4MxK5uPjG8F6rWbi" crossorigin="anonymous">
</head>
<style>
	#logo {
		height: 60px;
		width: 40px;
		/* margin-left: 0px; */
	}

	#images {
		height: 500px;
		width: 100%;
	}
</style>

<body>
	<div id="page" class="site" itemscope itemtype="http://schema.org/LocalBusiness">
		<header class="site-header">
			<div class="top-header">
				<div class="container">
					<div class="top-header-left">
						<div class="top-header-block">
							<a href="mailto:info@educationpro.com" itemprop="email"><i class="fas fa-envelope"></i> vbspu@educationpro.com</a>
						</div>
						<div class="top-header-block">
							<a href="tel:+91 8090835664" itemprop="telephone"><i class="fas fa-phone"></i> +91 8090835664</a>
						</div>
					</div>
					<div class="top-header-right">
						<div class="social-block">
							<ul class="social-list">
								<li><a href=""><i class="fab fa-viber"></i></a></li>
								<li><a href="https://www.google.com/" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
								<li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
								<li><a href="https://x.com/?lang=en" target="_blank"><i class="fab fa-facebook-messenger"></i></a></li>
								<li><a href="https://x.com/?lang=en" target="_blank"><i class="fab fa-twitter"></i></a></li>
								<!-- <li><a href=""><i class="fab fa-skype" aria-hidden="true"></i></a></li> -->
							</ul>
						</div>

						<div class="login-block">
							<a href="student_login.php">Login In /</a>
							<a href="student_sign.php"> Sign In</a>
						</div>

					</div>
				</div>
			</div>
			<!-- Top header Close -->
			<!-- Latest News Start -->
			<?php
			$get_notice = "SELECT * FROM news_notice ORDER BY new_datetime DESC LIMIT 1";
			$run_notice = mysqli_query($con,$get_notice);
			if ($run_notice) {
				$row_title = mysqli_fetch_array($run_notice);
				$new_title = $row_title['new_title'];
				$new_desc=$row_title['new_desc'];
				$news_datetime=$row_title['new_datetime'];
				echo "<marquee behavior='alternate' style='color:black; font-size:24px; font-weight:bold;'>$new_title / $new_desc / $news_datetime</marquee>";
			}
			?>
			<!-- Latest News End -->

			<div class="main-header">
				<div class="container">
					<div class="logo-wrap" itemprop="logo">
						<img src="images/vbslogo.jpeg" id='logo' alt="Logo Image">
						<!-- <h1>Education</h1> -->
					</div>
					<div class="nav-wrap">
						<nav class="nav-desktop">
							<ul class="menu-list">
								<li><a href="index.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="gallery2.php">Gallery</a></li>
								<li><a href="faculties.php">Faculties</a></li>
								<li class="menu-parent">Facility
									<ul class="sub-menu">
										<li><a href="hostel.php">Hostel</a></li>
										<li><a href="mesh.php">Mesh</a></li>
										<li><a href="library.php">Library</a></li>
									</ul>
								</li>
								<li class="menu-parent">Courses
									<ul class="sub-menu">
										<li class="menu-parent">Graduction
											<ul class="sub-menu">
												<li><a href="addmission.php">BCA</a></li>
												<li><a href="addmission.php">B-Tech</a></li>
											</ul>
										</li>
										<li class="menu-parent">Post Graduction
											<ul class="sub-menu">
												<li><a href="addmission.php">MCA</a></li>
												<li><a href="addmission.php">M-Tech</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="menu-parent">News & Notice
									<ul class="sub-menu">
										<li><a href="addmission.php">Addmission News</a></li>
										<!-- <li><a href="paper_notice.php">Paper News</a></li> -->
										<li><a href="holiday_news.php">Holiday News</a></li>
									</ul>
								</li>
								<!-- <li><a href="contact.php">Acheive</a></li> -->
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</nav>
						<div id="bar">
							<i class="fas fa-bars"></i>
						</div>
						<div id="close">
							<i class="fas fa-times"></i>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header Close -->

		<!-- Carousel Start -->
		<div class="banner">
			<div class="owl-four owl-carousel" itemprop="image">
				<img src="images/vbs1.jpeg" alt="Image of Bannner" id="images">
				<img src="images/vbs2.jpeg" alt="Image of Bannner" id="images">
				<img src="images/vbs3.jpeg" alt="Image of Bannner" id="images">
			</div>
			<div id="owl-four-nav" class="owl-nav"></div>
		</div>
		<!-- Carousen End -->