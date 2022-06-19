<!-- Header Area End -->
<!-- Header Area End -->
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area text-center" style="background: url('<?php echo base_url(); ?>uploads/background/<?php echo $background->image ?>') center center no-repeat">
    <div class="container">
        <h1><?php echo $background->title; ?></h1>
    </div>
</div>

<!-- Post Area Start -->
<div class="post-area blog-area pt-110 pb-95 post-details">
	<div class="container">
		<div class="row">
			<div class="col-xl-9 col-lg-8">
				<div class="single-post-item text-center">

					<div class="text-center">
						<img src="<?php echo base_url() ?>uploads/article/<?php echo $article->image ?>" 
							alt="<?php echo $article->image ?>" 
							class="img-fluid">
					</div>

					<!-- <div class="single-post-img">
						<div class="owl-carousel owl-theme home-slider">
							<div>
								<a class="a-block d-flex align-items-center height-lg"
									style="background-image: url('<?php echo base_url() ?>uploads/article/<?php echo $article->image ?>'); "></a>
							</div>
						</div>
					</div> -->

					<h3 class="single-post-title"><a><?php echo $article->title; ?></a></h3>
					<div class="single-post-meta">
						<span>Posts by : admin</span>
						<span><?php echo $article->created_at; ?></span>
					</div>

					<div class="single-post-info-text text-start">
						<p><?php echo $article->description; ?></p>
					</div>
				</div>


			</div>
			<div class="col-xl-3 col-lg-4">
				<div class="sidebar-wrapper">
					<!-- <div class="sidebar-widget sidebar-search-widget">
						<h3>Search</h3>
						<form action="#" class="sidebar-search-box">
							<input type="text" placeholder="Search...">
							<button type="button"><i class="fa fa-search"></i></button>
						</form>
					</div> -->
					<!-- <div class="sidebar-widget">
						<h3>Blog Archives</h3>
						<div class="sidebar-widget-option-wrapper">
							<div class="sidebar-widget-option">
								<a href="blog-details.html">March 2015 <span>(1)</span></a>
							</div>
							<div class="sidebar-widget-option">
								<a href="blog-details.html">December 2015 <span>(3)</span></a>
							</div>
							<div class="sidebar-widget-option">
								<a href="blog-details.html">Novermber 2014 <span>(7)</span></a>
							</div>
							<div class="sidebar-widget-option">
								<a href="blog-details.html">September 2015 <span>(1)</span></a>
							</div>
							<div class="sidebar-widget-option">
								<a href="blog-details.html">August 2015 <span>(3)</span></a>
							</div>
						</div>
					</div> -->
					<div class="sidebar-widget">
						<h3>Recent Posts</h3>
						<div class="sidebar-widget-option-wrapper">
                            <?php foreach($recent_articles as $article) { ?>
                                <div class="sidebar-widget-option">
                                    <a href="<?php echo base_url() ?>article/page/<?php echo $article->id ?>"><?php echo $article->title ?></a>
                                </div>
                            <?php } ?>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>