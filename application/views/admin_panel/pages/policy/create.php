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

      <?php echo form_open_multipart($this->uri->segment(1) .'/'. $this->uri->segment(2) . '/update'); ?>
      <!-- <form class="forms-sample"> -->
        <input type="hidden" name="id" value="<?php echo isset($value->id) ? $value->id : ''; ?>">
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
            <label>Image Header</label>
            <div class="mb-3">
                <div class="input-group col-xs-12">
                <input type="file" name="image_header" id="image_header" class="form-control file-upload-info" placeholder="Upload Image">
                </div>
            </div>
            </div>

            <input type="hidden" name="image_header_hidden" value="<?php echo isset($value->image_header) ? $value->image_header : ''; ?>">
            <?php if(isset($value->image_header)) { ?>
            <div class="form-group">
                <div class="mb-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo base_url() . 'uploads/policy/' . $value->image_header ; ?>" 
                            alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><?php echo $value->image_header; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            <div class="form-group">
              <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                  value="<?php echo isset($value->title) ? $value->title : ''; ?>">
              </div>
            </div>
            
            <div class="form-group">
              <div class="mb-3">
                <label for="sub_title">Sub Title</label>
                <input type="text" class="form-control" id="sub_title" name="sub_title"
                  value="<?php echo isset($value->sub_title) ? $value->sub_title : ''; ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control ckeditor" id="description" name="description" rows="2"><?php echo isset($value->description) ? $value->description : ''; ?></textarea>
              </div>
            </div>

            <!-- <div class="form-group">
              <label>Image Footer</label>
              <div class="mb-3">
                <div class="input-group col-xs-12">
                  <input type="file" name="image_footer" id="image_footer" class="form-control file-upload-info" placeholder="Upload Image">
                </div>
              </div>
            </div> -->

            <!-- <input type="hidden" name="image_footer_hidden" value="<?php echo isset($value->image_footer) ? $value->image_footer : ''; ?>">
            <?php if(isset($value->image_footer)) { ?>
            <div class="form-group">
              <div class="mb-3">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?php echo base_url() . 'uploads/policy/' . $value->image_footer ; ?>" 
                    alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text"><?php echo $value->image_footer; ?></p>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?> -->

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </div>
        </div>
      <!-- </form> -->
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
