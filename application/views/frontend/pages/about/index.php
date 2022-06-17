
        <!-- Header Area End -->
        <!-- Header Area End -->
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-12 text-center">
            <div class="container">
                <h1><?php echo $background->title; ?></h1>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
        <!-- Post Area Start -->


        <section class="ftco-section pb-90">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" 
                        style="background-image: url('<?php echo base_url(); ?>uploads/about/<?php echo $about->image_header; ?>');">
						<a id="play-video_1" href="<?php echo $about->sub_title; ?>"
                            class="lightbox-gallery-1 mfp-iframe icon-video popup-vimeo d-flex justify-content-center align-items-center">
                            <span class="fa fa-play"></span>
                        </a>
					</div>
                    <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                        <div class="heading-section mt-5 mb-4">
                            <div class="pl-lg-5 ml-md-5">
                                <span class="subheading">About</span>
                                <h2 class="mb-4"><?php echo $about->title; ?></h2>
                            </div>
                        </div>
                        <div class="pl-lg-5 ml-md-5">
                            <p><?php echo $about->description; ?></p>
                            
                            <div class="h_service_right">
                                <div class="h_service_list">
                                    <?php if(count($mission->missions) > 0) { ?>
                                        <?php for($x = 0; $x < count($mission->missions); $x++) { ?>
                                            <?php if($mission->missions[$x]) { ?>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="assets/img/icon/checklist.png" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><?php echo $mission->missions[$x]; ?></h4>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <div class="section-banner services bg-1">
            <div class="container">
                <div class="container text-center">
                    <div class="section-title-img">
                        <h1>Our Certificate</h1>
                        <p style="font-size: 14px;">We are certified for Halal Product Assurance Agency Indonesia, Food Safety and Quality Management System Integration by PT. TUV NORD Indonesia.</p>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($certificates as $certificate) { ?>
                    <div class="col-md-4">
                        <div class="item animate-box" data-animate-effect="fadeInUp">
                            <div class="position-re o-hidden"> <img src="<?php echo base_url(); ?>uploads/certificate/<?php echo $certificate->image; ?>" alt="" style="max-width: 100%;"> </div>
                            <div class="con"> 
                                <i class="ti-more"></i>
                                <h5><a href="<?php echo base_url(); ?>uploads/certificate/<?php echo $certificate->image; ?>" 
                                    class="d-block dorothea-photo-item" data-caption="Photography" 
                                    data-fancybox="gallery"><?php echo $certificate->title; ?></a></h5>
                                <div class="line"></div> 
                                <a href="<?php echo base_url(); ?>uploads/certificate/<?php echo $certificate->image; ?>" 
                                    class="d-block dorothea-photo-item" data-caption="Photography" data-fancybox="gallery">
                                        <i class="ti-zoom-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Blog Area Start -->
        <div class="blog-area pt-90 pb-95">
            <div class="container">
                <div class="custom-row">
                    <div class="blog-carousel">
                        <?php foreach($madeofs as $madeof) { ?>
                            <div class="custom-col text-center">
                                <div class="single-blog">
                                    <div class="blog-image">
                                        <img src="<?php echo base_url(); ?>uploads/made_of/<?php echo $madeof->image; ?>" 
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->