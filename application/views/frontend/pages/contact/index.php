
<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background: url(<?php echo base_url(); ?>assets/frontend/img/slider2.jpg);background-size: cover;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact Us <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Contact Us</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
    <div class="row d-flex mb-5 contact-info justify-content-center">
        <div class="col-md-8">
        <div class="row mb-5">
            <div class="col-md-4 text-center py-4">
            <div class="icon">
                <span class="icon-map-o"></span>
            </div>
            <p><span>Address:</span> <?php echo $company_profile->address ?></p>
            </div>
            <div class="col-md-4 text-center border-height py-4">
            <div class="icon">
                <span class="icon-mobile-phone"></span>
            </div>
            <p><span>Phone:</span> <a href="tel://<?php echo $company_profile->phone ?>"><?php echo $company_profile->phone ?></a></p>
            </div>
            <div class="col-md-4 text-center py-4">
            <div class="icon">
                <span class="icon-envelope-o"></span>
            </div>
            <p><span>Email:</span> <a href="mailto:<?php echo $company_profile->email ?>"><?php echo $company_profile->email ?></a></p>
            </div>
        </div>
        </div>
    </div>
    <div class="row block-9 justify-content-center mb-5">
        <div class="col-md-8 mb-md-5">
        <h2 class="text-center">If you got any questions <br>please do not hesitate to send us a message</h2>
        
        <?php if(validation_errors()) { ?>
            <div class="alert alert-warning alert-dismissible">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <p class="text-black"><?php echo validation_errors(); ?></p>
            </div>
        <?php } ?>
        
        <?php if($this->session->flashdata('error') != NULL) { ?>
            <div class="alert alert-warning alert-dismissible">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <p class="text-black"><?php echo $this->session->flashdata('error') ?></p>
            </div>
        <?php } ?>

        <?php if($this->session->flashdata('success') != NULL) { ?>
            <div class="alert alert-success alert-dismissible">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <p class="text-black"><?php echo $this->session->flashdata('success') ?></p>
            </div>
        <?php } ?>
        
        <?php echo form_open('contact/store', ['class' => 'bg-light p-5 contact-form']); ?>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name" value="<?php echo set_value('name'); ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Your Email" value="<?php echo set_value('email'); ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject" value="<?php echo set_value('subject'); ?>">
            </div>
            <div class="form-group">
                <textarea cols="30" rows="7" name="message" class="form-control" placeholder="Message"><?php echo set_value('message'); ?></textarea>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LfbHacbAAAAAEvCl6mIzk1K7rVYkAgreU0-kmnc" 
                    data-theme="light"></div>
            </div>
            <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
        <?php echo form_close(); ?>
        
        </div>
    </div>
    </div>
</section>