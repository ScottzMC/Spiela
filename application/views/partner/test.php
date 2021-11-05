<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&amp;display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/my-custom.css'); ?>" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<?php foreach($profile as $prof){} ?>
	<title>Spiela - Partner <?php echo $prof->fullname; ?> Profile</title>

</head>

<style>
a{
    color: black;
}

.menu-link{
    font-size: 12px;
}
</style>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<?php include 'menu/nav.php'; ?>

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap p-0">
				<div class="container clearfix">

					<div class="row cnt m-0">
						<div class="col-12">
							
							<div class="feature-box fbox-lg fbox-outline fbox-dark fbox-effect">
								<div class="fbox-icon">
									<img src="<?php echo base_url('uploads/partners/'.$prof->image); ?>" />
								</div>
								<div class="fbox-content">
									<h3><?php echo $prof->fullname; ?></h3>
									<span class="partner-desig">Partner</span>
									<div class="clear"></div>
									<p><i class="fas fa-map-marker-alt"></i><?php echo $prof->location; ?></p>
									<?php if(!empty($profile)){ ?>
									<br>
									<span class="web"><a href="<?php echo $prof->url; ?>" target="_blank">Visit Platform</a></span>
									<?php }else{ echo ''; } ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-12">
							
							<div class="profile-tabs-section"><!-- Profile Tab Section Start -->
								
								<div class="tabs clearfix" id="tab-3">

									<ul class="tab-nav tab-nav2 profile-tabs-nav clearfix">
										<li><a href="#tabs-10">Details</a></li>
										<li><a href="#tabs-11">Job adverts</a></li>
										<li class="hidden-phone"><a href="#tabs-12">Events</a></li>
									</ul>
									
									<div class="row">
									<div class="col-12 col-md-7 col-lg-7">

										<div class="tab-container">

											<div class="tab-content clearfix" id="tabs-10">
												<h3>Biography</h3>
												<p>
												<?php echo $prof->bio; ?>
												</p>
											</div>
											<div class="tab-content clearfix" id="tabs-11">
												<h3>Job Adverts</h3>
												<?php if(!empty($advert)){ foreach($advert as $adv){ ?>
												<h5>
												    <a href="<?php echo site_url('community/detail/'.$adv->id); ?>">
												        <?php echo str_replace('-', ' ', $adv->title); ?>
												    </a>
												</h5>
												<p><?php echo $adv->body; ?></p>
												<?php } }else{ echo ''; }  ?>
											</div>
											<div class="tab-content clearfix" id="tabs-12">
												<h3>Events</h3>
												<?php if(!empty($event)){ foreach($event as $eve){ ?>
												<h5><?php echo $eve->title; ?></h5>
												<p><?php echo $eve->body; ?></p>
												<?php } }else{ echo ''; }  ?>
											</div>

										</div>
									</div>
									</div>
									
									<?php foreach($social as $soc){} ?>
									<div class="row social-sec">
										<div class="col-12 col-md-7 col-lg-7">
										    <?php if($soc->social == "Twitter"){ ?>
											<a href="<?php echo $soc->url; ?>"><i class="i-rounded fab fa-twitter profile-social"></i></a>
											<?php }else if($soc->social == "Facebook"){ ?>
											<a href="<?php echo $soc->url; ?>"><i class="i-rounded fab fa-facebook-f profile-social"></i></a>
											<?php }else if($soc->social == "Instagram"){ ?>
											<a href="<?php echo $soc->url; ?>"><i class="i-rounded fab fa-instagram profile-social"></i></a>
											<?php } ?>
										</div>
									</div>
									<?php //} ?>

								</div>
								
							</div> <!-- Profile Tab Section End -->
						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<!--<div id="gotoTop" class="icon-angle-up"></div>-->

	<!-- JavaScripts
	============================================= -->
	<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('js/plugins.min.js'); ?>"></script>

	<!-- Footer Scripts
	============================================= -->
    <script src="<?php echo base_url('js/functions.js'); ?>"></script>

</body>

</html>