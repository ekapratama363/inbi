
        <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" 
            style="background: url(<?php echo base_url(); ?>assets/frontend/img/slider2.jpg);background-size: cover;" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate pb-5 text-center">
                        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
                         <h1 class="mb-3 bread">About Us</h1>
                    </div>
                </div>
            </div>
        </section>

         <!--================Testimonial Seven Area =================-->
         <section class="testimonials_seven_area" id="team">
        	<div class="container">
        		<div class="testimonials_s_slider">
        			<div class="item">
        				<div class="testi_s_inner">
        					<img src="<?php echo base_url(); ?>uploads/about/<?php echo $about->image_header; ?>" alt="<?php echo $about->image_header; ?>" style="width: 100px;">
        					<h4><?php echo $about->title; ?></h4>
        					<h5><?php echo $about->sub_title; ?></h5>
                            <div><?php echo $about->description; ?></div>
        					<img src="<?php echo base_url(); ?>uploads/about/<?php echo $about->image_footer; ?>" alt="<?php echo $about->image_footer; ?>" style="width: 200px;">
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Testimonial Seven Area =================-->

        <div class="site-section site-section bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <h2 class="mb-4"><?php echo $vision->title; ?></h2>
                        <p><?php echo $vision->description; ?></p>
                        <p><a href="<?php echo base_url(); ?>product" class="btn btn-primary text-white px-5">See Our Products</a></p>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>uploads/vision_mission_image/<?php echo $vision_mission_image->image; ?>" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-4">
                        
                        <h2 class="mb-4 text-center mt-5"><?php echo $mission->title; ?></h2>

                        <ul class="ul-check mb-5 list-unstyled success">
                            <?php if(count($mission->missions) > 0) { ?>
                                <?php for($x = 0; $x < count($mission->missions); $x++) { ?>
                                    <?php if($mission->missions[$x]) { ?>
                                        <li><?php echo $mission->missions[$x]; ?></li>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 heading-section text-center mb-5">
                        <h2 class="mb-2">Our Customer</h2>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($customers as $customer) { ?>
                    <div class="col-lg-4 col-md-6 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
                        <div class="service">
                            <span class="icon mb-4 d-block">
                                <img src="<?php echo base_url(); ?>uploads/customer/<?php echo $customer->image; ?>" alt="Image" class="img-fluid" style="width:55px;">
                            </span>
                            <h3><?php echo $customer->name; ?></h3>
                            <p><?php echo $customer->description; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>