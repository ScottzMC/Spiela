<!-- Start Main top header -->
<div id="header_top" class="header_top">
    <div class="container">
        <div class="hright">
            <a href="javascript:void(0)" class="nav-link icon right_tab"><i class="fe fe-align-right"></i></a>
            <a href="<?php echo site_url('logout'); ?>" class="nav-link icon settingbar"><i class="fe fe-power"></i></a>
        </div>
    </div>
</div>
<!-- Start Rightbar setting panel -->

<?php
foreach($user_details as $usrd){}

?>

<!-- Start Main leftbar navigation -->
<div id="left-sidebar" class="sidebar">
    <h5 class="brand-name">Rising Influx
      <a href="javascript:void(0)" class="menu_option float-right">
        <i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i>
      </a>
    </h5>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-uni">Feature</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-admin">Other</a></li>
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="menu-uni" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                  <!--<li class="active"><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>-->
                    <li><a href="https://spiela.co.uk"><i class="fa fa-dashboard"></i><span>Back to Site</span></a></li>
                    <li><a href="<?php echo site_url('user/view'); ?>"><i class="fa fa-users"></i><span>Users</span></a></li>
                    <li class="active"><a href="<?php echo site_url('community/view'); ?>"><i class="fa fa-book"></i><span>Community</span></a></li>
                    <li><a href="<?php echo site_url('partner/view'); ?>"><i class="fa fa-book"></i><span>Partners</span></a></li>
                    <li><a href="<?php echo site_url('support_post/view'); ?>"><i class="fa fa-book"></i><span>Support Post</span></a></li>
                    <!--<li><a href="<?php echo site_url('dashboard/student'); ?>"><i class="fa fa-users"></i><span>Students</span></a></li>
                    <?php if(!empty($this->session->userdata('login'))){ ?>
                    <li><a href="<?php echo site_url('logout'); ?>"><i class="fe fe-power"></i><span>Logout</span></a></li>
                  <?php }else{ ?>
                    <li><a href="<?php echo site_url('login'); ?>"><i class="fe fe-power"></i><span>Login</span></a></li>
                    <li><a href="<?php echo site_url('register'); ?>"><i class="fe fe-power"></i><span>Register</span></a></li>
                  <?php } ?> -->
                </ul>
            </nav>
        </div>
        <div class="tab-pane fade" id="menu-admin" role="tabpanel">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                    <!--<li><a href="<?php echo site_url('dashboard/payment'); ?>"><i class="fa fa-credit-card"></i><span>Payments</span></a></li>
                    <li><a href="<?php echo site_url('dashboard/hostel'); ?>"><i class="fa fa-bed"></i><span>Hostel</span></a></li>
                    <li><a href="<?php echo site_url('dashboard/transport');  ?>"><i class="fa fa-truck"></i><span>Transport</span></a></li>
                    <li><a href="<?php echo site_url('dashboard/leave');  ?>"><i class="fa fa-user-o"></i><span>Leave</span></a></li>
                    <li><a href="<?php echo site_url('dashboard/attendance'); ?>"><i class="fa fa-calendar-check-o"></i><span>Attendance</span></a></li>
                    <li><a href="<?php echo site_url('dashboard/setting'); ?>"><i class="fa fa-gear"></i><span>Settings</span></a></li>-->
                </ul>
            </nav>
        </div>
    </div>
    
</div>
