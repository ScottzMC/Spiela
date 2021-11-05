<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php
foreach($support_post as $sup){}
?>
<title>Admin || Edit SUpport Post || Spiela</title>

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
                          <li class="breadcrumb-item"><a href="#">RIsing Influx</a></li>
                          <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Support Post</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Support-Post-edit">Edit Support Post</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Support-Post-edit">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Community</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('support_post/edit/'.$sup->id); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="<?php echo str_replace('-', '',$sup->title); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                          <div class="form-group">
                                              <label>Category</label>
                                              <select name="category" class="form-control">
                                                 <option value="<?php echo $sup->category; ?>"><?php echo str_replace('-', '', $sup->category); ?></option>
                                                 <option value="announcements">Announcements </option>
                           						 <option value="diversity-policies">Diversity policies</option>
                           						 <option value="education-tools">Education tools</option>
                           						 <option value="entertainment-news">Entertainment news</option>
                           						 <option value="equality-for-all">Equality for all</option>
                           						 <option value="learn-finance">Learn Finance</option>
                           						 <option value="learn-tech">Learn Tech</option>
                           						 <option value="gender">Gender</option>
                           						 <option value="inclusion">Inclusion</option>
                           						 <option value="job-market">Job market</option>
                           						 <option value="members-community">Members of the community</option>
                           						 <option value="mentoring-links">Mentoring links</option>
                           						 <option value="mental-health-support">Mental Health support</option>
                           						 <option value="networking">Networking </option>
                           						 <option value="new-job-opportunities">New Job Opportunities</option>
                           						 <option value="networking-training">Networking Training</option>
                           						 <option value="range-of-opportunities">Range of Opportunities</option>
                           						 <option value="politics-news">Politics news</option>
                           						 <option value="sports-initiatives">Sports initiatives</option>
                           						 <option value="science">Science</option>
                           						 <option value="workshop-events">Workshop events</option>
                                              </select>
                                          </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                          <div class="form-group">
                                              <label>Post Status</label>
                                              <select name="post_status" class="form-control">
                                                 <option>-- Select --</option>
                                                 <option value="Approved">Approved </option>
                           						 <option value="Rejected">Rejected</option>
                                              </select>
                                          </div>
                                        </div>
                                        <!--<div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Banner <span class="text-danger">*</span></label>
                                                <input type="hidden" name="banner" value="<?php echo $com->banner; ?>">
                                                <input type="file" name="fileToUpload[]" class="form-control">
                                            </div>
                                        </div>-->
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Meta</label>
                                                <textarea name="meta" class="form-control" aria-label="With textarea"><?php echo $sup->meta; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Body</label>
                                                <textarea id="summernote" name="body" class="form-control" aria-label="With textarea"><?php echo $sup->body; ?></textarea>
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
