<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
  
      <!-- <p class="text-light bg-primary pl-1">.text-lighttext-lighttext-light</p> -->
  
      <?php if(validation_errors()) { ?>
          <div class="alert alert-danger alert-dismissible">
              <p class="text-white"><?php echo validation_errors(); ?></p>
          </div>
      <?php } ?>


      <?php if($this->session->flashdata('success') != NULL) { ?>
          <div class="alert alert-success alert-dismissible">
              <p class="text-black"><?php echo $this->session->flashdata('success') ?></p>
          </div>
      <?php } ?>

      <?php if($this->session->flashdata('failed') != NULL) { ?>
          <div class="alert alert-danger alert-dismissible">
              <p class="text-white"><?php echo $this->session->flashdata('failed') ?></p>
          </div>
      <?php } ?>

      <?php echo form_open_multipart($this->uri->segment(1) .'/'. $this->uri->segment(2).'/'. $this->uri->segment(3) . '/update'); ?>
      <!-- <form class="forms-sample"> -->
        <input type="hidden" name="id" value="<?php echo isset($value->id) ? $value->id : ''; ?>">
        <div class="row">
          <div class="col-md-6">
            

          <div class="form-group">
              <label>Logo</label>
              <div class="mb-3">
                <div class="input-group col-xs-12">
                  <input type="file" name="logo" id="logo" class="form-control file-upload-info" placeholder="Upload Image">
                </div>
              </div>
            </div>

            <input type="hidden" name="logo_hidden" value="<?php echo isset($value->logo) ? $value->logo : ''; ?>">
            <?php if(isset($value->logo)) { ?>
            <div class="form-group">
              <div class="mb-3">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?php echo base_url() . 'uploads/company_profile/' . $value->logo ; ?>" 
                    alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text"><?php echo $value->logo; ?></p>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <div class="form-group">
              <div class="mb-3">
                <label for="motto">Motto</label>
                <input type="text" class="form-control" id="motto" name="motto"
                  value="<?php echo isset($value->motto) ? $value->motto : ''; ?>">
              </div>
            </div>
            
            <div class="form-group">
              <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                  value="<?php echo isset($value->phone) ? $value->phone : ''; ?>">
              </div>
            </div>
            
            <div class="form-group">
              <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                  value="<?php echo isset($value->email) ? $value->email : ''; ?>">
              </div>
            </div>
            
            <div class="form-group">
              <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address"
                  value="<?php echo isset($value->address) ? $value->address : ''; ?>">
              </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-3">

                    <div class="form-group">
                      <label for="type_social_media">Type Social Media</label>
                      <input class="form-control" name="type[]" type="text" 
                        value="<?php echo (is_array($value->type)) ? $value->type[0] : null ?>">
                    </div>

                    <div class="form-group">
                      <label for="link_social_media">Link Social Media</label>
                      <input class="form-control" name="link[]" type="text" 
                        value="<?php echo (is_array($value->link)) ? $value->link[0] : null ?>">
                    </div>

                    <div class="form-group">
                      <label for="button_social_media" style="color: white">text white</label>
                      <div class="input-group-append">
                          <button type="button" class="addSocialMedia btn btn-primary"><i class="fa fa-plus"></i></button>
                      </div>
                    </div>
                    
                </div>

                <?php if(is_array($value->type)) { ?>
	  							<?php for($x = 1; $x<count($value->type); $x++) { ?>
                    <div class="input-group mb-3">

                        <div class="form-group">
                          <label for="type_social_media">Type Social Media</label>
                          <input class="form-control" name="type[]" type="text" 
                            value="<?php echo $value->type[$x] ?>">
                        </div>

                        <div class="form-group">
                          <label for="link_social_media">Link Social Media</label>
                          <input class="form-control" name="link[]" type="text" 
                            value="<?php echo $value->link[$x] ?>">
                        </div>

                        <div class="form-group">
                          <label for="button_social_media" style="color: white">text white</label>
                          <div class="input-group-append">
                            <button type="button" class="removeSocialMedia btn btn-danger"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        
                    </div>
                  <?php } ?>
                <?php } ?>

                <div class="inputSocialMedia"></div>

            </div>


            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </div>
        </div>
      <!-- </form> -->
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var x = 1;
    $(document).on('click', '.addSocialMedia', function() {
        x++;
        $(".inputSocialMedia").append(`

            <div class="input-group mb-3">

                <div class="form-group">
                  <input class="form-control" name="type[]" type="text" 
                    value="">
                </div>

                <div class="form-group">
                  <input class="form-control" name="link[]" type="text" 
                    value="">
                </div>

                <div class="form-group">
                  <div class="input-group-append">
                    <button type="button" class="removeSocialMedia btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                
            </div>`
        );
    });

    $(document).on('click', '.removeSocialMedia', function() {
      $(this).parent().parent('div').remove(); x--;
    });
  });
</script>

