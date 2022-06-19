
        <!-- Header Area End -->
        <!-- Header Area End -->
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area text-center" style="background: url('<?php echo base_url(); ?>uploads/background/<?php echo $background->image ?>') center center no-repeat">
            <div class="container">
                <h1><?php echo $background->title; ?></h1>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
        <!-- Post Area Start -->
        <div class="post-area blog-area pt-110 pb-95 blog-column-3">
            <div class="container">
                <div class="row text-center">

                    <?php foreach($articles as $article) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="<?php echo base_url() ?>article/page/<?php echo $article->id ?>">
                                        <img src="<?php echo base_url(); ?>uploads/article/<?php echo $article->image ?>"
                                         alt="<?php echo $article->title; ?>"></a>
                                </div>
                                <div class="blog-text">
                                    <h4><a href="<?php echo base_url() ?>article/page/<?php echo $article->id ?>">
                                        <?php echo $article->title; ?></a>
                                    </h4>
                                    <div class="post-meta">
                                        <span class="author-name">post by: <span>Naturecircle Themes</span></span>
                                        <span class="post-date"> - Oct 30,2018</span>
                                    </div>
                                    <p><?php echo substr($article->description, 0, 50)."..." ?></p>
                                    <a href="<?php echo base_url() ?>article/page/<?php echo $article->id ?>" class="default-btn">Read more</a>
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
        </div>
        <!-- Post Area End -->