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
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Mail </title>

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
                        
                    <div class="row cnt">
                        
                        <div class="col-md-12">
                            <div class="article-content">
                                <?php echo $session_slug = $this->session->userdata('uslug'); ?>
                                <p>Hello community member, <?php echo $session_slug; ?> 
                                check it out - <a href="https://spiela.co.uk/community/view">View</a></p>

                            </div>

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
                    location.href="https://spiela.co.uk/community/view";
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