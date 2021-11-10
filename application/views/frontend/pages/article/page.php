
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

        <section class="ftco-section ftco-degree-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-md-last ftco-animate">
                        <h2 class="mb-3"><?php echo $article->title ?></h2>

                        <?php if($article->image) { ?>
                        <div class="text-center">
                            <img src="<?php echo base_url() ?>uploads/article/<?php echo $article->image ?>" 
                                alt="<?php echo $article->image ?>" 
                                class="img-fluid">
                        </div>
                        <?php } ?>
                        
                        <br>

                        <div><?php echo $article->description ?></div>
                    </div>

                    <div class="col-md-4 sidebar ftco-animate">
                        <div class="sidebar-box ftco-animate">
                            <h3>Recent Article</h3>

                            <?php foreach($recent_articles as $article) { ?>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(<?php echo base_url() ?>uploads/article/<?php echo $article->image ?>);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#"><?php echo $article->title ?></a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span> <?php echo $article->created_at ?></a></div>
                                        <div><a href="#"><span class="icon-person"></span> <?php echo $article->created_by ?></a></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
