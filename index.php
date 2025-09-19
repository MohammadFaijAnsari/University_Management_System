<!-- Database Connection Start -->
<?php
include("include/db_connect.php");
?>
<!--Database Connection End  -->
 <!-- Header Inculde Start -->
<?php
include("include/header.php");
?>
<!-- Header Include End -->
<head>
	<style>
		#image {
			height:250px;
			width:317px;
		}
		#image1{
			height: 300px;
			width: 400px;
		}
	</style>
</head>
<!-- Popular courses Start -->
 
<div class="page-heading">
	<div class="container">
		<h2>popular courses</h2>
	</div>
</div>
<div class="learn-courses">
	<div class="container">
		<div class="courses">
			<div class="owl-one owl-carousel">
				<?php
				 $get_course="SELECT * FROM addmission_new";
				 $run_course=mysqli_query($con,$get_course);
				 while($row_course=mysqli_fetch_array($run_course,MYSQLI_ASSOC)){
                   $c_title=$row_course['c_title'];
				   $c_desc=$row_course['c_desc'];
				   $c_dur=$row_course['c_dur'];
				   $c_fees=$row_course['c_fees'];
				   $c_image=$row_course['c_image'];
				?>
				<div class="box-wrap" itemprop="event" itemscope itemtype=" http://schema.org/Course">
					<div class="img-wrap" itemprop="image"><img src="./_admin/uploads/<?php echo  $c_image;?>" id="image1" alt="courses picture"></div>
					<a href="#" class="learn-desining-banner" itemprop="name"><?php echo $c_title;?></a>
					<div class="box-body" itemprop="description">
						<p>
						<?php echo $c_desc;?>
						</p>
						<section itemprop="time">
							<p><span>Duration:</span><?php echo $c_dur;?></p>
							<!-- <p><span>Class Time:</span></p> -->
							<p><span>Fee:</span><?php echo $c_fees;?></p>
						</section>
					</div>
				</div>
                <?php } ?>
			</div>
		</div>
	</div>
</div>

<!-- Popular Courses End -->
<!-- Learn courses End -->
<section class="whyUs-section">
	<div class="container">
		<div class="featured-points">
			<ul>
				<li><i class="fas fa-book"></i> free books for students</li>
				<li><i class="fas fa-money-check-alt"></i> affordable fees</li>
				<li><i class="fas fa-chalkboard-teacher"></i> experienced teachers</li>
				<li> <i class="fas fa-book"></i> free books for students</li>
			</ul>
		</div>
		<div class="whyus-wrap">
			<h1>why us?</h1>
			<p itemprop="description">Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum</p>
			<a href="#" class="read-more-btn">read more</a>
		</div>
	</div>
</section>
<!-- Closed WhyUs section -->
<section class="page-heading">
	<div class="container">
		<h2>gallery</h2>
	</div>
</section>
<section class="gallery-images-section" itemprop="image" itemscope itemtype=" http://schema.org/ImageGallery">
	<?php
	$select_image = "SELECT * FROM gallery";
	$run_image = mysqli_query($con, $select_image);
	while ($row_image = mysqli_fetch_array($run_image)) {
		$image = $row_image['g_image'];
	?>
		<div class="gallery-img-wrap">
			<a href="./_admin/Gallery/<?php echo $image ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
				<img src="./_admin/Gallery/<?php echo $image ?>" alt="gallery-images" id='image' name='image' class="img-responsive">
			</a>
		</div>
	<?php } ?>
</section>
<!-- End of gallery Images -->
<section class="page-heading">
	<div class="container">
		<h2>upcomming events</h2>
	</div>
