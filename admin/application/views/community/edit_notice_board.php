<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php
foreach($edit_notice_board as $edit_notice){}
?>
<title>Admin || Edit Notice Board || Spiela</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/dropify/css/dropify.min.css'); ?>">
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
                          <li class="breadcrumb-item"><a href="<?php echo site_url('community/view'); ?>">Community</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Notice Board</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Community-edit">Edit Notice Board</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Community-edit">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Notice Board</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('community/edit_notice_board/'.$edit_notice->id); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="<?php echo $edit_notice->title; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Social Media URL <span class="text-danger">*</span></label>
                                                <input type="text" name="social_url" class="form-control" value="<?php echo $edit_notice->social_url; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                          <div class="form-group">
                                              <label>Social Category</label>
                                              <select name="social_type" class="form-control">
                                                 <option value="<?php echo $edit_notice->social_type; ?>"><?php echo $edit_notice->social_type; ?></option>
                        						 <option value="Facebook">Facebook </option>
                        						 <option value="Instagram">Instagram </option>
                        						 <option value="Skype">Skype</option>
                        						 <option value="TikTok">TikTok</option>
                        						 <option value="Zoom">Zoom</option>
                                              </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Expiry Date</label>
                                                <input type="date" name="expiry_date" class="form-control" value="<?php echo $edit_notice->expiry_date; ?>">
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
<script src="<?php echo base_url('assets/bundles/dataTables.bundle.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js'); ?>"></script>

<!-- Start project main js  and page js -->
<script src="<?php echo base_url('assets/js/core.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/form/dropify.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/page/dialogs.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/table/datatable.js'); ?>"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>-->

<script>
$(document).ready(function() {
      $('#summernote').summernote({
          tabsize: 2,
          height: 200
      });
  });
</script>

</body>
</html>
