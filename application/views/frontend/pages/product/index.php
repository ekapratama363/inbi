<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight"
	style="background: url(<?php echo base_url(); ?>assets/frontend/img/slider2.jpg);background-size: cover;" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i
								class="ion-ios-arrow-forward"></i></a></span> <span>Our Product <i
							class="ion-ios-arrow-forward"></i></span></p>
				<h1 class="mb-3 bread">Our Product</h1>
			</div>
		</div>
	</div>
</section>

<div class="site-section" id="about-section">
	<div class="container">
		<div class="row align-items-lg-center">
			<div class="col-md-8 mb-5 mb-lg-0 position-relative">
				<img src="<?php echo base_url() ?>uploads/product_description/<?php echo $product_description[0]->image ?>" class="img-fluid" alt="Image" style="width: 600px;">
				<div class="experience">
					<span class="year"><?php echo $product_description[0]->image_title ?></span>
					<span class="caption"><?php echo $product_description[0]->image_caption ?></span>
				</div>
			</div>
			<div class="col-md-4 ml-auto">
				<h2 class="section-title mb-3" style="font-weight: bold;"><?php echo $product_description[0]->title ?></h2>
				<p class="mb-4"><?php echo $product_description[0]->description ?></p>
			</div>
		</div>
	</div>
</div>

<div class="site-section" id="about-section">
	<div class="container">
		<div class="row align-items-lg-center">

			<div class="col-md-4 ml-auto">
				<h2 class="section-title mb-3" style="font-weight: bold;"><?php echo $product_description[1]->title ?></h2>
				<p class="mb-4"><?php echo $product_description[1]->description ?></p>
			</div>

			<div class="col-md-8 mb-5 mb-lg-0 position-relative">
				<img src="<?php echo base_url() ?>uploads/product_description/<?php echo $product_description[1]->image ?>" class="img-fluid" alt="Image" style="width: 600px;">
				<div class="experience">
					<span class="year"><?php echo $product_description[1]->image_title ?></span>
					<span class="caption"><?php echo $product_description[1]->image_caption ?></span>
				</div>
			</div>
		</div>
	</div>
</div>


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
												Categories: 
												<?php foreach($prod->categories as $category) { ?>
													<?php echo $category->category ?>,
												<?php } ?>
											</p>
											<p>Description: <?php echo $prod->products->description ?></p>
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