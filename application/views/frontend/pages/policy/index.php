
        <!-- Header Area End -->
        <!-- Header Area End -->
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area text-center" style="background: url('<?php echo base_url(); ?>uploads/background/<?php echo $background->image ?>') center center no-repeat">
            <div class="container">
                <h1><?php echo $background->title; ?></h1>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

        <section class="testimonials_seven_area" id="team">
        	<div class="container">
        		<div class="testimonials_s_slider">
        			<div class="item">
        				<div class="testi_s_inner">
        					<img src="<?php echo base_url() ?>uploads/policy/<?php echo $policy->image_header ?>" alt="<?php echo $policy->image_header ?>" alt="" style="width: 100px;">
        					<h4><?php echo $policy->title ?></h4>
        					<h5><?php echo $policy->sub_title ?></h5>
                            </br>

                            <div style="text-align:  justify;font-size: 15px;">
                                <?php echo $policy->description ?>
                            </div>
                            
        					<img src="<?php echo base_url() ?>uploads/company_profile/<?php echo $company_profile->signature ?>" alt="" style="width: 200px;">
        				</div>
        			</div>
        		</div>
        	</div>
        </section>