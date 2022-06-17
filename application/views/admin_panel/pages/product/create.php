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

      <?php echo form_open_multipart(base_url() . $this->uri->segment(1) .'/'. $this->uri->segment(2) .'/'. $this->uri->segment(3) . '/store'); ?>
      <!-- <form class="forms-sample"> -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                  value="<?php echo set_value('title'); ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control ckeditor" id="description" name="description" rows="2"><?php echo set_value('description'); ?></textarea>
             </div>
            </div>
            <div class="form-group">
              <div class="mb-3">
                <label>Image</label>
                <div class="input-group col-xs-12">
                  <input type="file" name="image" id="image" class="form-control file-upload-info" placeholder="Upload Image" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3">
                <label>Category</label>
                
                <select class="form-control" name="category[]" id="category" required>
                </select>
            </div>
            </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="<?php echo base_url() . $this->uri->segment(1) .'/'. $this->uri->segment(2) .'/'. $this->uri->segment(3); ?>/index"><button type="button" 
                  class="btn btn-light">Cancel</button></a>
            </div>
          </div>
        </div>
      <!-- </form> -->
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $("#category").select2({
          // placeholder: 'Choose Category',
          width: '100%',
          multiple:true,
          // allowClear: true,
          ajax: {
            url:  "<?php echo base_url() . $this->uri->segment(1) .'/'. $this->uri->segment(2) .'/'. $this->uri->segment(3) ; ?>/ajax_product_category",
            dataType: 'json',
            type: 'GET',
            delay: 250,
            processResults: function (data) {
            // console.log(data);
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.category,
                            id: item.id
                        }
                    })
                }
            }
          }
        })
    });
</script>