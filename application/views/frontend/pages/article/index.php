
        <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background: url(<?php echo base_url(); ?>assets/frontend/img/slider2.jpg);background-size: cover;" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate pb-5 text-center">
                        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Article </span></p>
                         <h1 class="mb-3 bread">Article</h1>
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

        <section class="ftco-section">
            <div class="container">
                <div class="row d-flex">

                <?php foreach($articles as $article) { ?>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <div class="text">
                                <a href="blog-single.html" class="block-20 img" style="background-image: url(<?php echo base_url(); ?>uploads/article/<?php echo $article->image ?>);"></a>
                                <h3 class="heading">
                                    <a href="blog-single.html"><?php echo $article->title ?></a>
                                </h3>
                                <p><?php echo $article->description ?></p>
                        
                                <div class="meta mb-3">
                                    <div><a><?php echo $article->created_at ?></a></div>
                                    <div><a>Admin</a></div>
                                    <!-- <div><a class="meta-chat"><span class="icon-chat"></span> 3</a></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                </div>
                    
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>