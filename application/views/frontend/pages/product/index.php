
<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" 
    style="background: url(<?php echo base_url(); ?>uploads/background/<?php echo $background->image ?>);background-size: cover;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog </span></p>
                    <h1 class="mb-3 bread"><?php echo $background->title ?></h1>
            </div>
        </div>
    </div>
</section>

<!-- section -->
<section class="layout_padding_2 padding-top_0 service_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="full">
				<div class="catergary_tab_bar">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#hair"> 
							<span><span class="tab_icon"><img src="<?php echo base_url(); ?>uploads/product_description/<?php echo $product_description[0]->image_title ?>" alt="<?php echo $product_description[0]->image_title ?>" /></span> 
							<span class="tab_head"><?php echo $product_description[0]->title ?></span></span> </a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#make"> 
							<span><span class="tab_icon"><img src="<?php echo base_url(); ?>uploads/product_description/<?php echo $product_description[1]->image_title ?>" alt="<?php echo $product_description[1]->image_title ?>" /></span> 
							<span class="tab_head"><?php echo $product_description[1]->title ?></span></span></a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content" style="margin-top: 50px;">
						<div id="hair" class="tab-pane active">
							<div class="service_inner">
							<div class="row">
								<div class="col-md-12">
									<img class="img-responsive" 
										src="<?php echo base_url(); ?>uploads/product_description/<?php echo $product_description[0]->image ?>" 
										alt="<?php echo $product_description[0]->image ?>" />
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="full">
										<div class="service_cont">
										<h3><?php echo $product_description[0]->title ?></h3>
										<p><?php echo $product_description[0]->description ?></p>
										</div>
									</div>
									<!-- <div class="full">
										<div class="center">
										<a class="bt_main" href="make_appoinment.html">Make An Appoinment</a>
										</div>
									</div> -->
								</div>
							</div>
							</div>
						</div>
						<div id="make" class="tab-pane fade">
							<div class="service_inner">
							<div class="row">
								<div class="col-md-12">
									<img class="img-responsive" 
										src="<?php echo base_url(); ?>uploads/product_description/<?php echo $product_description[1]->image ?>" 
										alt="<?php echo $product_description[1]->image ?>" />
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="full">
										<div class="service_cont">
										<h3><?php echo $product_description[1]->title ?></h3>
										<p><?php echo $product_description[1]->description ?></p>
										</div>
									</div>
									<!-- <div class="full">
										<div class="center">
										<a class="bt_main" href="make_appoinment.html">Make An Appoinment</a>
										</div>
									</div> -->
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end section -->


<!--================ Start Product Area =================-->
<section class="ftco-section portfolio_area area-padding bg-light" id="portfolio">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center mb-5">

				<h2 class="mb-2">Our Product</h2>
			</div>
		</div>

		<div class="row justify-content-center filters portfolio-filter">
			<ul>
				<li class="active" data-filter="*">All</li>
				<?php foreach($products as $product) { ?>
				<li data-filter=".<?php echo strtolower($product->category); ?>"><?php echo $product->category; ?></li>
				<?php } ?>
			</ul>
		</div>

		<div class="filters-content">
			<div class="row portfolio-grid">
				<div class="grid-sizer"></div>
				<div class="row">

					<?php foreach($products as $product) { ?>
						<?php if(count($product->prod_cat_details) > 0 ) { ?>
							<?php foreach($product->prod_cat_details as $prod) { ?>

								<div class="col-md-6 col-lg-4 mb-4 all <?php echo strtolower($product->category); ?>">
									<div class="single_portfolio">
										<img class="img-fluid w-100" src="<?php echo base_url() ?>uploads/product/<?php echo $prod->products->image ?>" alt="<?php echo $prod->products->image ?>">
										<div class="short_info">
											<h4><?php echo $prod->products->title ?></h4>

											<p>
												<?php foreach($prod->categories as $category) { ?>
													<?php echo $category->category ?>,
												<?php } ?>
											</p>
											<p><?php echo $prod->products->description ?></p>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Portfolio Area =================-->

<section class="ftco-section ftco-agent">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center mb-5">

				<h2 class="mb-2">Raw Material</h2>
			</div>
		</div>

		<div class="row">
			<?php foreach($raw_material as $raw) { ?>
			<div class="col-md-3">
				<div class="agent">
					<div class="img">
						<img src="<?php echo base_url() ?>uploads/raw_material/<?php echo $raw->image ?>" class="img-fluid" alt="<?php echo $raw->title ?>">
					</div>
					<div class="desc text-center">
						<h3><?php echo $raw->description ?></h3>

					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>