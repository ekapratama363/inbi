<section class="default-banner active-blog-slider">

	<?php foreach($sliders as $slider){ ?>
	<div class="hero-wrap ftco-degree-bg item-slider relative"
		style="background: url(<?php echo base_url(); ?>uploads/slider/<?php echo $slider->image; ?>);background-size: cover;">
		<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
		<div class="container">
			<div class="row no-gutters slider-text justify-content-center align-items-center">
				<div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
					<div class="text text-center">
						<h1 class="mb-4"><?php echo $slider->title ?></h1>
						<p style="font-size: 18px;"><?php echo $slider->description ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</section>

<section class="ftco-section ftco-no-pb">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
				style="background-image: url(<?php echo base_url(); ?>uploads/profile/<?php echo $profile->image ?>);">
			</div>
			<div class="col-md-6 wrap-about py-md-5 ftco-animate">
				<div class="heading-section p-md-5">
					<h2 class="mb-4"><?php echo $profile->title; ?></h2>

					<p><?php echo $profile->description; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-animate pb-40">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center mb-5">

				<h2 class="mb-2">Why Choose Us</h2>
			</div>
		</div>

		<div class="row d-flex">
			<?php foreach($why_choose_us as $wcu) { ?>
			<div class="col-md-3 d-flex align-self-stretch ">
				<div class="media block-6 services d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<img src="<?php echo base_url(); ?>uploads/why_choose_us/<?php echo $wcu->image ?>" alt="Icon"
							style="width: 50px;height:50px">
					</div>
					<div class="media-body py-md-4">
						<h3><?php echo $wcu->title; ?></h3>
						<p><?php echo $wcu->description; ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<!-- Content
		============================================= -->
<section class="section-gap info-area ftco-animate">
	<div class="position-absolute top-0 start-0 w-100 h-100"
		style="margin-top: -125px;background: url(<?php echo base_url(); ?>assets/frontend/'images/kindergarten/images/v936-background-adj-08.jpg') center center / cover; opacity: 0.2;">
	</div>
	<div class="content-wrap">
		<div class="container">
			<h2 class="color h1 fw-bold mb-5">Our Technology</h2>
			<div class="row col-mb-50">
				<div class="col-lg-8">
					<div class="row col-mb-50">
					<?php foreach($technology_items as $ti) { ?>
						<div class="col-md-6">
							<div class="feature-box">
								<div class="fbox-icon">
									<img src="<?php echo base_url(); ?>uploads/technology_item/<?php echo $ti->image ?>" alt="Icon"
										class="p-2 rounded" style="background-color: #BDE0E0">
								</div>
								<div class="fbox-content">
									<h3 class="nott ls0"><?php echo $ti->title ?></h3>
									<p><?php echo $ti->description ?></p>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>

				<div class="col-lg-4 mt-5 mt-lg-0">
					<div class="card border-0 p-3 rounded-6" style="background-color: #eddee6;">
						<div class="card-body">
							<img src="<?php echo base_url(); ?>uploads/technology/<?php echo $technology->image ?>" alt="Card Image"
								style="margin-top: -80px;width: 300px;">
							<h3 class="card-title mt-4"><?php echo $technology->title ?></h3>
							<h5 class="fw-normal font-body h6 lh-base mb-0 mt-2"><?php echo $technology->description ?></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-gap info-area ftco-animate" id="about">
	<div class="container z-2">
		<div class="row align-items-center justify-content-center col-mb-30">

			<div class="col-xl">
				<h1 class="display-3 fw-bolder">What We Do?</h1>
				<h6 class="mb-4 ls2 fw-normal"><?php echo $what_we_do->title; ?></h6>
				<p class="mb-5 fw-light"><?php echo $what_we_do->description; ?></p>
			</div>
			<div class="col-auto">
				<img src="<?php echo base_url(); ?>assets/frontend/images/kindergarten/images/kindergarten-tv.svg" alt="Image TV" class="kindergarder-mockup-tv">

				<div class="kindergarten-carousel-wrap">
					<div id="kindergarten-carousel-img" class="carousel kindergarten-tv-carousel slide carousel-fade"
						data-bs-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block position-relative w-100"
									src="<?php echo base_url(); ?>uploads/what_we_do/<?php echo $what_we_do->image; ?>" alt="Third slide" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-gap info-area bg-light ftco-animate">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center mb-5">
				<h2 class="mb-2">Our Quality</h2>
			</div>
		</div>

		<div class="row align-items-stretch col-mb-50">
			<?php foreach($qualities as $quality) { ?>
				<div class="col-lg-4 col-md-6">
					<div class="feature-box fbox-plain">
						<div class="fbox-icon">
							<a href="#"><img src="<?php echo base_url(); ?>uploads/quality/<?php echo $quality->image; ?>"
									alt="<?php echo $quality->image; ?>"></a>
						</div>
						<div class="fbox-content">
							<h3><?php echo $quality->title; ?></h3>
							<p><?php echo $quality->description; ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<!--
=====================================================
    Partner Section
=====================================================
-->
<div id="partner-section">
	<div class="">
		<div id="partner_logo" class="owl-carousel owl-theme">
			<?php foreach($madeofs as $madeof) { ?>
				<div class="item">
					<img src="<?php echo base_url(); ?>uploads/made_of/<?php echo $madeof->image; ?>" 
						style="max-width: 115px;" alt="logo"></div>
			<?php } ?>
		</div>
	</div>
</div>