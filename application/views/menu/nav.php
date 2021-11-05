<!-- Header
		============================================= -->
		<header id="header">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo" class="col-md-2" style="margin-left: -40px;">
							<a href="<?php echo site_url('community/view'); ?>" class="standard-logo" data-dark-logo="<?php echo base_url('images/spiela-logo-white.png'); ?>"><img src="<?php echo base_url('images/spiela-logo-white.png'); ?>" class="logo-img" alt="Spiela Logo"></a>
							
						</div><!-- #logo end -->

						<div class="header-misc col-md-4">

							<form class="search-bar" style="height: 40px;">
								<input type="text" name="search_query" id="search_query" class="form-control" value="" placeholder="Search" autocomplete="off">
							</form>

						</div>

						<div id="primary-menu-trigger">
							<img src="<?php echo base_url('images/menu-trigger.png'); ?>" class="menu-trigger" />
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu col-md-7">

							<ul class="menu-container">
								<li class="menu-item">
									<a class="menu-link" href="<?php echo site_url('community/view'); ?> ">Home</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="<?php echo site_url('about'); ?>">About Us</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="<?php echo site_url('privacy'); ?>">Privacy Policy</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="<?php echo site_url('partner'); ?>">Partners</a>
								</li>
								<?php if($this->session->userdata('urole') == 'admin'){ ?>
								<li class="menu-item">
									<a class="menu-link" href="<?php echo site_url('admin/user/view'); ?>">ADMIN</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="<?php echo site_url('profile/view'); ?>">PROFILE</a>
								</li>
								<li class="menu-item mega-menu">
									<a class="menu-link" href="<?php echo site_url('logout'); ?>">LOG OUT</a>
								</li>
								<?php }else if($this->session->userdata('urole') == 'user'){ ?>
								<li class="menu-item">
									<a class="menu-link" href="<?php echo site_url('invite'); ?>">Invite</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="<?php echo site_url('profile/view'); ?>">PROFILE</a>
								</li>
								<li class="menu-item mega-menu">
									<a class="menu-link" href="<?php echo site_url('logout'); ?>">LOG OUT</a>
								</li>
								<?php }else{ ?>
								<li class="menu-item">
									<a class="menu-link" href="<?php echo site_url('login'); ?>">Invite</a>
								</li>
								<li class="menu-item mega-menu">
									<a class="menu-link" href="<?php echo site_url('login'); ?>">LOGIN</a>
								</li>
								<li class="menu-item mega-menu">
									<a class="menu-link join-now" href="<?php echo site_url('register'); ?>">Join Now</a>
								</li>
								<?php } ?>
							</ul>

						</nav>

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
			<!-- Filters Category Start -->

			<section id="filter-category" style="text-align: center;">
				<div class="filter-content">
					<span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Opportunity-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/new-job-opportunities'); ?>">OPPORTUNITIES</a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Mental-health-icon.svg'); ?>" class="icon-navbar"/><a href="<?php echo site_url('community/category/mental-health-support'); ?>">  MENTAL HEALTH </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Networking-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/networking-training'); ?>"> NETWORKING </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/politics-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/politics-news'); ?>"> POLITICS </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Entrepreneurship-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/entrepreneurship'); ?>"> ENTREPRENEURSHIP </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Finance-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/learn-finance'); ?>"> FINANCE </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Finance-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/crypto'); ?>"> CRYPTO </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Partners-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('partner'); ?>"> PARTNER </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Diversity-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/diversity-policies'); ?>"> DIVERSITY </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Women-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/women-issues'); ?>"> WOMEN </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/COVID_19-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/covid-19'); ?>"> COVID-19 </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Entrepreneurship-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/education-tools'); ?>"> EDUCATION TOOLS </a></span>
			        <span class="spiela-hor-category"><img src="<?php echo base_url('images/icons/Diversity-icon.svg'); ?>" class="icon-navbar"/> <a href="<?php echo site_url('community/category/equality-for-all'); ?>"> EQUALITY </a></span>
			    </div>
			</section>
			
			<section id="banner">
				<img src="<?php echo base_url('images/spiela-navbar-image.png'); ?>" class="banner-img" />
			</section>

			<!-- Filters Category End -->
		</header><!-- #header end -->