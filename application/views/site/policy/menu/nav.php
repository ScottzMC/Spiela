

<div class="containter-fluid spiela-horizontal-nav">
    <div class="row m-0">
        <div class="d-flex justify-content-left  col-6 col-md-3 col-lg-2 col-xl-2">
            <a href="<?php echo site_url('community/view'); ?>">
                <img src="<?php echo base_url('images/icons/spiela-logo-white.png'); ?>" width="200" height="65"/>
            </a>    
        </div>

        <div class="spiela-search-wrap col-3 col-lg-4 col-xl-4 align-self-center mt-1">
            <input type="text" name="search_query" id="search_query" class="spiela-navbar-search align-self-center align-self-end"/>
        <!--<form action="<?php echo base_url('community/search'); ?>" method="POST">-->
        <!--    <input type="text" name="search_query" class="spiela-navbar-search align-self-center align-self-end" placeholder=" Search Spiela"/>-->
        <!--</form>-->
        </div>
        <div class="menu-holder  col-6 col-md-9 col-lg-7 col-xl-6 text-right text-xl-center mt-4">
            <ul class="m-0 p-0">
                <!--<li> <a href="<?php echo site_url('site/home'); ?>">   HOME </a> </li>-->
                <li> <a href="<?php echo site_url('community/view'); ?>" target="_blank">COMMUNITY </a> </li>
                <li> <a href="<?php echo site_url('site/about'); ?>"><span class="navbar-current-page"> ABOUT</span> </a> </li>
                <li> <a href="<?php echo site_url('media/view'); ?>" target="_blank">MEDIA </a> </li>
                <li> <a href="<?php echo site_url('partner/view'); ?>" target="_blank">PARTNERS </a> </li>
                <?php if($this->session->userdata('urole') == 'admin'){ ?>
                <li> <a href="<?php echo site_url('admin/user/view'); ?>">ADMIN </a> </li>
                <li> <a href="<?php echo site_url('profile/view'); ?>">PROFILE </a> </li>
                <li> <a href="<?php echo site_url('logout'); ?>">LOG OUT </a> </li>
                <?php }else if($this->session->userdata('urole') == 'user'){ ?>
                <li> <a href="<?php echo site_url('profile/view'); ?>">PROFILE </a> </li>
                <li> <a href="<?php echo site_url('logout'); ?>">LOG OUT </a> </li>
                <?php }else{ ?>
                <li> <a href="<?php echo site_url('login'); ?>">LOG IN </a> </li>
                <li> <a style="color: #3C7267; " href="<?php echo site_url('register'); ?>"> <span class="navbar-featured-select pt-1 pb-1 pl-2 pr-2"> JOIN NOW </span> </a> </li>
                <?php } ?>
            </ul>
        </div>

        <div class="col-6 text-right hamburger-menu mt-2">
            <button class="navbar-toggler bar-button" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <div class="collapse collapsed-menu text-center" id="navbarToggleExternalContent">
            <ul class="m-0 p-0">
                <!--<li> <a href="<?php echo site_url('site/home'); ?>">   HOME </a> </li>-->
                <li> <a href="<?php echo site_url('community/view'); ?>" target="_blank">COMMUNITY</a> </li>
                <li> <a href="<?php echo site_url('site/about'); ?>"> <span class="navbar-current-page">ABOUT</span> </a> </li>
                <li> <a href="<?php echo site_url('media/view'); ?>" target="_blank">MEDIA </a> </li>
                <li> <a href="<?php echo site_url('partner/view'); ?>" target="_blank">PARTNERS </a> </li>
                <?php if($this->session->userdata('urole') == 'admin'){ ?>
                <li> <a href="<?php echo site_url('admin/user/view'); ?>">ADMIN </a> </li>
                <li> <a href="<?php echo site_url('profile/view'); ?>">PROFILE </a> </li>
                <li> <a href="<?php echo site_url('logout'); ?>">LOG OUT </a> </li>
                <?php }else if($this->session->userdata('urole') == 'user'){ ?>
                <li> <a href="<?php echo site_url('profile/view'); ?>">PROFILE </a> </li>
                <li> <a href="<?php echo site_url('logout'); ?>">LOG OUT </a> </li>
                <?php }else{ ?>
                <li> <a href="<?php echo site_url('login'); ?>">LOG IN </a> </li>
                <li> <a style="color: #3C7267; " href="<?php echo site_url('register'); ?>"> <span class="navbar-featured-select pt-1 pb-1 pl-2 pr-2"> JOIN NOW </span> </a> </li>
                <?php } ?>
            </ul>
        </div>

    </div>
</div>
