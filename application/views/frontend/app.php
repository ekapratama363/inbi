<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Welcome to Pancanature Indonesia</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/animate.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/magnific-popup.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/aos.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/ionicons.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/jquery.timepicker.css">

        <link rel="icon" href="<?php echo base_url(); ?>assets/frontend/images/pni_logo.png">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/flaticon.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/icomoon.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>uploads/company_profile/<?php echo $company_profile->logo; ?>" class="logo-responsive" alt="" style="width: 100px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"  >
                    <span class="oi oi-menu"  style="color: black;"></span>
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto" >
                        <li class="nav-item <?php if($this->uri->segment(1) == "" || $this->uri->segment(1) == "home") echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
                            
                        <li class="nav-item <?php if($this->uri->segment(1) == "about") echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>about" class="nav-link">About</a></li>
                            
                        <li class="nav-item <?php if($this->uri->segment(1) == "product") echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>product" class="nav-link">Product</a></li>
                            
                        <li class="nav-item <?php if($this->uri->segment(1) == "solution") echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>solution" class="nav-link">Solution</a></li>
                            
                        <li class="nav-item <?php if($this->uri->segment(1) == "policy") echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>policy" class="nav-link">Policy</a></li>
                            
                        <li class="nav-item <?php if($this->uri->segment(1) == "article") echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>article" class="nav-link">Article</a></li>
                            
                        <li class="nav-item <?php if($this->uri->segment(1) == "contact") echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>contact" class="nav-link">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <div id="ftco-loader" class="show fullscreen preloader d-flex align-items-center justify-content-center">
            <div class="preloader-circle"></div>
            <div class="preloader-img">
                <img src="images/pni_logo.png" alt="">
            </div>
        </div> -->

        <!-- Content -->
        <?php $this->load->view("{$filePage}") ?>
        <!-- End Content -->

        <footer class="ftco-footer ftco-section" >
            <div class="container">
              <div class="row mb-5">
                <div class="col-md">
                  <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><img src="<?php echo base_url(); ?>uploads/company_profile/<?php echo $company_profile->logo; ?>" 
                        class="logo-responsive" alt="" style="width: 100px;"></h2>
                    <p><?php echo $company_profile->motto; ?></p>
                    <ul class="ftco-footer-social list-unstyled mt-5">
                        <?php if(count($company_profile->type) > 0) { ?>
                            <?php for($x = 0; $x < count($company_profile->type); $x++) { ?>
                                <li class="ftco-animate">
                                    <a href="<?php echo $company_profile->link[$x]; ?>" target="_blank">
                                        <span class="icon-<?php echo $company_profile->type[$x]; ?>"></span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                  </div>
                </div>
           
                <div class="col-md">
                  <div class="ftco-footer-widget mb-4">
                      <h2 class="ftco-heading-2">Have a Questions?</h2>
                      <div class="block-23 mb-3">
                        <ul>
                          <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $company_profile->address; ?></span></li>
                          <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo $company_profile->phone; ?></span></a></li>
                          <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text"><?php echo $company_profile->email; ?></span></a></li>
                        </ul>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
          
                  <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by Pancanature Indonesia</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
              </div>
            </div>
          </footer>

        <div id="ftco-loader" class="show fullscreen preloader d-flex align-items-center justify-content-center">
            <div class="preloader-circle"></div>
            <div class="preloader-img">
                <img src="<?php echo base_url(); ?>assets/frontend/images/pni_logo.png" alt="">
            </div>
        </div>

        <!-- JavaScripts
        ============================================= -->
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/plugins.min.js"></script>


        <!-- Footer Scripts
        ============================================= -->
        <script src="<?php echo base_url(); ?>assets/frontend/js/functions.js"></script>

        <!-- <script src="<?php echo base_url(); ?>assets/frontend/js/vendor/jquery-2.2.4.min.js"></script> -->
        <!-- <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.min.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.easing.1.3.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.stellar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/aos.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.animateNumber.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.timepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/scrollax.min.js"></script>
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
        <!-- <script src="<?php echo base_url(); ?>assets/frontend/js/google-map.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.magnific-popup.min.js"></script>	
        <script src="<?php echo base_url(); ?>assets/frontend/js/parallax/jquery.parallax-scroll.js"></script>
       
        <script src="<?php echo base_url(); ?>assets/frontend/js/owl.carousel.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/frontend/js/swiper/js/swiper.min.js"></script>			
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.sticky.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.counterup.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/theme.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.mixitup.min.js"></script>
        
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/skills-master/jquery.skills.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/main.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/main2.js"></script>

        <script src='https://www.google.com/recaptcha/api.js' async defer ></script>

        <script>
            let carousels = jQuery('#kindergarten-carousel-img, #kindergarten-carousel-text');
            jQuery('.carousel-control-prev').on( 'click', function(){
                carousels.carousel('prev');
            });
            jQuery('.carousel-control-next').on( 'click', function(){
                carousels.carousel('next');
            });
    
            // jQuery(function() {
            //     jQuery(".component-flatpickr").flatpickr({
            //         enableTime: true,
            //         dateFormat: "d/m/yy - H:i",
            //     });
            // });
        </script>
    </body>
</html>