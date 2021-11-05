<?php
    function convertToAgoFormat($timestamp){
		$diffBtwCurrentTimeAndTimeStamp = (time() - $timestamp);
		$periodsString = ["sec", "min","hr","day","week","month","year","decade"];
		$periodNumbers = ["60" , "60" , "24" , "7" , "4.35" , "12" , "10"];
		for(@@$iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodNumbers[$iterator]; $iterator++)
				@@$diffBtwCurrentTimeAndTimeStamp /= $periodNumbers[$iterator];
				$diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);

		if($diffBtwCurrentTimeAndTimeStamp != 1)  $periodsString[$iterator].="s";
				$output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]";
				echo "Posted " .$output. " ago";
    }
    
    foreach($detail as $det){}
    
    $view_query = $this->db->query("UPDATE community SET viewed = viewed +1 WHERE id = '$det->id' ");

    ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="" />

	<!-- Stylesheets
	============================================= -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/my-custom-other.css'); ?>" type="text/css">
    <link href="<?php echo base_url('css/jquery.mentiony.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('js/jquery.mentiony.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<?php foreach($detail as $det){} ?>
	<meta property="og:url"           content="https://spiela.co.uk/community/detail/<?php echo $det->id; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo str_replace('-', ' ', $det->title); ?>" />
    <!--<meta property="og:description"   content="<?php echo $det->meta; ?>" />-->
	<meta property="og:image"         content="https://spiela.co.uk/uploads/community/<?php echo $det->banner; ?>" />
	<?php if(!empty($detail)){ ?>
    <title><?php echo str_replace('-',' ',$det->title); ?> || Spiela </title>
    <?php }else{ ?>
    <title>Spiela </title>
    <?php } ?>
    
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
			<div class="content-wrap">
				<div class="container clearfix"  style="margin-top: -60px;">

					<!--<div class="col-md-12 pl-0">
					<a href="<?php echo site_url('community/view'); ?>" class="btn btn-primary btn-sm back-btn">Go back</a>
					</div>-->
            
					<div class="row cnt flex-column-reverse flex-md-row">
					    <?php if($det->verified == "Yes"){ ?>
					    <div class="col-12">
							<img src="<?php echo base_url('images/spiela-verified-ribbon.svg'); ?>" style="height: auto;" class="verified-ribbon">
						</div>
						<?php } ?>
						
                        <div class="col-md-4 pl-0 pr-0 col-lg-3 d-flex">
                        <?php if($this->Data_model->isVideo($det->banner)):?>
                            <video width="100%" controls autoplay>
                                <source src="<?php echo base_url('uploads/community/'.$det->banner); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video> 
                        <?php else:?>
							<img src="<?php echo base_url('uploads/community/'.$det->banner); ?>">
                        <?php endif;?>
						</div>
						<div style="" class="col-md-8 col-sm-12 col-lg-9">
						    <!--<div class="col-md-4 pl-0 pr-0 col-lg-3 d-flex">
							<img src="https://spiela.co.uk/uploads/community/<?php echo $det->banner; ?>">
						    </div>-->
							<h2 class="article-title" style="text-transform: uppercase;"><?php echo str_replace('-',' ',$det->title); ?></h2>
							<span class="sep"></span>
						
							<div class="row" style="">

								<div class="col-md-8 col-sm-6 col-9 article-auth-mb">

									<div class="article-icons">
		                                    <i class="fas fa-award icon-cert icon-cert-badge" data-toggle="tooltip" data-placement="top" title="" data-original-title="If you feel that these posts are brave and bold" onClick="addBadge(<?php echo $det->id; ?>,'brave')"> <span class="count" id='brave_count_<?php echo $det->id; ?>'> <?php echo $det->brave; ?> </span></i>
		                                    
		                                    <i class="fas fa-hand-paper icon-cert icon-cert-raise-hand" data-toggle="tooltip" data-placement="top" title="" data-original-title="150 of these push you to trending page" onClick="addBadge(<?php echo $det->id; ?>,'trending')">  <span class="count" id='trending_count_<?php echo $det->id; ?>'> <?php echo $det->trending; ?> </span></i>
		                                    
		                                    <i class="fas fa-hand-peace icon-cert icon-cert-peace" data-toggle="tooltip" data-placement="top" title="" data-original-title="Posts that bring the community together" onClick="addBadge(<?php echo $det->id; ?>,'together')">  <span class="count" id='together_count_<?php echo $det->id; ?>'> <?php echo $det->together; ?> </span></i>
		                                    
		                                    <i class="fas fa-crown icon-cert icon-cert-crown" data-toggle="tooltip" data-placement="top" title="" data-original-title=" High ranking post (300 of them gets it featured on newsletter)"onClick="addBadge(<?php echo $det->id; ?>,'featured')"> <span class="count" id='featured_count_<?php echo $det->id; ?>'> <?php echo $det->featured; ?> </span></i>
		                                    
		                                     <i class="fas fa-trophy icon-cert icon-cert-peace" data-toggle="tooltip" data-placement="top" title="" data-original-title="Honourable mention posts" onClick="addBadge(<?php echo $det->id; ?>,'honourable')"> <span class="count" id='honourable_count_<?php echo $det->id; ?>'> <?php echo $det->honourable; ?> </span></i>
		                                     
		                              <a class="facebook" onClick="sharePost(<?php echo $det->id; ?>)" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fspiela.co.uk%2Fcommunity%2Fdetail%2F<?php echo $det->id; ?>&amp;src=sdkpreparse"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Facebook" class="fab fa-facebook-f post-comment-feature-home ml-3"></i></a> 
		                              
		                              <a class="twitter" onClick="sharePost(<?php echo $det->id; ?>)" target="_blank" href="https://twitter.com/intent/tweet?url=https://spiela.co.uk/community/detail/<?php echo $det->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Twitter" class="fab fa-twitter post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="linkedin" onClick="sharePost(<?php echo $det->id; ?>)" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://spiela.co.uk/community/detail/<?php echo $det->id; ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on LinkedIn" class="fab fa-linkedin post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="whatsapp" onClick="sharePost(<?php echo $det->id; ?>)" target="_blank" href="https://api.whatsapp.com/send?text=https://spiela.co.uk/community/detail/<?php echo $det->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on WhatsApp" class="fab fa-whatsapp post-comment-feature-home ml-3"></i></a>
		                                    
		                            </div>
		                            
		                            <?php 
                                        $profile_image = $this->Data_model->display_community_post_profile_image($det->id);
                                        foreach($profile_image as $prof_img){}
                                        ?>
                		            
                		            <?php if(!empty($profile_image)){ ?>                 
		                            <div class="d-flex align-items-center">
											<img src="<?php echo base_url('uploads/profile/'.$prof_img->profile_image); ?>" alt="Author" class="rounded-circle mr-2 auth-img" style="height: 70px; width: 70px;">
											<div>
												<h5 class="mb-0 h6 font-weight-semibold pb-0"><a class="auth-name" href="#"><?php echo $det->posted_by; ?></a></h5>
												<small class="text-muted mb-0 font-weight-normal"><?php echo date('j M Y', strtotime($det->created_date)); ?></small>
											</div>
										<br>
									</div>
									<?php }else{ echo ''; } ?>

								</div>

								<div class="col-md-4 col-sm-6 col-3" style="margin-top: 150px;">
									<div class="col-md-3 text-center">
										<div class="post-rating-wrap">
			                              <i onclick="upVote(<?php echo $det->id; ?>)" class="fas fa-arrow-up post-rating"></i>
			                                    <div class="post-rating-count" id="vote_count"><?php echo $det->voting; ?></div>
			                                    <i onclick="downVote(<?php echo $det->id; ?>)" class="fas fa-arrow-down post-rating"></i>
			                            </div>
									</div>
								</div> 
								

								<?php
                			    $session_slug = $this->session->userdata('uslug');
                			    $query = $this->db->query("SELECT posted_by FROM community WHERE id = '$det->id' ")->result();
                			    foreach($query as $qry){
                			        $query_slug = $qry->posted_by;
                			    } ?>

							</div>
							<br>
							
							<?php 
							
							if($query_slug == $session_slug){
                			    ?>
                                <div style="margin-bottom: 20px;">
                                    <a href="<?php echo site_url('community/edit_post/'.$det->id); ?>" style="background: #3C7267;color: #fff;padding: 10px 35px;border-radius: 20px;text-decoration:none;">Edit</a>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <button onclick="delete_post(<?php echo $det->id; ?>)" style="background: #3C7267;color: #fff;padding: 10px 35px;border-radius: 20px;text-decoration:none;">Delete</button>
                                </div>
                                <?php } ?>

						</div>
					</div>
						
					<div class="row cnt">
						
						<div class="col-md-12">
							<div class="article-content">

								<p><?php echo $det->body; ?> </p>
								
								<?php
          						$sequel = $this->db->query("SELECT COUNT(*) AS total_count FROM community_review WHERE community_id = '$det->id' ")->result();
          						foreach($sequel as $sql){
          							$total_count = $sql->total_count;
          						}
          						?>

								<div class="social-share">
	                            	
                                    <h4>Share on Social Media</h4>
                                    <a class="facebook" onClick="sharePost(<?php echo $det->id; ?>)" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fspiela.co.uk%2Fcommunity%2Fdetail%2F<?php echo $det->id; ?>&amp;src=sdkpreparse"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Facebook" class="fab fa-facebook-f post-comment-feature-home ml-3"></i></a> 
		                              
		                              <a class="twitter" onClick="sharePost(<?php echo $det->id; ?>)" target="_blank" href="https://twitter.com/intent/tweet?url=https://spiela.co.uk/community/detail/<?php echo $det->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on Twitter" class="fab fa-twitter post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="linkedin" onClick="sharePost(<?php echo $det->id; ?>)" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=https://spiela.co.uk/community/detail/<?php echo $det->id; ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on LinkedIn" class="fab fa-linkedin post-comment-feature-home ml-3"></i></a>
		                              
		                              <a class="whatsapp" onClick="sharePost(<?php echo $det->id; ?>)" target="_blank" href="https://api.whatsapp.com/send?text=https://spiela.co.uk/community/detail/<?php echo $det->id;?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title=" Share on WhatsApp" class="fab fa-whatsapp post-comment-feature-home ml-3"></i></a>	                            	
								</div>
								
								<?php if(!empty($this->session->userdata('login')) && $det->applied == "yes" && !empty($det->applied_url)){ ?>
                                <div style="margin-bottom: 20px; margin-left: 150px;">
                                    <a href="<?php echo $det->applied_url; ?>" style="background: #FF9201;color: #fff;padding: 10px 35px;border-radius: 20px;text-decoration:none;">Apply</a>
                                </div>
                                <?php }else{ ?>
                                <?php echo ''; ?>
                                <?php } ?>
                                
                                <?php if(empty($this->session->userdata('login'))  && $det->applied == "yes" && !empty($det->applied_url)){ ?>
                                    <button type="submit" name="write_post" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#loginPopup" style="margin-left: 50px; background:#FF9201; border-color:#ff9201; font-size:17px; font-weight:bold;">+  Apply</button>
                                <?php } ?>

							</div>


						</div>

					</div>
					
					<?php
                      $session_firstname = $this->session->userdata('ufirstname');
                      $session_lastname = $this->session->userdata('ulastname');
                      $session_email = $this->session->userdata('uemail');
                      $session_image = $this->session->userdata('uimage');
                      $session_email = $this->session->userdata('uemail');
                      ?>
					
                    <div class="row comment-area">
						<div class="col-md-12 col-lg-8">
							<?php if(!empty($session_email)){ ?>
							<form class="cmt-form" action="<?php echo base_url("community/detail/".$det->id); ?>" method="post">
							    <input type="hidden" name="profile_image" value="<?php echo $session_image; ?>">
                                  <input type="hidden" name="firstname" value="<?php echo $session_firstname; ?>">
                                  <input type="hidden" name="lastname" value="<?php echo $session_lastname; ?>">
                                  <input type="hidden" name="email" value="<?php echo $session_email; ?>">
                                  
								<textarea type="text" name="message" class="form-control cmt-box" style="color: #000;" value="" placeholder="Write a comment" id="post_m_comment"></textarea>
								<div class="col-4 col-md-2 mt-3">
                                        <button class="btn post-comment-button" type="submit" style="background: green; color: white;" name="submit"> POST</button>
                                    </div>
							</form>
							<?php }else{ ?>
                                <div class="row">
                                        <div class="col-8 text-center mx-auto mb-3">
                                            <div class="row mb-3 mt-3">
                                                <div class="alert alert-info">
                                                    Please login to drop a comment for this post. <a href="<?php echo site_url('login'); ?>"> Click here</a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            <?php } ?>
							
							<?php if(!empty($review)){ foreach($review as $rev){ ?>
                            <?php 
                            $profile_image = $this->Data_model->display_community_review_profile_image($rev->community_id, $rev->email);
                            foreach($profile_image as $prof_img){}
                            ?>
							<div class="comment-section">
								<div class="d-flex align-items-center cmt-user">
                                    <?php if(!empty($rev->user_image)){ ?>
                                    <div class="col-6 col-md-2"><img class="large-xl-sized-avatar"
                                             src="<?php echo base_url('uploads/review/'.$rev->user_image); ?>"/>
                                    </div>
                                    <?php } elseif(!empty($profile_image)){ ?>
                                    <div class="col-6 col-md-2"><img class="large-xl-sized-avatar"
                                             src="<?php echo base_url('uploads/profile/'.$prof_img->profile_image); ?>"/>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="col-6 col-md-2"><img class="large-xl-sized-avatar"
                                             src="<?php echo base_url('uploads/profile/original.jpg'); ?>"/>
                                    </div>
                                    <?php } ?>
									<?php /*if(!empty($profile_image)){ ?>
									<img src="https://spiela.co.uk/uploads/profile/<?php echo $prof_img->profile_image; ?>" alt="Author" class="rounded-circle mr-2 cmt-img" style="height: 70px; width: 70px;">
									<?php }else{ ?>
									<img src="https://spiela.co.uk/uploads/profile/original.jpg" alt="Author" class="rounded-circle mr-2 cmt-img">
									<?php }*/ ?>
									<div>
										<h5 class="mb-0 h6 font-weight-semibold"><a class="auth-name" href="#"><?php echo $rev->firstname; ?></a></h5>
									</div>
									<small class="text-muted mb-0 font-weight-normal"><?php echo convertToAgoFormat($rev->created_time); ?><div></div></small>
								</div>
								 <p class="first-cmt"><?php echo $rev->message; ?></p>
								 <button type="button" class="btn btn-secondary reply-btn" data-toggle="modal" data-target="#myModal" data-review-id="<?php echo $rev->id;?>" 
                                data-unique-string="<?php echo $rev->unique_id;?>">Reply</button>
							</div>
                            
                            <?php 
                            $reply = $this->db->query("SELECT * FROM community_reply WHERE review_id = '$rev->community_id' AND unique_id = '$rev->unique_id' ")->result();
                            if(!empty($reply)){ foreach($reply as $rep){} }else{echo ''; }
                            if(!empty($profile_image) && !empty($reply)){
                              //$profile_image = $this->Data_model->display_community_reply_profile_image($rev->id, $rep->reply_email); 
                              
                              $reply_profile_image = $this->db->query("SELECT profile_image FROM users WHERE email = '$rep->email' ");
                              
                            foreach($reply_profile_image as $rep_prof_img){}  
                            }
                            
                            ?>
                            <?php if(!empty($reply)){ foreach($reply as $rep){ ?>
							<div class="reply-section">
								<div class="reply-cmt">
									<div class="d-flex align-items-center cmt-user">
										<?php if(!empty($reply_profile_image)){ ?>
									<img src="<?php echo base_url('uploads/profile/'.$rep->profile_image); ?>" alt="Author" class="rounded-circle mr-2 cmt-img" style="height: 70px; width: 70px;">
									<?php }else{ ?>
									<img src="<?php echo base_url('uploads/profile/original.jpg');?>" alt="Author" class="rounded-circle mr-2 cmt-img">
									<?php } ?>
											<div>
												<h5 class="mb-0 h6 font-weight-semibold"><a class="auth-name" href="#"><?php echo $rep->reply_firstname; ?> <?php echo $rep->reply_lastname; ?> </a></h5>
											</div>
										<small class="text-muted mb-0 font-weight-normal"><?php echo convertToAgoFormat($rep->created_time); ?><div></div></small>
									</div>
								 	<p class="comment"><?php echo $rep->message; ?> </p>
								</div>
							</div>
                            <?php } }else{ echo ''; } ?>
                        
                        <?php } }else{ echo ''; } ?>
						</div>
					</div>

				</div>
			</div>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->

	</div><!-- #wrapper end -->
	
	<!-- Reply -->
	
	<div class="modal" id="myModal">
     <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reply to User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url("community/reply/".$det->id); ?>" method="POST">
          <?php
          $session_firstname = $this->session->userdata('ufirstname');
          $session_lastname = $this->session->userdata('ulastname');
          $session_email = $this->session->userdata('uemail');
          $session_image = $this->session->userdata('uimage');
          ?>
          <input type="hidden" name="reply_firstname" value="<?php echo $session_firstname; ?>">
          <input type="hidden" name="reply_lastname" value="<?php echo $session_lastname; ?>">
          <input type="hidden" name="reply_email" value="<?php echo $session_email; ?>">
          <input type="hidden" name="profile_image" value="<?php echo $session_image; ?>"
          <input type="hidden" name="review_id" value="<?php echo $rev->id; ?>">
          <!--<input type="hidden" name="review_id" id="m_hidden_review_id" value="<?php echo $rev->id; ?>">-->
          <input type="hidden" name="unique_id" value="<?php echo $rev->unique_id; ?>">
          <!--<input type="hidden" name="m_unique_id" id="m_hidden_unique_id" value="">-->
          <?php if(!empty($session_image)){ ?>
          <span> <img src="<?php echo base_url('uploads/profile/'.$session_image); ?>" height="80" width="80" class="avatar"/> </span>
          <?php } ?>

          <span><textarea name="reply_message" class="form-control cmt-box"> </textarea> </span>
          <span class="help-block">
            <strong style="color: red;"><?php echo form_error('reply_message'); ?></strong>
          </span>
          <br>
        <button type="submit" name="submit_reply" class="btn btn-primary" style="background: green; color: white;"> Reply Comment</button>

        </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </div>
       </div>
      </div>
	
	<!-- End of Reply --> 
	
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

	<!-- Go To Top
	============================================= -->
	<!--<div id="gotoTop" class="icon-angle-up"></div>-->

	<!-- JavaScripts
	============================================= -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?php echo base_url('js/functions.js'); ?>"></script>
  <script src="<?php echo base_url('js/jquery.mentiony.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 200
        });
    });
    
    var isLoggedIn = "<?php echo $this->session->userdata('uemail'); ?>";
    function upVote(id) {
        if(isLoggedIn){
            var vot_id = id;
            $.post("<?php echo base_url('community/upVoting'); ?>", {"vot_id": vot_id}, function(data){
                var currnet_vote = $('#vote_count').html();
                var updated_vote = parseInt(currnet_vote) + 1;
                $('#vote_count').html(updated_vote);
            });   
        } else {
            alert("Please login to upvote this post.");
        }
    }
    
    function downVote(id) {
        if(isLoggedIn){
            var vot_id = id;
            $.post("<?php echo base_url('community/downVoting'); ?>", {"vot_id": vot_id}, function(data){
                var currnet_vote = $('#vote_count').html();
                var updated_vote = parseInt(currnet_vote) - 1;
                $('#vote_count').html(updated_vote);
            });   
        } else {
            alert("Please login to downvote this post.");
        }
    }
    
    function addBadge(id,badge){
        if(isLoggedIn){
            var vot_id = id;
            var badge = badge;
            $.post("<?php echo base_url('community/addBadge'); ?>", {"vot_id": vot_id,"badge": badge}, function(data){
                var currnet_vote = $('#'+badge+'_count').html();
                var updated_vote = parseInt(currnet_vote) + 1;
                $('#'+badge+'_count').html(updated_vote);
            });     
        } else {
            alert("Please login to like this post");
        }
    }
    
    function sharePost(id){
        var id = id;
        $.post("<?php echo base_url('community/sharePost'); ?>", {"post_id": id}, function(data){
            var current_count = $('#shared_count').html();
            var updated_count = parseInt(current_count) + 1;
            $('#shared_count').html(updated_count); 
        });
    }
    
    $(document).on('click', '#socialShareDetailPage > .socialBox', function() {
    
      var self = $(this);
      var element = $('#socialGallery a');
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
</script>
<script>
function delete_post(id){
              var del_id = id;
              if(confirm("Are you sure you want to delete this post")){
              $.post("<?php echo base_url('community/delete_post'); ?>",
                   {"del_id": del_id}, function(data){
                    alert('Deleted');
                    location.href="<?php echo base_url('community/view');?>";
                });
              }
            }
            
$(document).ready(function() {
   $(".m_reply_button").on('click', function() {
       var review = $(this).attr('data-review-id');
       var unique = $(this).attr('data-unique-string');
       $("#m_hidden_review_id").val(review);
       $("#m_hidden_unique_id").val(unique);
   });
   $('#post_m_comment').mentiony({
		onDataRequest: function (mode, keyword, onDataRequestCompleteCallback) {
			$.ajax({
				method: "GET",
				url: "<?php echo base_url('community/getUsersData')?>"+ '/' +keyword,
				dataType: "json",
				success: function (response) {
					var data = response;


					data = jQuery.grep(data, function( item ) {
						return item.name.toLowerCase().indexOf(keyword.toLowerCase()) > -1;
					});
					if(data.length < 8) {
					    $('.mentiony-container .mentiony-popover').css('overflow', 'hidden');
					} else {
					    $('.mentiony-container .mentiony-popover').css('overflow', 'scroll');
					}

					onDataRequestCompleteCallback.call(this, data);
				}
			});
		}
	});
});
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
</script>

</body>

</html>