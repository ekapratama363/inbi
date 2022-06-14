<!doctype html>
<html lang="en">

    
<!-- Mirrored from lexa.django.themesbrand.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jul 2021 14:13:58 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Admin | Inbi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Inbi" name="Inbi Indonesia" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/fav-icon.png">

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"/>
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet"/>
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" >

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url(); ?>assets/libs/jquery/jquery.min.js"></script>

    </head>

    
    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?php echo base_url() ?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url(); ?>assets/images/fav-icon.png" alt="inbi" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(); ?>assets/images/signature2.png" alt="inbi">
                                </span>
                            </a>

                            <a href="<?php echo base_url() ?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url(); ?>assets/images/fav-icon.png" alt="inbi" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(); ?>assets/images/signature2.png" alt="inbi" width="200">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>

                    </div>

                    <div class="d-flex">


                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php echo base_url(); ?>assets/images/fav-icon.png"
                                    alt="Header Avatar">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <!-- <a class="dropdown-item" href="pages-lock-screen.html"><i class="mdi mdi-lock-open-outline font-size-17 text-muted align-middle me-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item text-danger" href="<?php echo base_url(); ?>admin_panel/auth/logout">
                                    <i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>
         
                    </div>
                </div>
            </header>
            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('admin_panel/component/sidebar'); ?>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4>
                                    <?php echo $this->uri->segment(3) 
                                        ? str_replace("_"," ",strtoupper($this->uri->segment(3))) 
                                        : str_replace("_"," ",strtoupper($this->uri->segment(2))); ?>
                                </h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">
                                            <a href="javascript: void(0);">
                                                <?php echo str_replace("_"," ",strtoupper($this->uri->segment(2))); ?>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item active">
                                            <a href="javascript: void(0);">
                                                <?php echo $this->uri->segment(3) ? str_replace("_"," ",strtoupper($this->uri->segment(3))) : "LIST"; ?>
                                            </a>
                                        </li>
                                    </ol>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <?php $this->load->view("{$filePage}") ?>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                © <?php echo date('Y') ?> Inbi <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> </span>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>            
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url(); ?>assets/libs/select2/js/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    </body>


<!-- Mirrored from lexa.django.themesbrand.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jul 2021 14:14:40 GMT -->
</html>