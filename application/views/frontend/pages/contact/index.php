
        <!-- Header Area End -->
        <!-- Header Area End -->
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area text-center" style="background: url('<?php echo base_url(); ?>uploads/background/<?php echo $background->image ?>') center center no-repeat">
            <div class="container">
                <h1><?php echo $background->title; ?></h1>
            </div>
        </div>

        <div class="google-map-area">
            <div id="contacts" class="map-area">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1J0dSFrIWSUvtgstfNqlgU5vnpyWYUpY&ehbc=2E312F"
                    width="100%" height="400px"></iframe>
            </div>
        </div>

        <!-- Google Map Area End -->
        <!-- Contact Area Start -->
        <div class="contact-area fix mb-95">
            <div class="contact-form pt-110">

                <h1 class="contact-title">DROP YOUR MESSAGE HERE</h1>

                <?php if(validation_errors()) { ?>
                    <div class="alert alert-warning alert-dismissible">
                        <p class="text-black"><?php echo validation_errors(); ?></p>
                    </div>
                <?php } ?>

                <?php if($this->session->flashdata('error') != NULL) { ?>
                    <div class="alert alert-warning alert-dismissible">
                        <p class="text-black"><?php echo $this->session->flashdata('error') ?></p>
                    </div>
                <?php } ?>

                <?php if($this->session->flashdata('success') != NULL) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <p class="text-black"><?php echo $this->session->flashdata('success') ?></p>
                    </div>
                <?php } ?>
        
                <?php echo form_open('contact/store', ['id' => 'contact-form']); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="name" id="name" placeholder="Full Name *">
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="email" id="email" placeholder="Email *">
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="subject" id="subject" placeholder="Subject *">
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" id="message" placeholder="Message *"></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="g-recaptcha" data-sitekey="6LfbHacbAAAAAEvCl6mIzk1K7rVYkAgreU0-kmnc" 
                                data-theme="light">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn default-btn">
                        <span>Send Email</span>
                    </button>
                <?php echo form_close(); ?>
            </div>
            <div class="contact-address pt-110 pb-100">
                <h1 class="contact-title">CONTACT US</h1>
                <div class="contact-info">
                    <p><?php echo $company_profile->motto; ?></p>
                    <div class="contact-list-wrapper">
                        <div class="contact-list">
                            <i class="fa fa-fax"></i>
                            <span>Address: <?php echo $company_profile->address; ?></span>
                        </div>
                        <div class="contact-list">
                            <i class="fa fa-phone"></i>
                            <span>+62<?php echo $company_profile->phone; ?></span>
                        </div>
                        <div class="contact-list">
                            <i class="fa fa-envelope-o"></i>
                            <span><?php echo $company_profile->email; ?></span>
                        </div>
                    </div>
                </div>
                <div class="working-time">
                    <h2>Working hours</h2>
                    <span><?php echo $company_profile->working_hours; ?></span>
                </div>
            </div>
        </div>
        <!-- Contact Area End -->