<?php 
$id_site_info = $this->Mdl_site_info->get_max();
$sql_q = $this->Mdl_site_info->get_where($id_site_info);
foreach ($sql_q->result() as $item) {
	$site_title_ar = $item->site_title;
	$site_description_ar = $item->site_description;
	$site_fb = $item->site_fb;
	$site_insta = $item->site_insta;
	$site_twitter = $item->site_twitter;
	$site_google_plus = $item->site_google_plus;
	$site_linkedin = $item->site_linkedin;
	$site_email = $item->site_email;
	$site_address = $item->site_address;
	$phone_number = $item->phone_number;
	$favicon = $item->favicon;
	$logo = $item->logo;
}
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if($actual_link == "http://localhost/project/contact") {
	$is_there = TRUE;
} else {
	$is_there = FALSE;
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blog Omar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	-->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?= base_url() ?>front/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?= base_url() ?>front/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?= base_url() ?>front/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?= base_url() ?>front/css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-flipped.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>front/css/style.min.css">

	<!-- Modernizr JS -->
	<script src="<?= base_url() ?>front/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="<?= base_url() ?>front/js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="<?= base_url() ?>"><?= $site_title_ar ?></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li class="fh5co-active"><a href="<?= base_url() ?>">الصفحة الرئيسية</a></li>
					<li><a href="<?= base_url() ?>blog">المقالات</a></li>
					<li><a href="#">معرض الاعمال</a></li>
					<li>
						<a href="blog.html">المقالات الطبية</a>
					</li>
					<li><a href="<?= base_url() ?>about">من انا</a></li>
					<li><a href="<?= base_url() ?>contact">اتصل بنا</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p><small>All Rights <?= date('Y') ?>.&copy; Reserved To Wareesh</span></p>
				<ul>
					<?php 
					if($site_fb != '') { ?>
					<li><a href="<?= $site_fb ?>"><i class="icon-facebook2"></i></a></li>
					<?php
					} 
					?>
					<?php 
					if($site_twitter != '') { ?>
					<li><a href="<?= $site_twitter ?>"><i class="icon-twitter2"></i></a></li>
					<?php
					} 
					?>
					<?php 
					if($site_insta != '') { ?>
					<li><a href="<?= $site_insta ?>"><i class="icon-instagram"></i></a></li>
					<?php
					} 
					?>
					<?php 
					if($site_linkedin != '') { ?>
					<li><a href="<?= $site_linkedin ?>"><i class="icon-linkedin2"></i></a></li>
					<?php
					} 
					?>
				</ul>
			</div>

		</aside>

		<div id="fh5co-main">

			<?= $body ?>
			
			<?php if ($is_there == FALSE): ?>
				<div id="get-in-touch">
				<div class="fh5co-narrow-content">
					<div class="row">
						<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
							<h1 class="fh5co-heading-colored">اضف لمستك</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<p class="fh5co-lead">بامكانك اضافة لمستك فى الموقع من خلال ارسال رسالتك سوف تحسن من اداء الموقع.</p>
							<p>
								<a href="<?= base_url() ?>contact" class="btn btn-primary">اعرف المزيد</a>
							</p>
						</div>

					</div>
				</div>
			</div>
			<!-- get-in-touch -->
			<?php endif ?>
			
					
		</div>
	</div>

	<!-- jQuery -->
	<script src="<?= base_url() ?>front/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?= base_url() ?>front/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>front/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?= base_url() ?>front/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="<?= base_url() ?>front/js/jquery.flexslider-min.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="<?= base_url() ?>front/js/main.js"></script>

	</body>
</html>

