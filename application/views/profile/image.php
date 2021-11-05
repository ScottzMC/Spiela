
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
    <link rel="stylesheet" href="<?php echo base_url('css/my-custom.css'); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
    <title>Profile Page|| Spiela </title>

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
				<div class="container clearfix">
					
					<form action="<?php echo base_url('profile/update_image'); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                    <div class="new-post-snippet">
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
                                <button class="post-post-button ml-3" type="submit" name="edit_image"> Post</button>
                            </div>
                        </div>
                    </div>
                    </form>

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
          <input type="hidden" name="review_id" id="m_hidden_review_id" value="">
          <input type="hidden" name="m_unique_id" id="m_hidden_unique_id" value="">
          <?php if(!empty($session_image)){ ?>
          <span> <img src="https://spiela.co.uk/uploads/profile/<?php echo $session_image; ?>" height="80" width="80" class="avatar"/> </span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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