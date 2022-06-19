
    <!-- Hero Area Start -->
    <div class="ht-hero-section fix">
        <div class="ht-hero-slider">

            <!-- Single Slide Start -->
	        <?php foreach($sliders as $slider){ ?>
            <div class="ht-single-slide" style="background-image: url(<?php echo base_url(); ?>uploads/slider/<?php echo $slider->image; ?>)">
                <div class="ht-hero-content-one container">
                    <!-- <h3><?php echo $slider->title ?></h3> -->
                    <h1 class="cssanimation leDoorCloseLeft sequence"><?php echo $slider->title ?></h1>
                    <p><?php echo $slider->description ?></p>
                </div>
            </div>
        	<?php } ?>
        </div>
    </div>
    <!-- Hero Area End -->

    <!-- Banner Four Area Start -->
    <div class="organic-about-area pt-90 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="organic-about-img">
                        <img src="<?php echo base_url(); ?>uploads/profile/<?php echo $profile->image ?>" alt="profile">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 align-self-center">
                    <div class="organic-about-text">
                        <div class="banner-logo">
                            <img src="<?php echo base_url(); ?>uploads/company_profile/<?php echo $company_profile->logo; ?>" style="width: 70px;" alt="logo">
                        </div>
                        <h4><?php echo $profile->title; ?></h4>
                        <p style="font-size: 14px;"><?php echo $profile->description; ?></p>
                        <div class="signature">
                            <img src="<?php echo base_url(); ?>uploads/company_profile/<?php echo $company_profile->signature ?>" alt="signature">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Four Area End -->

    <div class="product-area bg-1 pt-110 pb-80">
        <div class="container text-center">
            <div class="section-title-img">
                <h1>Why Choose Us?</h1>
                <p style="font-size: 14px;">We are very commit to produce raw materials for fruit and vegetable
                    concentrates and essential oils in accordance with Halal Policy.</p>
            </div>
        </div>
        </br></br>
        <div class="container">
            <div class="row">
                <?php foreach($why_choose_us as $wcu) { ?>
                    <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center">
                            <div class="icon d-flex justify-content-center align-items-center mb-4">
                                <img src="<?php echo base_url(); ?>uploads/why_choose_us/<?php echo $wcu->image ?>" alt="image">
                            </div>
                            <div class="media-body">
                                <h3 class="heading"><?php echo $wcu->title; ?></h3>
                                <p><?php echo $wcu->description; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="organic-about-area pt-90 pb-90">
        <div class="container">
            <div class="container text-center">
                <div class="section-title-img">
                    <h1>What We Offer?</h1>
                    <p style="font-size: 14px;">Empower your enterprise with our product.We have a wide range of quality
                        products and, of course! will help your business get maximum results</p>
                </div>
            </div>

            <?php $no = 1; foreach($recent_categories as $category) { ?>
                <div class="bg-white py-4 mb-4">
                    <div class="row mx-4 my-4 product-item-2 align-items-start">
                        <div class="col-md-6 mb-5 mb-md-0 <?php echo $no % 2 == 0 ? 'order-1 order-md-2' : '' ?>">
                            <img src="<?php echo base_url() ?>uploads/product_category/<?php echo $category->image ?>" style="border-radius: 5px;" alt="Image"
                                class="img-fluid">
                        </div>

                        <div class="col-md-5 <?php echo $no % 2 == 0 ? 'ml' : 'mr' ?>-auto product-title-wrap">
                            <span class="number">0<?php echo $no++; ?>.</span>
                            <h3 class="text-black mb-4 font-weight-bold"><?php echo $category->category; ?></h3>
                            <p class="mb-4"><?php echo $category->description ?></p>

                            <a href="news-details.html" class="default-btn">See Product</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <!-- intro_video_bg start-->
    <section class="intro_video_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro_video_iner text-center">
                        <h2>Hello From Youtube!</h2>
                        <div class="intro_video_icon">
                            <a id="play-video_1" href="<?php echo $profile->link; ?>"
                                class="big-icon-link lightbox-gallery-1 mfp-iframe video-play-button popup-youtube">
                                <span class="ti-control-play"></span>
                            </a>
                            <!-- <a id="play-video_1" class="video-play-button popup-youtube"
                                    href="https://www.youtube.com/watch?v=pBFQdxA-apI">
                                    <span class="ti-control-play"></span>
                                </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro_video_bg part start-->

    <!-- Blog Area Start -->
    <div class="blog-area pt-90 pb-95">
        <div class="container">
            <div class="section-title text-center mb-50">
                <div class="section-img d-flex justify-content-center">
                    <img src="<?php echo base_url(); ?>assets/frontend/assets/img/icon/turmeric.png" alt="">
                </div>
                <h2><span>Newspaper </span>For Customer</h2>
            </div>
        </div>
        <div class="container">
            <div class="custom-row">
                <div class="blog-carousel">
                    
                    <?php foreach($recent_articles as $article) { ?>
                        <div class="custom-col text-center">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="<?php echo base_url() ?>article/page/<?php echo $article->id ?>">
                                        <img src="<?php echo base_url(); ?>uploads/article/<?php echo $article->image ?>" 
                                        alt="<?php echo $article->title; ?>"></a>
                                </div>
                                <div class="blog-text">
                                    <h4><a href="<?php echo base_url() ?>article/page/<?php echo $article->id ?>"><?php echo $article->title; ?></a></h4>
                                    <div class="post-meta">
                                        <span class="author-name">post by: <span>admin</span></span>
                                        <span class="post-date"> - <?php echo $article->created_at ?></span>
                                    </div>
                                    <p><?php echo $article->description; ?></p>
                                    <a href="<?php echo base_url() ?>article/page/<?php echo $article->id ?>" class="default-btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