</section>
<section class="events-section" itemprop="event" itemscope itemtype=" http://schema.org/Event">
	<div class="container">
		<div class="event-wrap">
			<div class="img-wrap" itemprop="image">
				<img src="images/events.jpg" alt="event images">
			</div>
			<div class="details">
				<a href="">
					<h3 itemprop="name">Orientation Programme for new Students.</h3>
				</a>
				<p itemprop="description">Orientation Programme for new sffs Students. Orientation Programme for new sffs Students. Orientation Programme for new sffs Students.</p>

				<h5 itemprop="startDate"><i class="far fa-clock"></i> Dec 30,2018 | 11am</h5>
				<h5 itemprop="location"><i class="fas fa-map-marker-alt"></i> Hotel Malla, Lainchaur</h5>
			</div>
		</div>

		<div class="event-wrap">
			<div class="img-wrap" itemprop="image">
				<img src="images/events.jpg" alt="event images">
			</div>
			<div class="details">
				<a href="">
					<h3 itemprop="name">Orientation Programme for new Students.</h3>
				</a>
				<p itemprop="description">Orientation Programme for new sffs Students. Orientation Programme for new sffs Students. Orientation Programme for new sffs Students.</p>

				<h5 itemprop="startDate"><i class="far fa-clock"></i> Dec 30,2018 | 11am</h5>
				<h5 itemprop="location"><i class="fas fa-map-marker-alt"></i> Hotel Malla, Lainchaur</h5>
			</div>
		</div>
	</div>
</section>
<!-- End of Events section -->
<section class="what-other-say">
	<div class="container">
		<h4 class="article-subtitle">Get to Know</h4>
		<h2 class="head">what our customer say</h2>
		<div class="three owl-carousel owl-theme">
			<div class="customer-item" itemscope itemtype="http://schema.org/Rating">
				<div class="border">
					<div class="customer">
						<figure>
							<img class="customer-img" src="images/customer-img.jpg" alt="Person image">
							<figcaption>
								<span itemprop="author">SAGAR KUMAR SAPKOTA</span>
								<div class="rateYo" itemprop="ratingValue"></div>
							</figcaption>
						</figure>
					</div>
					<div class="customer-review">
						<p itemprop="description">
							"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non"
						</p>
					</div>
				</div>
			</div>
			<div class="customer-item" itemscope itemtype="http://schema.org/Rating">
				<div class="border">
					<div class="customer">
						<figure>
							<img class="customer-img" src="images/customer-img.jpg" alt="Person image">
							<figcaption>
								<span itemprop="author">SAGAR KUMAR SAPKOTA</span>
								<div class="rateYo" itemprop="ratingValue"></div>
							</figcaption>
						</figure>
					</div>
					<div class="customer-review">
						<p itemprop="description">
							"22222Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non"
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of Others talk -->
<section class="page-heading">
	<div class="container">
		<h2>latest news</h2>
	</div>
</section>
<section class="latest-news">

	<div class="container" itemprop="event" itemscope itemtype=" http://schema.org/Event">
		<div class="owl-two owl-carousel">
			<?php
			$select_news = "SELECT * FROM news_notice";
			$run_news = mysqli_query($con, $select_news);
			while ($row_news = mysqli_fetch_array($run_news)) {
				 $new_id=$row_news['new_id'];
				 $new_title=$row_news['new_title'];
				 $new_desc=$row_news['new_desc'];
				 $new_datetime=$row_news['new_datetime'];
				 $new_image=$row_news['new_image'];
			?>
			<div class="news-wrap" itemprop="event">
				<div class="news-img-wrap" itemprop="image">
					<img src="./_admin/uploads/<?php echo $new_image;?>" alt="Latest News Images" height="200px" width="30px">
				</div>
				<div class="news-detail" itemprop="description">
					<a href="">
						<h1><?php echo $new_title?></h1>
					</a>
					<h2 itemprop="startDate">By Admin | <?php echo $new_datetime;?></h2>

					<p><?php echo $new_desc;?></p>
				</div>
			</div>
            <?php } ?>
		</div>
	</div>
</section>
<!-- Latest News CLosed -->
<?php
include("include/footer.php")
?>