<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&amp;display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('css/my-custom-other.css'); ?>" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<?php if(!empty($profile)){ foreach($profile as $prof){} ?>
    <title><?php echo $prof->firstname; ?> <?php echo $prof->lastname; ?> Profile Page</title>
    <?php }else{ ?>
    <title>Profile Page</title>
    <?php } ?>

</head>

<style>
.note-editor.note-airframe .note-editing-area .note-editable, .note-editor.note-frame .note-editing-area .note-editable {
    background: #fff;
}

.post-post-button {
    border-radius: 6px 6px 6px 6px;
    height: 2.5rem;
    width: 8.3rem;
    background-color: #366E63;
    border: none;
    color: white;
}

.new-post-title {
    border-radius: 4px 4px 4px 4px;
    border: none;
    width: 80%;
    height: 35px;
}

.category-select {
    width: 82%;
}

.event-title-input {
    border: 1px solid #ccc;
}

a{
    color: black;
}

.menu-link{
    font-size: 12px;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  background-color: #fff;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

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
                    <?php if(!empty($profile)){ foreach($profile as $prof){} ?>
					<div class="row cnt m-0">
						<div class="col-12">
							
							<div class="feature-box fbox-lg fbox-outline fbox-dark fbox-effect">
								<div class="fbox-icons profile-circle">
									<img height="150" width="150" src="<?php echo base_url('uploads/profile/'.$prof->profile_image); ?>" class="rounded-circle" />
									<a href="#"><i class="fas fa-plus-circle profile-plus-icon" style=""></i></a>
									<div class="clear"></div>
									<!--<a href="#"><span class="cst-tab-btn">Add connection +</span></a>-->
								</div>
								<div class="fbox-content">
									<h3><?php echo $prof->firstname; ?> <?php echo $prof->lastname; ?></h3>
									<span class="profile-role">User</span>
									<!--<span class="partner-desig">Platinum</span>-->
									<div class="clear"></div>
									<span><?php echo $prof->company; ?></span>
									<p><i class="fas fa-map-marker-alt"></i><?php echo $prof->location; ?></p>
									<span class="web"><?php echo $prof->work_url; ?></span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-12">
							
							<div class="profile-tabs-section"><!-- Profile Tab Section Start -->
								<?php foreach($count as $cnt){} ?>
								<div class="tabs clearfix" id="tab-3">

									<ul class="profile-tab-nav tab-nav tab-nav2 profile-tabs-nav-1 clearfix">
										<li><a href="#tabs-10">Details</a></li>
										<li><a href="#tabs-11">Article Posts (<?php echo $cnt->total; ?>)</a></li>
										<li class="hidden-phone"><a href="#tabs-12" class="">Post Comments</a></li>
									</ul>
									
									<div class="clear"></div>
									
									<div class="row">
									<div class="col-12 col-md-7 col-lg-7">

										<div class="tab-container">

											<div class="tab-content clearfix" id="tabs-10">
												<h3>Biography</h3>
												<p><?php echo $prof->bio; ?></p>
											</div>
											<div class="tab-content clearfix" id="tabs-11">
												<h3>Posts</h3>
												<?php if(!empty($community)){ foreach($community as $comm){ ?>
											<h3><?php echo str_replace('-', ' ', $comm->title); ?></h3>
											<p><?php echo date('j M Y', strtotime($comm->created_date)); ?></p>
											<a href="<?php echo site_url('community/detail/'.$comm->id); ?>" style="color:green; text-decoration:none;">View Post</a><br>
											<br>
											<?php } }else{ echo ''; } ?>
											</div>
											<div class="tab-content clearfix" id="tabs-12">
												<h3>Post Comments</h3>
												<?php if(!empty($comment)){ foreach($comment as $comm){ ?>
											<p><?php echo str_replace('-', ' ', $comm->message); ?></p>
											<p><?php echo date('j M Y', strtotime($comm->created_date)); ?></p><br>
											<?php } }else{ echo ''; } ?>
											</div>

										</div>
									</div>
									</div>
									
									<div class="row">
										<div class="col-12 col-md-7 col-md-5">
											<h3 class="interest">Interests</h3>
											<?php if(!empty($prof->interest)){ ?>
									<?php 
									    $str_arr = explode(',', $prof->interest); 
									    
									    foreach($str_arr as $interest){
                                          $interest;
									?>
											<span class="cst-tab-btn mt-0 mr-3"><?php echo $interest; ?></span>
											<?php } }else{ echo ''; }  ?>
										</div>
									</div>
									
									<!--<div class="row social-sec ml-0">
										<div class="col-12 col-md-7 col-lg-7">
											<i class="i-rounded fab fa-twitter profile-social"></i>
											<i class="i-rounded fab fa-facebook-f profile-social"></i>
											<i class="i-rounded fab fa-instagram profile-social"></i>
										</div>
									</div>-->

								</div>
								
							</div> <!-- Profile Tab Section End -->
						</div>
					</div>
				</div>
				<?php }else{ echo ''; } ?>

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?php echo base_url('js/plugins.min.js'); ?>"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?php echo base_url('js/functions.js'); ?>"></script>

</body>

</html>