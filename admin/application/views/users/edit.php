<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php
foreach($users as $usrd){}
?>
<title>Admin || Edit <?php echo $usrd->firstname; ?> <?php echo $usrd->lastname; ?> Users || Spiela</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/dropify/css/dropify.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/dist/summernote.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatable/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css'); ?>">


<!-- Core css -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.min.css'); ?>"/>
</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">
    <!-- Start project content area -->
    <?php include('menu/nav.php'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Dashboard</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="<?php echo site_url('user/view'); ?>">Users</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $usrd->firstname; ?> <?php echo $usrd->lastname; ?> Users</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#User-edit">Edit User</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="User-edit">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit <?php echo $usrd->firstname; ?> <?php echo $usrd->lastname; ?> Users</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('user/edit/'.$usrd->id); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name <span class="text-danger">*</span></label>
                                                <input type="text" name="firstname" class="form-control" value="<?php echo $usrd->firstname; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Last Name <span class="text-danger">*</span></label>
                                                <input type="text" name="lastname" class="form-control" value="<?php echo $usrd->lastname; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <p><?php echo $usrd->email; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                          <div class="form-group">
                                              <label>Role</label>
                                              <select name="role" class="form-control">
                                              <option value="<?php echo $usrd->role; ?>"><?php echo $usrd->role; ?></option>
                                              <option value="admin">Admin</option>
                                              <option value="dummy">Dummy</option>
                                              <option value="user">User</option>
                                              </select>
                                          </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Company <span class="text-danger">*</span></label>
                                                <input type="text" name="company" class="form-control" value="<?php echo $usrd->company; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Bio</label>
                                                <textarea name="bio" class="form-control" aria-label="With textarea"><?php echo $usrd->bio; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Date Of Birth <span class="text-danger">*</span></label>
                                                    <input type="date" name="dob" class="form-control" value="<?php echo $usrd->dob; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Ethnicity</label>
                                                <select name="ethnicity" class="form-control">
                                                 <option value="<?php echo $usrd->ethnicity; ?>"><?php echo $usrd->ethnicity; ?></option>
                                                <option value="Black African">Black African</option>
                                                <option value="Black Carribean">Black Carribean</option>
                                                <option value="White European">White European</option>
                                                <option value="Mixed Heritage">Mixed Heritage</option>
                                                <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                          <div class="form-group">
                                              <label>Location</label>
                                              <select name="location" class="form-control">
                                              <option value="<?php echo $usrd->location; ?>"><?php echo $usrd->location; ?></option>
                                              <option value="England">England</option>
                                              <option value="Portugal">Portugal</option>
                                              <option value="United Kingdom">United Kingdom</option>
                                              <option value="United States">United States</option>
                                              </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Job Industry <span class="text-danger">*</span></label>
                                                <input type="text" name="job_industry" class="form-control" value="<?php echo $usrd->job_industry; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>What are you looking for?</label>
                                                <select name="user_looking" class="form-control">
                                                <option value="<?php echo $usrd->user_looking; ?>"><?php echo $usrd->user_looking; ?></option>
                                                <option value="Networking">Networking</option>
                                                <option value="Promote yourself">Promote yourself</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="submit_edit" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="<?php echo base_url('assets/bundles/lib.vendor.bundle.js'); ?>"></script>

<!-- Start Plugin Js -->
<script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/dropify/js/dropify.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bundles/summernote.bundle.js'); ?>"></script>
<script src="<?php echo base_url('assets/bundles/dataTables.bundle.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js'); ?>"></script>

<!-- Start project main js  and page js -->
<script src="<?php echo base_url('assets/js/core.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/form/dropify.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/page/summernote.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/page/dialogs.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/table/datatable.js'); ?>"></script>

</body>
</html>
