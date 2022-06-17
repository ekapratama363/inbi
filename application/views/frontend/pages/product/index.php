
        <!-- Header Area End -->
        <!-- Header Area End -->
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-12 text-center">
            <div class="container">
                <h1>Our Products</h1>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
        <!-- Post Area Start -->

        <div class="server_price_area">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <div class="section-img d-flex justify-content-center">
                        <img src="assets/img/icon/products-icon.png" alt="">
                    </div>
                    <h2><span>Our </span>Products</h2>
                </div>
                <div class="container text-center">
                    <div class="section-title-img">
                        <p>The best product from INBI are the Aloe Vera Extract , Papaya Extract, Yam Bean Extract, Lemon Extract which have been popular among cosmetic factory. Green Tea Extract , 
                            Coffee Extract and Ginger Extract are popular among food and beverage factory. Kaffir Lime Oil, Cajuput Oil and Turmeric oil are also popular among essential oil factory which have encouraged 
                            us to continue in developing a better product and quality.</p>
                    </div>
                </div>

                <div class="row service_price_inner">


                <?php foreach($products as $product) { ?>
                    <div class="col-md-4 col-xs-6">
                        <div class="server_price_item">
                            <div class="pirce_head">
                                <img src="<?php echo base_url() ?>uploads/product_category/<?php echo $product->image ?>" alt="">
                                <h4><?php echo $product->category; ?></h4>
                            </div>
                            <?php if(count($product->prod_cat_details) > 0 ) { ?>
                                <div class="pirce_body">
                                    <div class="tex_ques_inner">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                
                                            <?php foreach($product->prod_cat_details as $prod) { ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <h5><?php echo $prod->products->title ?></h5>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="">
                                                            <?php echo $prod->products->description ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- Protuct Area Start -->
        <div class="product-area bg-1 pt-110 pb-80">
            <div class="container">
                <div class="section-title section-title-four section-title-green text-center mb-40">
                    <h4>Inbinusantara Products</h4>
                    <h2>featured products</h2>
                </div>

                <div class="product-tab-list product-tab-list-2 nav fix" role="tablist">
                    
				<?php foreach($products as $index => $product) { ?>
                    <a 
                        <?php echo $index == 0 ? 'class="active"' : null; ?> 
                        href="#tab<?php echo $index; ?>"data-bs-toggle="tab" 
                        role="tab" aria-selected="false" aria-controls="tab<?php echo $index; ?>"><?php echo $product->category; ?></a>
				<?php } ?>

                </div>
                <div class="tab-content text-center">

					<?php foreach($products as $key => $product) { ?>
                        <div class="tab-pane <?php echo $key == 0 ? 'active show': '' ?> fade" id="tab<?php echo $key; ?>" role="tabpanel">
                            <div class="row">
                                <?php if(count($product->prod_cat_details) > 0 ) { ?>
                                    <?php foreach($product->prod_cat_details as $prod) { ?>
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="item web">
                                                <a href="<?php echo base_url() ?>uploads/product/<?php echo $prod->products->image ?>" class="item-wrap" data-fancybox="gal">
                                                <span style="font-size: 16px;"><?php echo $prod->products->title ?></span>
                                                <img class="img-fluid" src="<?php echo base_url() ?>uploads/product/<?php echo $prod->products->image ?>">
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
					<?php } ?>

                </div>
            </div>
        </div>
        <!-- Protuct Area End -->
        