
    <!-- Hero Area Start -->
    <div class="ht-hero-section fix">
        <div class="ht-hero-slider">

            <!-- Single Slide Start -->
	        <?php foreach($sliders as $slider){ ?>
            <div class="ht-single-slide" style="background-image: url(<?php echo base_url(); ?>uploads/slider/<?php echo $slider->image; ?>)">
                <div class="ht-hero-content-one container">
                    <h3><?php echo $slider->title ?></h3>
                    <h1 class="cssanimation leDoorCloseLeft sequence">100% Natural</h1>
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
                        <img src="<?php echo base_url(); ?>assets/frontend/assets/img/banner/5lgm_3cv8_220304.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 align-self-center">
                    <div class="organic-about-text">
                        <div class="banner-logo">
                            <img src="<?php echo base_url(); ?>assets/frontend/assets/img/logo/logo_inbi.png" style="width: 70px;" alt="">
                        </div>
                        <h4>who we are</h4>
                        <p style="font-size: 14px;">INBI Nusantara is a company engaged in the production of
                            concentrates of fruits and vegetables and also essential oils for the food, beverages and
                            cosmetics company since 2016, located in the village Bunutin, Bangli, Bali.
                            We are very commit to produce raw materials for fruit and vegetable concentrates and
                            essential oils in accordance with Halal Policy, as well as Food Safety Systems consistently
                            to meet the needs and customer satisfaction of the product quality.</p>
                        <div class="signature">
                            <img src="<?php echo base_url(); ?>assets/frontend/assets/img/banner/signature2.png" alt="">
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
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services text-center">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <img src="<?php echo base_url(); ?>assets/frontend/assets/img/icon/fruit.png" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">High Quality</h3>
                            <p>We develop and manufacture the high quality concentrate of fruit and vegetables,
                                ingredients of pharmacy and essential oil with focus on the cosmetic company and food &
                                beverage company.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services text-center">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <img src="<?php echo base_url(); ?>assets/frontend/assets/img/icon/tea.png" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Experienced Company</h3>
                            <p>We are a professional manufacturing company that produces concentrate of fruits and
                                vegetables and also essential oil. Our production, Quality Control and R&D department
                                consist of experienced team. Our Employees are well trained in GMP and HACCP practices.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services text-center">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <img src="<?php echo base_url(); ?>assets/frontend/assets/img/icon/drinks.png" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Innovative</h3>
                            <p>Besides being professional company, we are also very innovative. Through our innovative
                                and experimental breakthroughs, the products we make have unique characteristics.</p>
                        </div>
                    </div>
                </div>
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

            <div class="bg-white py-4 mb-4">
                <div class="row mx-4 my-4 product-item-2 align-items-start">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <img src="<?php echo base_url(); ?>assets/frontend/assets/img/foodbeverage.png" style="border-radius: 5px;" alt="Image"
                            class="img-fluid">
                    </div>

                    <div class="col-md-5 ml-auto product-title-wrap">
                        <span class="number">01.</span>
                        <h3 class="text-black mb-4 font-weight-bold">Food & Beverage</h3>
                        <p class="mb-4">INBI food & beverage are manufactured in compliance GMP standard to ensure the
                            high quality as well as safety system food consistently to meet the needs and customer
                            satisfaction of the product quality.</p>

                        <a href="news-details.html" class="default-btn">See Product</a>
                    </div>
                </div>
            </div>

            <div class="bg-white py-4">
                <div class="row mx-4 my-4 product-item-2 align-items-start">
                    <div class="col-md-6 mb-5 mb-md-0 order-1 order-md-2">
                        <img src="<?php echo base_url(); ?>assets/frontend/assets/img/cosmetic.png" style="border-radius: 5px;" alt="Image" class="img-fluid">
                    </div>

                    <div class="col-md-5 mr-auto product-title-wrap order-2 order-md-1">
                        <span class="number">02.</span>
                        <h3 class="text-black mb-4 font-weight-bold">Cosmetic & Personal Care</h3>
                        <p class="mb-4">INBI is committed to produce raw materials concentrate fruit and vegetable and
                            essential oils in accordance with the policy halal, quality management, ‘Cara Pembuatan
                            Kosmetik Yang Baik (CPKB)’ as well as safety system food consistently to meet the needs and
                            customer satisfaction of the product quality.</p>

                        <a href="news-details.html" class="default-btn">See Product</a>
                    </div>
                </div>
            </div>

            <div class="bg-white py-4 mb-4">
                <div class="row mx-4 my-4 product-item-2 align-items-start">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <img src="<?php echo base_url(); ?>assets/frontend/assets/img/oil.png" style="border-radius: 5px;" alt="Image" class="img-fluid">
                    </div>

                    <div class="col-md-5 ml-auto product-title-wrap">
                        <span class="number">03.</span>
                        <h3 class="text-black mb-4 font-weight-bold">Essential Oil</h3>
                        <p class="mb-4">Essential Oil are natural oils extracted from part of plants by various methods,
                            having characteristic of high volatility with unique smell.</p>

                        <a href="news-details.html" class="default-btn">See Product</a>
                    </div>
                </div>
            </div>
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
                            <a id="play-video_1" href="https://www.youtube.com/watch?v=4FcVL5uNcc0"
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
                    <div class="custom-col text-center">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="news-details.html"><img src="<?php echo base_url(); ?>assets/frontend/assets/img/blog/1.jpg" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <h4><a href="news-details.html">Coconut improve heart and immunity.</a></h4>
                                <div class="post-meta">
                                    <span class="author-name">post by: <span>Naturecircle Themes</span></span>
                                    <span class="post-date"> - Oct 30,2018</span>
                                </div>
                                <p>Coconut milk is one of the healthiest foods on world, health benefits of coconut milk
                                    make it quite popular.</p>
                                <a href="news-details.html" class="default-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col text-center">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="news-details.html"><img src="<?php echo base_url(); ?>assets/frontend/assets/img/blog/2.jpg" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <h4><a href="news-details.html">The most healthful food you can eat.</a></h4>
                                <div class="post-meta">
                                    <span class="author-name">post by: <span>Naturecircle Themes</span></span>
                                    <span class="post-date"> - Sep 11,2018</span>
                                </div>
                                <p>Health benefits of apple include improved digestion, prevention of stomach disorders,
                                    gallstones.</p>
                                <a href="news-details.html" class="default-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col text-center">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="news-details.html"><img src="<?php echo base_url(); ?>assets/frontend/assets/img/blog/3.jpg" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <h4><a href="news-details.html">Delicious and nutritious vegetable.</a></h4>
                                <div class="post-meta">
                                    <span class="author-name">post by: <span>Naturecircle Themes</span></span>
                                    <span class="post-date"> - Apr 22,2018</span>
                                </div>
                                <p>Research shows drinking beetroot juice benefit digestion, boost athletic performance.
                                    They are a good source.</p>
                                <a href="news-details.html" class="default-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="custom-col text-center">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="news-details.html"><img src="<?php echo base_url(); ?>assets/frontend/assets/img/blog/1.jpg" alt=""></a>
                            </div>
                            <div class="blog-text">
                                <h4><a href="news-details.html">Coconut improve heart and immunity.</a></h4>
                                <div class="post-meta">
                                    <span class="author-name">post by: <span>Naturecircle Themes</span></span>
                                    <span class="post-date"> - Oct 30,2018</span>
                                </div>
                                <p>Coconut milk is one of the healthiest foods on world, health benefits of coconut milk
                                    make it quite popular.</p>
                                <a href="news-details.html" class="default-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
