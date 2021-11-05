<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/account.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/my-custom.css'); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
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

</style>


	<!-- Document Title
	============================================= -->
	<title>Create an Account || Spiela</title>

</head>

<body>

	<!-- Document Wrapper
	============================================= -->

		<!-- Header
		============================================= -->
		<?php include 'menu/nav.php'; ?>

		<!-- Content
		============================================= -->
			
			<div class="spiela-container">
                <div class="login-wrap centered">
                        <div id="normal-header">
                            <h3 class="text-center font-weight-bold"> Create a Spiela Account</h3>
                            <h5 class="text-center"> Where Opportunities and Communities Meet</h5>
                        </div>
            
                <form action="<?php echo base_url('register/test_register'); ?>" method="POST">
                          <div>
                              <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" class="form-control" placeholder="First name..." name="firstname"> 
                              </div>
                              
                              <div class="form-group">
                                <label for="first-name">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last name..." name="lastname"> 
                              </div>
                              
                              <div class="form-group">
                                <label for="first-name">Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address..." name="email"> 
                              </div>
                              
                              <div class="form-group">
                                <label for="first-name">Password</label>
                                <input type="password" class="form-control" placeholder="Password..." name="password">
                              </div>
                              
                              <div class="form-group">
                                <label for="first-name">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Password..." name="cpassword">
                              </div>
                              
                          </div>  
                          
                          <div>
                              <div class="form-group">
                                <label for="select-country"> Select Location</label>
                                <select class="form-control" name="location">
                                    <option value="select-country"> Select Location</option>
                                    <option> England</option>
                                    <option> Portugal (Coming Soon)</option>
                                    <option> United Kingdom</option>
                                    <option> United States</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="date-birth">Date of Birth </label>
                                <input type="date" class="form-control" name="date_of_birth" placeholder="dd/mm/yy"/>
                              </div>
                              
                              <div class="form-group">
                                <label for="gender"> Select Gender</label>
                                <select class="form-control" name="gender">
                                    <option>Select Gender </option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="ethnicity"> Select Ethnicity</label>
                                <select type="email" class="form-control" name="ethnicity">
                                    <option value="ethnicity"> Ethnicity</option>
                                    <option value="White European">White European</option>
                					<option value="Black African">Black African</option>
                					<option value="Black Carribean">Black Carribean</option>
                					<option value="Mixed Heritage">mixed heritage</option>
                					<option value="Other">Other</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="role"> Select Role</label>
                                <select class="form-control" name="role">
                                    <option>Select </option>
                                    <option value="user"> User </option>
                                    <option value="partner"> Partner </option>
                                </select>
                              </div>
                              
                          </div>
                          
                          <div>
                              <div class="form-group">
                                <label for="employment-status"> Select Employment Status</label>
                                <select class="form-control" name="employment">
                                    <option value="employment-status"> Employment Status</option>
                                    <option> Student</option>
                                    <option> Employed</option>
                                    <option> Entrepreneur</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="job-industry">Job Industry</label>
                                <input type="text" class="form-control" name="job_industry" placeholder="Job Industry"/>
                              </div>
                              
                              <div class="form-group">
                                <label for="ethnicity">How did you hear about us?</label>
                                <select class="form-control" name="hear_us">
                                    <option> Instagram</option>
                                    <option> LinkedIn</option>
                                    <option> Facebook</option>
                                    <option> Twitter</option>
                                    <option> WhatsApp</option>
                                    <option> Word of Mouth</option>
                                    <option> Google</option>
                                    <option> Other</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <label for="ethnicity">What are you looking for?</label>
                                <select class="form-control" name="user_looking">
                                    <option> Networking</option>
                                    <option> Promote yourself</option>
                                    <option> Share ideas</option>
                                    <option> Learn from others</option>
                                    <option> Experiences</option>
                                    <option> All of the above</option>
                                </select>
                              </div>
                              
                              <button type="submit" class="btn post-post-button" name="register">Sign me up!</button>
                              
                              <div class="col-md-6 form-input-wrapper cst mt-5 text-left position-relative" style="width: 250px; margin-left: -30px;">
                                <a href="<?php echo htmlspecialchars($fbAuthUrl); ?>" class="btn btn-primary btn-block" style="background: #3B5998;border-color: #3B5998"><i class="fab fa-facebook-square"></i> Continue with Facebook!</a>
                            </div>
                            <div class="col-md-6 form-input-wrapper cst mt-4 text-left position-relative" style="width: 250px; margin-left: -30px;">
                                <a href="<?php echo htmlspecialchars($googleAuthUrl); ?>" class="btn btn-primary btn-block" style="background: #DD4B39;border-color: #DD4B39"><i class="fab fa-google"></i> Continue with Google!</a>
                            </div>
                              
                          </div>  

                </form>
                
            </div>
        </div>    
            
			
		<!-- Footer
		============================================= -->

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
    let current_step = 1;

    $("#next-button").click(() => {
        if(current_step <= 2){
            $("#step-" + current_step).hide();
            $("#step-" + (current_step+1)).show();
        }
        else {
            $("#step-" + current_step).hide();
            $("#step-" + (current_step+1)).show();
            $("#normal-header").hide();
            $("#next-button").hide();
            $("#register").show();
            $("#add-own-container").show();
        }
        current_step++;
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