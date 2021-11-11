<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Login | Pancanature</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/frontend/images/pancanature.png">
        
        <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="card-body pt-0">

                                <h3 class="text-center mt-5 mb-4">
                                    <a href="index.html" class="d-block auth-logo">
                                        <img src="<?php echo base_url(); ?>assets/frontend/images/pancanature.png" alt="pancanature" height="100" class="auth-logo-dark">
                                        <img src="<?php echo base_url(); ?>assets/frontend/images/pancanature.png" alt="pancanature" height="100" class="auth-logo-light">
                                    </a>
                                </h3>

                                <div class="p-3">
                                    <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                                    <p class="text-muted text-center">Log in to continue.</p>

                                    <?php if(validation_errors()) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <p class="text-white">
                                                <?php echo validation_errors(); ?>
                                            </p>
                                        </div>
                                    <?php } ?>

                                    <?php if($this->session->flashdata('error') != NULL) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <p class="text-black"><?php echo $this->session->flashdata('error') ?></p>
                                        </div>
                                    <?php } ?>

                                    <?php echo form_open('admin_panel/auth/auth_login'); ?>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                        </div>
                                        <div class="mb-3 row mt-4">
                                            <!-- <div class="col-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customControlInline">
                                                    <label class="form-check-label" for="customControlInline">Remember me
                                                    </label>
                                                </div>
                                            </div> -->
                                            <div class="col-12 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group mb-0 row">
                                            <div class="col-12 mt-4">
                                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                        </div> -->
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <!-- <p>Don't have an account ? <a href="pages-register.html" class="text-primary"> Signup Now </a></p> -->
                            © <?php echo date('Y') ?> Pancanature <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    </body>


<!-- Mirrored from lexa.django.themesbrand.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jul 2021 14:18:45 GMT -->
</html>