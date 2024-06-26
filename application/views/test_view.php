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
    <!--<script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
	<link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('css/my-custom-other.css'); ?>" type="text/css" />
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
    <script src="https://cdn.tiny.cloud/1/ipz3pfazihyek391bngtfq4jkttpppj66g4xtdewxdpjh5qm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="url" property="og:url" content="" />
    <meta name="type" property="og:type" content="" />
    <meta name="title" property="og:title" content="Spiela || The Community of Career Opportunities" />
    <!--<meta name="og:url" property="og:description" content="" />-->
    <meta name="image" property="og:image" content="" />
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-60312988-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-60312988-1');
    </script>
        
    <!-- Hotjar Tracking Code for https://spiela.co.uk/community/view -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2138521,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

	<!-- Document Title
	============================================= -->
	<title>Spiela || The Community of Career Opportunities</title>

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
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row welcome-sec">
						
						<div class="col-md-12 col-lg-9 cst-col">
						    
						    <!-- Mobile -->
						    <?php if(empty($this->session->userdata('login'))){ ?>
							<div class="create-post-btn-mb">
								<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loginPopup">Create a post</button>
							</div>
							<?php } ?>
						
							<div class="welcome-text">
								<h4>Where Opportunities and Communities Meet</h3>
								<h5>Spiela is the platform that creates access to great opportunities and connects motivated people to find success. It's where opportunities and communities meet because talent is equally distributed but opportunity isn’t.</h4>
							</div>
							<br>
							
							<?php if(!empty($this->session->userdata('login'))){ ?>
							
							<div class="sidebar-community-post" style="">
								<h4 style="margin-left: 30px;">Create a post</h4>
										
                            <!--<a name="createpost"></a>
                            <!--<h3 class="spiela-title-heading mt-5">Create a post </h3>-->
                            
                            <form action="<?php echo base_url('community/write_post'); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                            <div class="new-post-snippet">
                                <div class="row ml-4">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-4">
                                        <input type="text" class="form-control" name="title"  placeholder="Add Title..."/>
                                        <strong style="color: red;"><?php echo form_error('title'); ?></strong>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-4">
                                        <select class="form-control category-select" name="category">
                                            <option selected="selected" value="">Select Category</option>
                    						 <!--<option value="announcements">Announcements </option>
                    						 <option value="business-careers">Business Careers </option>-->
                    						 <option value="covid-19">Covid-19</option>
                    						 <option value="diversity-policies">Diversity </option>
                    						 <option value="education-tools">Education tools</option>
                    						 <option value="entertainment-news">Entertainment</option>
                    						 <option value="entrepreneurship">Entrepreneurship</option>
                    						 <option value="equality-for-all">Equality</option>
                    						 <option value="learn-finance">Finance</option>
                    						 <!--<option value="learn-tech">Learn Tech</option>-->
                    						 <!--<option value="inclusion">Inclusion</option>
                    						 <option value="job-market">Job market</option>
                    						 <option value="media-careersy">Media Careers</option>
                    						 <option value="members-community">Members of the community</option>-->
                    						 <option value="mental-health-support">Mental Health </option>
                    						 <!--<option value="migration">Migration</option>-->
                    						 <option value="networking">Networking </option>
                    						 <option value="new-job-opportunities">Opportunities</option>
                    						 <option value="networking-training">Networking </option>
                    						 <!--<option value="range-of-opportunities">Range of Opportunities</option>-->
                    						 <!--<option value="partner">Partner</option>-->
                    						 <option value="politics-news">Politics</option>
                    						 <option value="sports-careers">Sports Careers</option>
                    						 <!--<option value="sports-initiatives">Sports initiatives</option>-->
                    						 <!--<option value="stem-careers">STEM Careers</option>-->
                    						 <option value="technology">Tech</option>
                    						 <option value="women-issues">Women</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row ml-4">
                                    <!--<div class="col-sm-10 col-md-11 col-lg-11 col-xl-11 mt-2 mr-4 mr-md-0 mb-5">
                                        <textarea id="summernote" class="new-post-textarea mb-4" name="body"  placeholder="What's on your mind?"></textarea>
                                    </div>-->
                                    
                                    <div class="col-sm-10 col-md-11 col-lg-11 col-xl-11 mt-2 mr-4 mr-md-0 mb-5">
                                        <textarea id="mytextarea" name="body" placeholder="What's on your mind?"></textarea>
                                    </div>
                
                                </div>
                                <div class="row ml-4">
                                    <div class="col-sm-12 col-md-4 col-lg-12 col-xl-4 mb-4">
                                        <div>
                                            <input type="file" class="post-input" name="fileToUpload[]">
                                        </div>
                                            
                                        <div>
                                            <i class="fas fa-camera"></i> Upload Banner Header
                                            <p>Note: Only upload banner pictures in jpeg, jpg, png format only</p>
                                            <!--<button class="post-input ml-3"><i class="fas fa-file-video"></i> Video</button>-->
                                        </div>
                                    </div>
                                    <div class="col-sm-0 col-md-0 col-lg-0 col-xl-2 mb-4">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                        <!--<button class="post-preview"> Preview</button>-->
                                        <button class="post-post-button ml-3" type="submit" name="submit_post"> Post</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                            <div class="qa-cnt"></div>
                        </div>    
                        <?php } ?>
						
						<div class="row">
						<div class="col-12">
							
							<div class="profile-tabs-section"><!-- Profile Tab Section Start -->
								
								<div class="tabs clearfix" id="tab-3">

									<ul class="tab-nav tab-nav2 home-tabs-nav clearfix">
										<li><a href="#tabs-10">Latest Posts</a></li>
										<li><a href="#tabs-11">Most Popular</a></li>
										<li class="hidden-phone verified-tab"><a href="#tabs-13" title="Sponsored job postings and articles from our partners" class="feather-tab"></a></li>
									</ul>
									
									<div class="row">
									<div class="col-12 col-md-12 col-lg-12">

									<div class="home-tab-container">

									    <div class="tab-content clearfix" id="tabs-10">
							    
							    <?php if(!empty($community)){ foreach($community as $comm){ ?>
                                <?php 
                                    $profile_image = $this->Data_model->display_community_post_profile_image($comm->id);
                                    foreach($profile_image as $cprof_img){}
                                    ?>
                                <script>
                                    var title = "<?php echo str_replace('-', ' ', $comm->title); ?>";
                                    var post_id = "<?php echo $comm->id; ?>";
                                    var banner = "<?php echo $comm->banner; ?>";
                                </script>		
							
    							<div class="row cnt ml-0 mr-0" style="margin-top: 0px;">
    								<div class="d-flex auth-mb">
    									<div class="col-md-5 col-lg-5 pl-0 article-img">
    										<img src="https://spiela.co.uk/uploads/community/<?php echo $comm->banner; ?>" style="" class="mr-2">
    									</div>
    									
    									<div class="col-md-7 col-lg-7">
    										<h3 class="home-article-title pb-0"><a href="<?php echo site_url('community/detail/'.$comm->id); ?>"><?php echo character_limiter(str_replace('-', ' ', $comm->title), 50); ?></a></h3>
    									
    									<div class="col-md-12 text-center home-arrow">
										<div class="post-rating-wrap11">
			                                    <i onclick="upVote(<?php echo $comm->id; ?>)" class="fas fa-arrow-up post-rating"></i>
			                                    <div class="post-rating-count"><?php echo $comm->voting; ?></div>
			                                    <i onclick="downVote(<?php echo $comm->id; ?>)" class="fas fa-arrow-down post-rating"></i>
			                            	</div>
										</div>
										
										<p id="vti"></p>
                                        <p id="vtd"></p>
    										
    										<div class="col-md-8 home-social-left" style="">

											<div class="d-flex post-badge-icons-home mt-3 ml-4 ml-md-0">
		                                    <i class="fas fa-award icon-cert icon-cert-badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="If you feel that these posts are brave and bold" onClick="addBadge(<?php echo $comm->id; ?>,'brave')"> <span class="count" id='brave_count_<?php echo $comm->id; ?>'> <?php echo $comm->brave; ?> </span></i>
		                                    
		                                    <i class="fas fa-hand-paper icon-cert icon-cert-raise-hand" data-toggle="tooltip" data-placement="top" title="" data-original-title="150 of these push you to trending page" onClick="addBadge(<?php echo $comm->id; ?>,'trending')">  <span class="count" id='trending_count_<?php echo $comm->id; ?>'> <?php echo $comm->trending; ?> </span></i>
		                                    
		                                    <i class="fas fa-hand-peace icon-cert icon-cert-peace" data-toggle="tooltip" data-placement="top" title="" data-original-title="Posts that bring the community together" onClick="addBadge(<?php echo $comm->id; ?>,'together')">  <span class="count" id='together_count_<?php echo $comm->id; ?>'> <?php echo $comm->together; ?> </span></i>
		                                    
		                                    <i class="fas fa-crown icon-cert icon-cert-crown" data-toggle="tooltip" data-placement="top" title="" data-original-title=" High ranking post (300 of them gets it featured on newsletter)" onClick="addBadge(<?php echo $comm->id; ?>,'featured')"> <span class="count" id='featured_count_<?php echo $comm->id; ?>'> <?php echo $comm->featured; ?> </span></i>
		                                    
		                                    <i class="fas fa-trophy icon-cert icon-cert-peace" data-toggle="tooltip" data-placement="top" title="" data-original-title="Honourable mention posts" onClick="addBadge(<?php echo $comm->id; ?>,'honourable')"> <span class="count" id='honourable_count_<?php echo $comm->id; ?>'> <?php echo $comm->honourable; ?> </span></i>
	                                		</div>
	                                	<?php
                  							$sequel = $this->db->query("SELECT COUNT(*) AS total_count FROM community_review WHERE community_id = '$comm->id' ")->result();
                  							foreach($sequel as $sql){
                  								$total_count = $sql->total_count;
                  							}
                  							?>
		                                	<div class="d-flex mb-3 mb-md-0">
		                                        <i class="fas fa-comments post-comment-feature-home ml-3"></i>
		                                        <span class="post-features-text ml-2"> <?php echo $total_count; ?> </span>
		                                        
		                              <a class="facebook" onClick="sharePost(<?php echo $comm->id; ?>)" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fspiela.co.uk%2Fcommunity%2Fdetail%2F<?php echo $comm->id; ?>&amp;src=sdkpreparse"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Facebook" class="fab fa-facebook-f post-comment-feature-home ml-3"></i></a> 
		                              
		                              <a class="twitter" onClick="sharePost(<?php echo $comm->id; ?>)" target="_blank" href="https://twitter.com/intent/tweet?url=https://spiela.co.uk/community/detail/<?php echo $comm->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Twitter" class="fab fa-twitter post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="linkedin" onClick="sharePost(<?php echo $comm->id; ?>)" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://spiela.co.uk/community/detail/<?php echo $comm->id; ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on LinkedIn" class="fab fa-linkedin post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="whatsapp" onClick="sharePost(<?php echo $comm->id; ?>)" target="_blank" href="https://api.whatsapp.com/send?text=https://spiela.co.uk/community/detail/<?php echo $comm->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on WhatsApp" class="fab fa-whatsapp post-comment-feature-home ml-3"></i></a>
		                              
	                                        <i class="fas fa-share-alt post-comment-feature-home ml-3"></i>
	                                        <span class="post-features-text ml-2"> <?php echo $comm->shared; ?> </span>

	                                        <i class="far fa-dot-circle post-comment-feature-home ml-3"></i>
	                                        <span class="post-features-text ml-2"> <?php echo $comm->viewed; ?> </span>

		                                	</div>

		                                </div>
    
    		                             <div class="col-md-4 home-auth-right">
	                                		<div class="home-cmt-user" style="text-align: right;">
											<a href="<?php echo site_url('link/view/'.$comm->posted_by); ?>"><img src="https://spiela.co.uk/uploads/profile/<?php echo $cprof_img->profile_image; ?>" style="width: 70px; height: 70px;" alt="Author" class="rounded-circle mr-2 cmt-img"></a>
													<div>
														<h5 class="mb-0 pb-0 h6 font-weight-semibold" style=""><a class="auth-name" href="<?php echo site_url('link/view/'.$comm->posted_by); ?>"><?php echo $comm->posted_by; ?></a></h5>
														<small class="text-muted mb-0 font-weight-normal"><?php echo date('j M Y', strtotime($comm->created_date)); ?></small>
													</div>
											</div>
                                		</div>
    
    									</div>
    
    								  </div>
    						    	</div>
    						    	<br>
    						    	<?php } }else{ echo ''; } ?>
							
							        <?php echo $this->pagination->create_links(); ?>
							
									</div>
											
											<div class="tab-content clearfix" id="tabs-11">
										
										<?php if(!empty($popular)){ foreach($popular as $pop){ ?>
                                        <?php 
                                            $profile_image = $this->Data_model->display_community_post_profile_image($pop->id);
                                            foreach($profile_image as $cprof_img){}
                                            ?>
                                        <script>
                                            var title = "<?php echo str_replace('-', ' ', $pop->title); ?>";
                                            var post_id = "<?php echo $pop->id; ?>";
                                            var banner = "<?php echo $pop->banner; ?>";
                                        </script>
                                        
            							<div class="row cnt ml-0 mr-0" style="margin-top: 0px;">
            								<div class="d-flex auth-mb">
            									<div class="col-md-5 col-lg-5 pl-0 article-img">
            										<img src="https://spiela.co.uk/uploads/community/<?php echo $pop->banner; ?>" style="" class="mr-2">
            									</div>
            									
            									<div class="col-md-7 col-lg-7">
            										<h3 class="home-article-title pb-0">
            										<a href="<?php echo site_url('community/detail/'.$pop->id); ?>"><?php echo character_limiter(str_replace('-', ' ', $pop->title), 50); ?></a>
            										</h3>
            							<div class="col-md-12 text-center home-arrow">
        									<div class="post-rating-wrap11">
        	                                    <i onclick="upVote(<?php echo $pop->id; ?>)" class="fas fa-arrow-up post-rating"></i>
        	                                    <div class="post-rating-count"><?php echo $pop->voting; ?></div>
        	                                    <i onclick="downVote(<?php echo $pop->id; ?>)" class="fas fa-arrow-down post-rating"></i>
        	                            	</div>
										</div>
										
										<p id="vti"></p>
                                        <p id="vtd"></p>
            										
            							<div class="col-md-8 home-social-left" style="">

											<div class="d-flex post-badge-icons-home mt-3 ml-4 ml-md-0">
		                                    <i class="fas fa-award icon-cert icon-cert-badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="If you feel that these posts are brave and bold" onClick="addBadge(<?php echo $pop->id; ?>,'brave')"> <span class="count" id='brave_count_<?php echo $pop->id; ?>'> <?php echo $pop->brave; ?> </span></i>
		                                    
		                                    <i class="fas fa-hand-paper icon-cert icon-cert-raise-hand" data-toggle="tooltip" data-placement="top" title="" data-original-title="150 of these push you to trending page" onClick="addBadge(<?php echo $pop->id; ?>,'trending')">  <span class="count" id='trending_count_<?php echo $pop->id; ?>'> <?php echo $pop->trending; ?> </span></i>
		                                    
		                                    <i class="fas fa-hand-peace icon-cert icon-cert-peace" data-toggle="tooltip" data-placement="top" title="" data-original-title="Posts that bring the community together" onClick="addBadge(<?php echo $pop->id; ?>,'together')">  <span class="count" id='together_count_<?php echo $pop->id; ?>'> <?php echo $pop->together; ?> </span></i>
		                                    
		                                    <i class="fas fa-crown icon-cert icon-cert-crown" data-toggle="tooltip" data-placement="top" title="" data-original-title=" High ranking post (300 of them gets it featured on newsletter)" onClick="addBadge(<?php echo $pop->id; ?>,'featured')"> <span class="count" id='featured_count_<?php echo $pop->id; ?>'> <?php echo $pop->featured; ?> </span></i>
		                                    
		                                    <i class="fas fa-trophy icon-cert icon-cert-peace" data-toggle="tooltip" data-placement="top" title="" data-original-title="Honourable mention posts" onClick="addBadge(<?php echo $pop->id; ?>,'honourable')"> <span class="count" id='honourable_count_<?php echo $pop->id; ?>'> <?php echo $pop->honourable; ?> </span></i>
	                                		</div>
	                                	<?php
                  							$sequel = $this->db->query("SELECT COUNT(*) AS total_count FROM community_review WHERE community_id = '$pop->id' ")->result();
                  							foreach($sequel as $sql){
                  								$total_count = $sql->total_count;
                  							}
                  							?>
		                                	<div class="d-flex mb-3 mb-md-0">
		                                        <i class="fas fa-comments post-comment-feature-home ml-3"></i>
		                                        <span class="post-features-text ml-2"> <?php echo $total_count; ?> </span>
		                                        
		                              <a class="facebook" onClick="sharePost(<?php echo $pop->id; ?>)" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fspiela.co.uk%2Fcommunity%2Fdetail%2F<?php echo $pop->id; ?>&amp;src=sdkpreparse"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Facebook" class="fab fa-facebook-f post-comment-feature-home ml-3"></i></a> 
		                              
		                              <a class="twitter" onClick="sharePost(<?php echo $pop->id; ?>)" target="_blank" href="https://twitter.com/intent/tweet?url=https://spiela.co.uk/community/detail/<?php echo $pop->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Twitter" class="fab fa-twitter post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="linkedin" onClick="sharePost(<?php echo $pop->id; ?>)" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://spiela.co.uk/community/detail/<?php echo $pop->id; ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on LinkedIn" class="fab fa-linkedin post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="whatsapp" onClick="sharePost(<?php echo $pop->id; ?>)" target="_blank" href="https://api.whatsapp.com/send?text=https://spiela.co.uk/community/detail/<?php echo $pop->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on WhatsApp" class="fab fa-whatsapp post-comment-feature-home ml-3"></i></a>
		                              
	                                        <i class="fas fa-share-alt post-comment-feature-home ml-3"></i>
	                                        <span class="post-features-text ml-2"> <?php echo $pop->shared; ?> </span>

	                                        <i class="far fa-dot-circle post-comment-feature-home ml-3"></i>
	                                        <span class="post-features-text ml-2"> <?php echo $pop->viewed; ?> </span>

		                                	</div>

		                                </div>
            
            		                  <div class="col-md-4 home-auth-right">
	                                		<div class="home-cmt-user" style="text-align: right;">
											<a href="<?php echo site_url('link/view/'.$pop->posted_by); ?>"><img src="https://spiela.co.uk/uploads/profile/<?php echo $cprof_img->profile_image; ?>" style="width: 70px; height: 70px;" alt="Author" class="rounded-circle mr-2 cmt-img"></a>
													<div>
														<h5 class="mb-0 pb-0 h6 font-weight-semibold" style=""><a class="auth-name" href="<?php echo site_url('link/view/'.$pop->posted_by); ?>"><?php echo $pop->posted_by; ?></a></h5>
														<small class="text-muted mb-0 font-weight-normal"><?php echo date('j M Y', strtotime($pop->created_date)); ?></small>
													</div>
											</div>
                                		</div>
            
            									</div>
            
            								</div>
            							</div>
            							<br>
            							<?php } }else{ echo ''; } ?>
            							
            							<?php echo $this->pagination->create_links(); ?>
            							
								    </div>
											
										
											<div class="tab-content clearfix" id="tabs-13">
												<!-- Verified Start -->
													
							            <?php if(!empty($verified)){ foreach($verified as $ver){ ?>
                                        <?php 
                                            $profile_image = $this->Data_model->display_community_post_profile_image($ver->id);
                                            foreach($profile_image as $cprof_img){}
                                            ?>
                                        <script>
                                            var title = "<?php echo str_replace('-', ' ', $ver->title); ?>";
                                            var post_id = "<?php echo $ver->id; ?>";
                                            var banner = "<?php echo $ver->banner; ?>";
                                        </script>
                                        
							            <div class="row cnt ml-0 mr-0" style="margin-top: 0px;">
            								<div class="d-flex auth-mb">
            									<div class="col-md-5 col-lg-5 pl-0 article-img">
            										<img src="https://spiela.co.uk/uploads/community/<?php echo $ver->banner; ?>" style="" class="mr-2">
            									</div>
            									
            									<div class="col-md-7 col-lg-7">
            										<h3 class="home-article-title pb-0">
            										<a href="<?php echo site_url('community/detail/'.$ver->id); ?>"><?php echo character_limiter(str_replace('-', ' ', $ver->title), 50); ?></a>
            										</h3>
            							<div class="col-6 col-lg-12 col-md-12" style="margin-top: 48px;"><span class="verified-btn ml-0 mt-4">Spiela verified</span></div>
            										
            							<div class="col-md-12 text-center home-arrow">
        									<div class="post-rating-wrap11">
        	                                    <i onclick="upVote(<?php echo $ver->id; ?>)" class="fas fa-arrow-up post-rating"></i>
        	                                    <div class="post-rating-count"><?php echo $ver->voting; ?></div>
        	                                    <i onclick="downVote(<?php echo $ver->id; ?>)" class="fas fa-arrow-down post-rating"></i>
        	                            	</div>
										</div>
										
										<p id="vti"></p>
                                        <p id="vtd"></p>
            										
            							<div class="col-md-8 home-social-left" style="">

											<div class="d-flex post-badge-icons-home mt-3 ml-4 ml-md-0">
		                                    <i class="fas fa-award icon-cert icon-cert-badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="If you feel that these posts are brave and bold" onClick="addBadge(<?php echo $ver->id; ?>,'brave')"> <span class="count" id='brave_count_<?php echo $ver->id; ?>'> <?php echo $ver->brave; ?> </span></i>
		                                    
		                                    <i class="fas fa-hand-paper icon-cert icon-cert-raise-hand" data-toggle="tooltip" data-placement="top" title="" data-original-title="150 of these push you to trending page" onClick="addBadge(<?php echo $ver->id; ?>,'trending')">  <span class="count" id='trending_count_<?php echo $ver->id; ?>'> <?php echo $ver->trending; ?> </span></i>
		                                    
		                                    <i class="fas fa-hand-peace icon-cert icon-cert-peace" data-toggle="tooltip" data-placement="top" title="" data-original-title="Posts that bring the community together" onClick="addBadge(<?php echo $ver->id; ?>,'together')">  <span class="count" id='together_count_<?php echo $ver->id; ?>'> <?php echo $ver->together; ?> </span></i>
		                                    
		                                    <i class="fas fa-crown icon-cert icon-cert-crown" data-toggle="tooltip" data-placement="top" title="" data-original-title=" High ranking post (300 of them gets it featured on newsletter)" onClick="addBadge(<?php echo $ver->id; ?>,'featured')"> <span class="count" id='featured_count_<?php echo $ver->id; ?>'> <?php echo $ver->featured; ?> </span></i>
		                                    
		                                    <i class="fas fa-trophy icon-cert icon-cert-peace" data-toggle="tooltip" data-placement="top" title="" data-original-title="Honourable mention posts" onClick="addBadge(<?php echo $ver->id; ?>,'honourable')"> <span class="count" id='honourable_count_<?php echo $ver->id; ?>'> <?php echo $ver->honourable; ?> </span></i>
	                                		</div>
	                                	<?php
                  							$sequel = $this->db->query("SELECT COUNT(*) AS total_count FROM community_review WHERE community_id = '$ver->id' ")->result();
                  							foreach($sequel as $sql){
                  								$total_count = $sql->total_count;
                  							}
                  							?>
		                                	<div class="d-flex mb-3 mb-md-0">
		                                        <i class="fas fa-comments post-comment-feature-home ml-3"></i>
		                                        <span class="post-features-text ml-2"> <?php echo $total_count; ?> </span>
		                                        
		                              <a class="facebook" onClick="sharePost(<?php echo $ver->id; ?>)" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fspiela.co.uk%2Fcommunity%2Fdetail%2F<?php echo $ver->id; ?>&amp;src=sdkpreparse"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Facebook" class="fab fa-facebook-f post-comment-feature-home ml-3"></i></a> 
		                              
		                              <a class="twitter" onClick="sharePost(<?php echo $ver->id; ?>)" target="_blank" href="https://twitter.com/intent/tweet?url=https://spiela.co.uk/community/detail/<?php echo $ver->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Twitter" class="fab fa-twitter post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="linkedin" onClick="sharePost(<?php echo $ver->id; ?>)" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://spiela.co.uk/community/detail/<?php echo $ver->id; ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on LinkedIn" class="fab fa-linkedin post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="whatsapp" onClick="sharePost(<?php echo $ver->id; ?>)" target="_blank" href="https://api.whatsapp.com/send?text=https://spiela.co.uk/community/detail/<?php echo $ver->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on WhatsApp" class="fab fa-whatsapp post-comment-feature-home ml-3"></i></a>
		                              
	                                        <i class="fas fa-share-alt post-comment-feature-home ml-3"></i>
	                                        <span class="post-features-text ml-2"> <?php echo $ver->shared; ?> </span>

	                                        <i class="far fa-dot-circle post-comment-feature-home ml-3"></i>
	                                        <span class="post-features-text ml-2"> <?php echo $ver->viewed; ?> </span>

		                                	</div>

		                                </div>
            
            		                  <div class="col-md-4 home-auth-right">
	                                		<div class="home-cmt-user" style="text-align: right;">
											<a href="<?php echo site_url('link/view/'.$ver->posted_by); ?>"><img src="https://spiela.co.uk/uploads/profile/<?php echo $cprof_img->profile_image; ?>" style="width: 70px; height: 70px;" alt="Author" class="rounded-circle mr-2 cmt-img"></a>
													<div>
														<h5 class="mb-0 pb-0 h6 font-weight-semibold" style=""><a class="auth-name" href="<?php echo site_url('link/view/'.$ver->posted_by); ?>"><?php echo $ver->posted_by; ?></a></h5>
														<small class="text-muted mb-0 font-weight-normal"><?php echo date('j M Y', strtotime($ver->created_date)); ?></small>
													</div>
											</div>
                                		</div>
            
            									</div>
            
            								</div>
            							</div>
            							<br>
            							<?php } }else{ echo ''; } ?>
            							
            							<?php echo $this->pagination->create_links(); ?>
												
												<!-- Verified End -->
											</div>

										</div>
									</div>
									</div>

								</div>
								
							</div> <!-- Profile Tab Section End -->
						</div>
					</div>

						</div>

						<div class="col-md-12 col-lg-3">
							<div class="sidebar-section">
								<?php if(empty($this->session->userdata('login'))){ ?>
								<button type="button" class="btn btn-primary btn-lg create-post-btn" data-toggle="modal" data-target="#loginPopup">Create a post</button>
								<?php } ?>
								
								<div class="sidebar-community" style="height: 100px;">
										<h4 class="sidebar-heading">Spiela Verified</h4>
										<div class="entry col-12">
    										<div class="grid-inner row no-gutters">
    											<div class="col pl-2">
    												<div class="entry-title">
    													<h4>This is a short description</h4>
    												</div>
    											</div>
    										</div>
    									</div>
								</div>

								<div class="sidebar-community" style="height: 50px;">
										<h4 class="sidebar-heading">Upcoming Q&A</h4>
										<div class="qa-cnt"></div>
								</div>

    							<div class="sidebar-community">
    									<h4 class="sidebar-heading">Community Notice Board</h4>
    									<div class="posts-sm row col-mb-30" id="post-list-sidebar">
    									<?php $login = $this->session->userdata('login'); ?>
    									<?php if(!empty($event)){ foreach($event as $eve){ ?>
    									<div class="entry col-12">
    										<div class="grid-inner row no-gutters">
    											<div class="col-auto">
    												<div class="entry-image">
    													<a href="#"><img src="https://spiela.co.uk/uploads/profile/<?php echo $eve->slug_image; ?>" alt="Image"></a>
    												</div>
    											</div>
    											<div class="col pl-2">
    												<div class="entry-title">
    													<h4><a href="#"><?php echo $eve->title; ?></a></h4>
    													<a class="register" href="<?php echo $eve->social_url; ?>">Click here to register</a>
    												</div>
    												<div class="entry-meta">
    													<ul>
    														<li>Expires on: <?php echo date('j M Y', strtotime($eve->expiry_date)); ?></li>
    													</ul>
    												</div>
    											</div>
    										</div>
    									</div>
                                        <?php } }else{ echo ''; } ?>
    								    
    								    <?php if(!empty($this->session->userdata('login'))){ ?>
                                    <button id="add-your-event" class="btn add-your-event ml-4 mb-5"> Add your event</button>
                                        <?php } ?>
    									
    								</div>
								</div>
								
							</div>
						</div>
					</div>

				</div>

				</div>
			</div>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		

	</div><!-- #wrapper end -->
	
	<?php if(!$this->session->userdata('login')): ?>
    <!-- Modal -->
    <div id="loginPopup" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!--<h4 class="modal-title">Header</h4>-->
          </div>
          <div class="modal-body">
            <div class="spiela-container">
        <form action="<?php echo base_url('login'); ?>" method="POST">
        <div class="row p-zone-wrapper">
            <div class="col-12 text-center mt-5">
                <h2 class="spiela-title-heading"> Sign up </h2>
                <h5> Join the community in a matter of seconds!</h5>
            </div>
            
            <div class="col-12 col-md-12">
            
                <div class="form-input-wrapper cst mt-5 text-left position-relative">
                    <a href="<?php echo htmlspecialchars($fbAuthUrl); ?>" class="btn btn-primary btn-block" style="background: #3B5998;border-color: #3B5998"><i class="fab fa-facebook-square"></i> Continue with Facebook!</a>
                </div>
                
                <div class="form-input-wrapper cst mt-4 text-left position-relative">
                    <a href="<?php echo htmlspecialchars($googleAuthUrl); ?>" class="btn btn-primary btn-block" style="background: #DD4B39;border-color: #DD4B39"><i class="fab fa-google"></i> Continue with Google!</a>
                </div>
                
                <div class="form-input-wrapper cst mt-5 text-center position-relative">
                   - OR -
                </div>
    
                <div class="form-input-wrapper cst mt-5 text-left position-relative">
                    <input type="email" class="form-input" name="email" required placeholder="mymail@example.com">
                    <label>Email</label>
                </div>
    
                <div class="form-input-wrapper cst mt-5 text-left position-relative">
                    <input type="password" name="password" required class="form-input">
                    <label>Password</label>
                </div>
            
                <div class="form-input-wrapper cst mt-5 text-left position-relative text-center">
                    <button type="submit" name="login" class="btn show-more-button mr-4 mb-3"> Login</button>
                </div>
            
                <div class="col-md-12 text-center" style="margin-bottom:30px;">
                    <div class="mt-2">
                        Forgot Password? <a href="<?php echo site_url('forgot_password'); ?>"> Click here</a>
                    </div>
                </div>
                <div class="col-md-12 text-center" style="margin-bottom:30px;">
                    <div class="mt-2">
                        Create an account? <a href="<?php echo site_url('register'); ?>"> Register here</a>
                    </div>
                </div>
            
            </div>
    
            <!--<div class="row ml-5">
                <div class="col-10 ml-2 ml-md-5">
                    <p class="mt-3  ml-md-5">By agreeing to our terms and conditions you agree to send your info to Spiela
                        who agrees to use it according their privacy policy. We will also use it subject to our Data Policy,
                        including to auto-fill forms for ads.</p>
                </div>
            </div>-->
    
        </div>
        </form>
        
        <?php
        echo $this->session->flashdata('msg');
        echo $this->session->flashdata('msgError');
        ?>
    </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>
    <?php endif;?>
    
    <!-- MODAL START -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modalUser" aria-hidden="true" style="z-index:999999">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
               <div class="col-12 text-center mt-5">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h2 class="spiela-title-heading"> Site Cookies and Analytics </h2>
              </div>
            </div>
            <div class="modal-body">
                We use third party cookies to personalize content, ads and analyze site traffic.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Accept</button>
          </div>
        </div>
      </div>
    <!-- MODAL END-->
    
    <!-- MODAL START -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modalRegister" aria-hidden="true" style="z-index:999999">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
               <div class="col-12 text-center mt-5">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h2 class="spiela-title-heading"> Create your Account </h2>
              </div>
            </div>
            
           <form action="<?php echo base_url('login'); ?>" method="POST">
            <div class="modal-body">
                <div class="form-input-wrapper cst mt-5 text-left position-relative">
                    <a href="<?php echo htmlspecialchars($fbAuthUrl); ?>" class="btn btn-primary btn-block" style="background: #3B5998;border-color: #3B5998"><i class="fab fa-facebook-square"></i> Continue with Facebook!</a>
                </div>
                
                <div class="form-input-wrapper cst mt-4 text-left position-relative">
                    <a href="<?php echo htmlspecialchars($googleAuthUrl); ?>" class="btn btn-primary btn-block" style="background: #DD4B39;border-color: #DD4B39"><i class="fab fa-google"></i> Continue with Google!</a>
                </div>
                
                <div class="form-input-wrapper cst mt-5 text-center position-relative">
                   - OR -
                </div>
    
                <div class="form-input-wrapper cst mt-5 text-left position-relative">
                    <input type="email" class="form-input" name="email" required placeholder="mymail@example.com">
                    <label>Email</label>
                </div>
    
                <div class="form-input-wrapper cst mt-5 text-left position-relative">
                    <input type="password" name="password" required class="form-input">
                    <label>Password</label>
                </div>
            
                <div class="form-input-wrapper cst mt-5 text-left position-relative text-center">
                    <button type="submit" name="login" class="btn show-more-button mr-4 mb-3"> Login</button>
                </div>
            
                <div class="col-md-12 text-center" style="margin-bottom:30px;">
                    <div class="mt-2">
                        Forgot Password? <a href="<?php echo site_url('forgot_password'); ?>"> Click here</a>
                    </div>
                </div>
                <div class="col-md-12 text-center" style="margin-bottom:30px;">
                    <div class="mt-2">
                        Create an account? <a href="<?php echo site_url('register'); ?>"> Register here</a>
                    </div>
                </div>
             </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Accept</button>
          </div>
        </div>
      </div>
    <!-- MODAL END-->

	<!-- Go To Top
	============================================= -->
	<!--<div id="gotoTop" class="icon-angle-up"></div>-->

	<!-- JavaScripts
	============================================= -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?php echo base_url('js/plugins.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/jquery.mentiony.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?php echo base_url('js/functions.js'); ?>"></script>
	
	<script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
	
	<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 200
        });
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    let current_count = 0;
    $("#add-your-event").click(function() {
        if(current_count ===0) {
            $(this).before('' + '<form action="<?php echo base_url('community/add_event'); ?>" method="post">' +
                '<div class="col-11">' +
                    '<input type="text" name="title" class="form-input event-title-input mb-3 ml-3" placeholder="Event title" /> ' +
                    '<input type="text" name="url" class="form-input event-title-input mb-3 ml-3" placeholder="Event Url" /> ' + 
                    '<label>Expires on: </label><input type="date" name="expiry_date" class="form-input event-title-input mb-3 ml-3" placeholder="Event Expires On" />' +
                    '<div class="col-11">Is this event currently going on?</div>' +
                '<div class="row ml-1">'+
                    '<div class="col-6 mb-3 mt-2"><select class="form-control" name="social_type"> <option value="Facebook">Facebook</option> <option value="Instagram">Instagram</option> <option value="Skype"> Skype</option> <option value="TikTok">TikTok</option> <option value="Zoom"> Zoom</option></select></div>' +
                    '<div class="col-6 mb-3 mt-2"> <button class="btn save-event" name="btn_submit"> Save event</button></div>' +
                '</div>' + '</form>');
            current_count++;
        }
    });

    </script>

    <script>
    $(document).ready(function() {   
      if($.cookie("popup_1_2") == null){
         $('#modalUser').modal('show');
         $.cookie("popup_1_2", "2");
      }
    });
    </script>
    
    <script>
    $(document).ready(function() {   
      if($.cookie("popup_1_2") == null){
         $('#modalRegister').modal('show');
         $.cookie("popup_1_2", "2");
      }
    });
    </script>

    <script>
    var isLoggedIn = "<?php echo $this->session->userdata('uemail'); ?>";
    function upVote(id){
        if(isLoggedIn){
            var vot_id = id;
            $.post("<?php echo base_url('community/upVoting'); ?>", {"vot_id": vot_id}, function(data){
                var current_vote = $('#vote_count_'+id).html();
                var updated_vote = parseInt(current_vote) + 1
                $('#vote_count_'+id).html(updated_vote);
            });
        } else {
            alert("Please login to upvote this post.");
        }
      }
    
    function downVote(id){
      if(isLoggedIn) {
          var vot_id = id;
          $.post("<?php echo base_url('community/downVoting'); ?>", {"vot_id": vot_id}, function(data){
              var current_vote = $('#vote_count_'+id).html();
              var updated_vote = parseInt(current_vote) - 1
              $('#vote_count_'+id).html(updated_vote);
          });   
      } else {
          alert("Please login to downvote this post.");
      }
    }
    
    function addBadge(id,badge){
      if(isLoggedIn) {
          var vot_id = id;
          var badge = badge;
          $.post("<?php echo base_url('community/addBadge'); ?>", {"vot_id": vot_id,"badge": badge}, function(data){
              var current_vote = $('#'+badge+'_count_'+id).html();
              var updated_vote = parseInt(current_vote) + 1
              $('#'+badge+'_count_'+id).html(updated_vote);
          });   
      } else {
          alert("Please login to like this post");
      }
    }
    
    function sharePost(id){
        var id = id;
        $.post("<?php echo base_url('community/sharePost'); ?>", {"post_id": id}, function(data){
            var current_count = $('#shared_count_'+id).html();
            var updated_count = parseInt(current_count) + 1;
            $('#shared_count_'+id).html(updated_count); 
        });
    }
    
    $(document).on('click', '#socialShareDetailPage > .socialBox', function() {
        
      var self = $(this);
      var post_id = $(this).attr('id').replace("socialBox_","");
      var element = $('#socialBox_'+post_id+' #socialGallery a');
      
      var c = 0;
    
      if (self.hasClass('animate')) {
        return;
      }
    
      if (!self.hasClass('open')) {
        
        self.addClass('open');
    
        TweenMax.staggerTo(element, 0.3, {
            opacity: 1,
            visibility: 'visible'
          },
          0.075);
        TweenMax.staggerTo(element, 0.3, {
            top: -12,
            ease: Cubic.easeOut
          },
          0.075);
    
        TweenMax.staggerTo(element, 0.2, {
            top: 0,
            delay: 0.1,
            ease: Cubic.easeOut,
            onComplete: function() {
              c++;
              if (c >= element.length) {
                self.removeClass('animate');
              }
            }
          },
          0.075);
    
        self.addClass('animate');
    
      } else {
    
        TweenMax.staggerTo(element, 0.3, {
            opacity: 0,
            onComplete: function() {
              c++;
              if (c >= element.length) {
                self.removeClass('open animate');
                element.css('visibility', 'hidden');
              };
            }
          },
          0.075);
      }
    });
    
    function setMetaData(post_id,post_title,post_banner) {
        $('meta[name=url]').attr('content', 'https://spiela.co.uk/community/detail/'+post_id);
        $('meta[name=type]').attr('content', 'website');
        $('meta[name=title]').attr('content', post_title);
        $('meta[name=image]').attr('content', 'https://spiela.co.uk/uploads/community/'+post_banner);
    }
    
    function markMatch (text, term) {
      var match = text.toUpperCase().indexOf(term.toUpperCase());
      var $result = $('<span></span>');
      if (match < 0) {
        return $result.text(text);
      }
      $result.text(text.substring(0, match));
      var $match = $('<span class="select2-rendered__match"></span>');
      $match.text(text.substring(match, match + term.length));
      $result.append($match);
      $result.append(text.substring(match + term.length));
      return $result;
    }
    
    $('#search_query').select2({
        placeholder: "Search Spiela",
        templateResult: function (item) {
            if (item.loading) {
              return item.text;
            }
            var term = query.term || '';
            var $result = markMatch(item.text, term);
        
            return $result;
        },
        language: {
          searching: function (params) {
            query = params;
            return 'Searching…';
          }
        },
        ajax: {
            url: "<?php echo base_url('community/searhQuery')?>",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    query: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
              params.page = params.page || 1;
              return {
               results: data.items,
               pagination: {
               more: (params.page * 20) < data.total_count
              }
             };
            },
            cache: true
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    }).on('select2:select', function (val) {
        console.log(val.params.data)
        const data = val.params.data;
        const id = data['id'].split('_')[0];
        console.log(id);
        if (data['d_type'] === 'users') {
            window.location.href = "<?php echo base_url('link/view/')?>" + data['extra_data'];
        } else {
            window.location.href = "<?php echo base_url('community/detail/')?>" + id;
        }
    });
    
    function hashchanged(){
        if(location.hash.substr(1)!='') $('html,body').animate({ scrollTop: ($('#'+location.hash.substr(1)).position().top-200) }, 'slow');
    }
    $(window).on('hashchange', function(e){
        hashchanged();
    });
    hashchanged();
    </script>

</body>

</html>