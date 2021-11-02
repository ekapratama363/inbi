

    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background: url(<?php echo base_url() ?>assets/frontend/img/slider2.jpg);background-size: cover;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
                        <h1 class="mb-3 bread">Our Policy</h1>
                </div>
            </div>
        </div>
    </section>
    
    <!-- <div id="ftco-loader" class="show fullscreen preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="images/pni_logo.png" alt="">
        </div>
    </div> -->

        <!--================Testimonial Seven Area =================-->
    <section class="testimonials_seven_area" id="team">
        <div class="container">
            <div class="testimonials_s_slider">
                <div class="item">
                    <div class="testi_s_inner">
                        <img src="<?php echo base_url() ?>uploads/policy/<?php echo $policy->image_header ?>" alt="<?php echo $policy->image_header ?>" style="width: 100px;">
                        <h4><?php echo $policy->title ?></h4>
                        <h5><?php echo $policy->sub_title ?></h5>
                        </br>
                        
                        <div style="text-align: justify">
                            <?php echo $policy->description ?>
                        </div>

                        </br></br>
                        <img src="<?php echo base_url() ?>uploads/policy/<?php echo $policy->image_footer ?>" alt="<?php echo $policy->image_footer ?>" style="width: 200px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Testimonial Seven Area =================-->