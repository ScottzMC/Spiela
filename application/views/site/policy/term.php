<!doctype html>
<html class="no-js" lang="" dir="ltr">
<head>
	<title>Terms of Website Use</title>
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="icon" href="" type="image/x-icon">
	<link href="<?php echo base_url('css/app.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/normalize-min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/scrollbar-min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/fontawesome/fontawesome-all.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/themify-icons.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/jquery-ui-min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/linearicons.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/main.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/custom.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/responsive.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/rtl.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/color.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/transitions.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/prettyPhoto-min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/owl.carousel.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/prettyPhoto-min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/owl.carousel.min.css'); ?>" rel="stylesheet">
</head>

<body class="wt-login  ltr">

	<!-- Preloader Start -->
	<div class="preloader-outer">
		<div class="preloader-holder">
			<div class="loader"></div>
		</div>
	</div>
	<!-- Wrapper Start -->
	<div id="wt-wrapper" class="wt-wrapper wt-haslayout">
		<!-- Content Wrapper Start -->
		<div class="wt-contentwrapper">

			<!-- Header Start -->

			<?php include('menu/nav.php'); ?>

			  <!--Header End-->

			<!--Main Start-->

          <main id="wt-main" class="wt-main wt-innerbgcolor wt-haslayout wt-innerbgcolor">
            <div class="wt-haslayout wt-innerbannerholder" style="background-image:url(<?php echo base_url('images/bannerimg/img-02.jpg'); ?>)">
              <div class="container">
                <div class="row justify-content-md-center">
                  <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-innerbannercontent">
                      <div class="wt-title">
                        <h2>Terms of Website Use</h2>
                      </div>
                      <ol class="wt-breadcrumb">
                        <li><a href="<?php echo site_url('site/home'); ?>">Home</a></li>
                        <li class="active">Terms of Website Use</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="wt-contentwrappers">
              <div class="container">
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                    <div class="wt-howitwork-hold wt-haslayout">
                      <div class="wt-haslayout wt-main-section">
                        <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                          <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                            <div class="wt-submitreportholder wt-bgwhite">
                              <?php if(!empty($term)){ foreach($term as $tm){} ?>
                              <div class="wt-titlebar">
                                <h2><?php echo $tm->title; ?></h2>
                              </div>
                              <div class="wt-reportdescription">
                                <div class="wt-description">
                                  <p><?php echo $tm->body; ?></p>
                                </div>
                              </div>
                            <?php }else{ echo ''; } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                      </div>
                  </div>
              </div>
          </main>

			<!--Main End-->

      <!--Footer Start-->

			<?php include('menu/footer.php'); ?>

			  <!--Footer End-->

		</div>
		<!--Content Wrapper End-->
	</div>
	<!--Wrapper End-->
	
	<script src="<?php echo base_url('js/jquery-3.3.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/tinymce/tinymce.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/app.js'); ?>"></script>
        <script src="<?php echo base_url('js/vendor/jquery-library.js'); ?>"></script>
        <script src="<?php echo base_url('js/scrollbar.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/jquery-ui-min.js'); ?>"></script>
        <script src="<?php echo base_url('js/tilt.jquery.js'); ?>"></script>
        <script src="<?php echo base_url('js/prettyPhoto-min.js'); ?>"></script>
        <script src="<?php echo base_url('js/owl.carousel.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/readmore.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/countTo.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/appear.js;'); ?>'"></script>
				<script>
				var popupMeta = {
				    width: 400,
				    height: 400
				}
				$(document).on('click', '.social-share', function(event){
				    event.preventDefault();

				    var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
				        hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

				    var url = $(this).attr('href');
				    var popup = window.open(url, 'Social Share',
				        'width='+popupMeta.width+',height='+popupMeta.height+
				        ',left='+vPosition+',top='+hPosition+
				        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

				    if (popup) {
				        popup.focus();
				        return false;
				    }
				})
				</script>
				<script>
				    var popupMeta = {
				        width: 400,
				        height: 400
				    }
				    $(document).on('click', '.social-share', function(event){
				        event.preventDefault();

				        var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
				            hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

				        var url = $(this).attr('href');
				        var popup = window.open(url, 'Social Share',
				            'width='+popupMeta.width+',height='+popupMeta.height+
				            ',left='+vPosition+',top='+hPosition+
				            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

				        if (popup) {
				            popup.focus();
				            return false;
				        }
				    })
				</script>
				<script>
				    jQuery("a[data-rel]").each(function () {
				    jQuery(this).attr("rel", jQuery(this).data("rel"));
				  });
				  jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
				    animation_speed: 'normal',
				    theme: 'dark_square',
				    slideshow: 3000,
				    default_width: 800,
				        default_height: 500,
				        allowfullscreen: true,
				    autoplay_slideshow: false,
				    social_tools: false,
				    iframe_markup: "<iframe src='{path}' width='{width}' height='{height}' frameborder='no' allowfullscreen='true'></iframe>",
				    deeplinking: false
				    });
				    var _wt_freelancerslider = jQuery('.wt-freelancerslider')
				        _wt_freelancerslider.owlCarousel({
				            items: 1,
				            loop:true,
				            nav:true,
				            margin: 0,
				            autoplay:false,
				            navClass: ['wt-prev', 'wt-next'],
				            navContainerClass: 'wt-search-slider-nav',
				            navText: ['<span class="lnr lnr-chevron-left"></span>', '<span class="lnr lnr-chevron-right"></span>'],
				        });
				    </script>
				    <script>
				        /* FREELANCERS SLIDER */
				        var _wt_freelancerslider = jQuery('.wt-freelancerslider')
				        _wt_freelancerslider.owlCarousel({
				            items: 1,
				            loop:true,
				            nav:true,
				            margin: 0,
				            autoplay:false,
				            navClass: ['wt-prev', 'wt-next'],
				            navContainerClass: 'wt-search-slider-nav',
				            navText: ['<span class="lnr lnr-chevron-left"></span>', '<span class="lnr lnr-chevron-right"></span>'],
				        });

				        var _readmore = jQuery('.wt-userdetails .wt-description');
				        _readmore.readmore({
				            speed: 500,
				            collapsedHeight: 230,
				            moreLink: '<a class="wt-btntext" href="#">'+readmore_trans+'</a>',
				            lessLink: '<a class="wt-btntext" href="#">'+less_trans+'</a>',
				        });
				        $('#wt-ourskill').appear(function () {
				            jQuery('.wt-skillholder').each(function () {
				                jQuery(this).find('.wt-skillbar').animate({
				                    width: jQuery(this).attr('data-percent')
				                }, 2500);
				            });
				        });
				        var popupMeta = {
				            width: 400,
				            height: 400
				        }
				        $(document).on('click', '.social-share', function(event){
				            event.preventDefault();

				            var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
				                hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

				            var url = $(this).attr('href');
				            var popup = window.open(url, 'Social Share',
				                'width='+popupMeta.width+',height='+popupMeta.height+
				                ',left='+vPosition+',top='+hPosition+
				                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

				            if (popup) {
				                popup.focus();
				                return false;
				            }
				        });
				    </script>
				    <script>
				        jQuery("a[data-rel]").each(function () {
				    jQuery(this).attr("rel", jQuery(this).data("rel"));
				  });
				  jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
				    animation_speed: 'normal',
				    theme: 'dark_square',
				    slideshow: 3000,
				    default_width: 800,
				        default_height: 500,
				        allowfullscreen: true,
				    autoplay_slideshow: false,
				    social_tools: false,
				    iframe_markup: "<iframe src='{path}' width='{width}' height='{height}' frameborder='no' allowfullscreen='true'></iframe>",
				    deeplinking: false
				    });
				    var _wt_freelancerslider = jQuery('.wt-freelancerslider')
				        _wt_freelancerslider.owlCarousel({
				            items: 1,
				            loop:true,
				            nav:true,
				            margin: 0,
				            autoplay:false,
				            navClass: ['wt-prev', 'wt-next'],
				            navContainerClass: 'wt-search-slider-nav',
				            navText: ['<span class="lnr lnr-chevron-left"></span>', '<span class="lnr lnr-chevron-right"></span>'],
				        });
				    </script>

				    <script>
				        if (APP_DIRECTION == 'rtl') {
				            var direction = true;
				        } else {
				            var direction = false;
				        }

				        jQuery("#wt-categoriesslider").owlCarousel({
				            item: 6,
				            rtl:direction,
				            loop:true,
				            nav:false,
				            margin: 0,
				            autoplay:false,
				            center: true,
				            responsiveClass:true,
				            responsive:{
				                0:{items:1,},
				                481:{items:2,},
				                768:{items:3,},
				                1440:{items:4,},
				                1760:{items:6,}
				            }
				        });
				    </script>

				    <script>
				        jQuery(window).load(function () {
				            jQuery(".preloader-outer").delay(500).fadeOut();
				            jQuery(".pins").delay(500).fadeOut("slow");
				        });
				    </script>

				    <!-- Start of Async Drift Code -->
				    <script>
				    "use strict";

				      !function() {
				        var t = window.driftt = window.drift = window.driftt || [];
				        if (!t.init) {
				          if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
				          t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
				          t.factory = function(e) {
				            return function() {
				              var n = Array.prototype.slice.call(arguments);
				              return n.unshift(e), t.push(n), t;
				            };
				          }, t.methods.forEach(function(e) {
				            t[e] = t.factory(e);
				          }), t.load = function(t) {
				            var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
				            o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
				            var i = document.getElementsByTagName("script")[0];
				            i.parentNode.insertBefore(o, i);
				          };
				        }
				      }();
				      drift.SNIPPET_VERSION = '0.3.1';
				      drift.load('r4n6if3vmd5i');
				    </script>
				<!-- End of Async Drift Code -->

</body>
</html>
