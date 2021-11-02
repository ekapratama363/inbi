
<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background: url(<?php echo base_url(); ?>assets/frontend/img/slider2.jpg);background-size: cover;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Our Solution <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Our Solution</h1>
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

<!-- Start about Area -->
    <section class="section-gap info-area" id="about">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-5">Our Solution For Your Business</h1>
                    </div>
                </div>
            </div>					
            <div class="single-info row mt-40">
                <div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left">
                    <div class="info-thumb">
                        <img src="<?php echo base_url() ?>uploads/solution_description/<?php echo $solution_description->image ?>" class="img-fluid" alt="<?php echo $solution_description->image ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 no-padding info-rigth">
                    <div class="info-content">
                        <h2 class="pb-30"><?php echo $solution_description->title ?></h2>
                        <div><?php echo $solution_description->description ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End about Area -->

<!--================Product Feature Nine Area =================-->
<section class="product_feature_area bg-light border-bottom" id="feature">
    <div class="container">
        <div class="nine_title center">
            <h2>Certificate of Compliance</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="nine_p_f_img">
                    <img src="<?php echo base_url() ?>uploads/certificate_image/<?php echo $certificate_image->image ?>" alt="<?php echo $certificate_image->image ?>">
                </div>
            </div>
            <div class="col-md-8">
                <div class="row n_product_inner">
                    <?php foreach($certificate as $cert) { ?>
                    <div class="col-md-6">
                        <div class="n_product_item">
                            <div class="icon_box">
                                <img src="<?php echo base_url() ?>uploads/certificate/<?php echo $cert->image ?>" alt="">
                            </div>
                            <h4><?php echo $cert->title ?></h4>
                            <p><?php echo $cert->description ?></p>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Feature Area =================-->