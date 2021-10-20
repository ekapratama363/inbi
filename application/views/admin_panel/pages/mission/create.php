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
              <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                  value="<?php echo isset($value->title) ? $value->title : ''; ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="2"><?php echo isset($value->description) ? $value->description : ''; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="mb-3">
                <label for="mission">Mission</label>

                <div class="input-group mb-3">
                    <input class="form-control" name="missions[]" type="text" 
                      value="<?php echo (is_array($value->missions)) ? $value->missions[0] : null ?>">
                    
                    <div class="input-group-append">
                        <button type="button" class="addMission btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <?php if(is_array($value->missions)) { ?>
	  							<?php for($x = 1; $x<count($value->missions); $x++) { ?>
                    <div class="input-group mb-3">
                        <input class="form-control" name="missions[]" type="text" value="<?php echo $value->missions[$x] ?>">
                        <div class="input-group-append">
                          <button type="button" class="removeMission btn btn-danger"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                  <?php } ?>
                <?php } ?>

                <div class="inputVission"></div>

              </div>
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
    $(document).on('click', '.addMission', function() {
        x++;
        $(".inputVission").append(`
            <div class="input-group mb-3">
                <input class="form-control" name="missions[]" type="text" value="">
                <div class="input-group-append">
                  <button type="button" class="removeMission btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
            </div>`
        );
    });

    $(document).on('click', '.removeMission', function() {
      $(this).parent().parent('div').remove(); x--;
    });
  });
</script>
