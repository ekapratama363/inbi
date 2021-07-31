




<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <form id="maintenanceRequest">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                </div>

                                <h4 class="card-title" style="text-align: left;">Maintenance Request</h4>
                                <hr>
                                </br>

                                    <div class="mb-3">
                                        <label class="form-label">Nomor Maintenance Request</label>
                                        <input type="text" class="form-control" id="kode_ddi_mtr" name="kode_ddi_mtr">
                                        <input type="hidden" class="form-control" id="type" name="type" value="1">
                                    </div>  
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Ditujukan Untuk</label>
                                                <div class="input-group">
                                                    
                                                    <input type="text" class="form-control" id="kode_dept" name="kode_dept" placeholder="Masukkan tujuan department ...">
                                                    
                                                    <a type="button" class="btn btn-success btn-sm" href="maintenance_request/edit/'+data+'"><i class="fas fa-search" style="margin-top: 5px;"></i></a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Department</label>
                                                <input type="text" class="form-control" id="nama_dept" name="nama_dept" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Kode Machine</label>
                                                <div class="input-group">
                                                    
                                                    <input type="text" class="form-control" id="kode_machine" name="kode_machine" placeholder="Masukkan kode mesin ...">
                                                    
                                                    <a type="button" class="btn btn-success btn-sm" href="maintenance_request/edit/'+data+'"><i class="fas fa-search" style="margin-top: 5px;"></i></a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Machine</label>
                                                <input type="text" class="form-control" id="nama_machine" name="nama_machine" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Machine Number</label>
                                                <div class="input-group">
                                                    
                                                    <input type="text" class="form-control" id="merk_machine" name="merk_machine"  readonly>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Lokasi Machine</label>
                                                <input type="text" class="form-control" id="allocation" name="allocation" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Permintaan</label>
                                        <div class="col-md-12">
                                            <input class="form-control" type="date" id="datepicker" name="datepicker">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Detail Permasalahan</label>
                                        <div>
                                            <textarea name="remarks" id="remarks" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-0">
                                        <div>
                                            <button type="submit" id="btn_simpan" class="btn btn-primary waves-effect waves-light me-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <?php $this->load->view('master_maintenance_request/mesin'); ?>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() 
    {
        $("#maintenanceRequest").submit(function(e) {
            e.preventDefault();

            var form = $("form").serialize();

            var kode_ddi_mtr = $('#kode_ddi_mtr').val();
            var kode_dept = $('#kode_dept').val();

            if (kode_ddi_mtr == '') 
            {
                alert("Nomor dokumen MTR tidak boleh kosong.....!");
                return false;
            } 

            i = confirm('Apakah ingin simpan data ini ?');

            if (i==false) 
            {
                return false;
                   
            }

            else
            {
                if(kode_ddi_mtr != "" && kode_dept != "")
                {
                    $("#btn_simpan").attr("disabled", "disabled");
                    $.ajax(
                    {
                        url: "<?php echo base_url("Maintenance_request/simpan_ajax");?>",
                        type: "POST",
                        data: form,
                        cache: false,
                        success: function(dataResult)
                        {
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200)
                            {
                                $("#btn_simpan").attr("disabled");
                                $('#fupForm').find('input:text').val('');
                                alert('Simpan berhasil dengan No. Bukti : ' + dataResult.no_bukti_mtr + '.');
                                window.location.href="<?php echo base_url(); ?>Maintenance_request";                        
                            }
                            else if(dataResult.statusCode!=200)
                            {
                               alert(dataResult.message);
                            }
                        }
                    });
                }
                else
                {
                    alert('Please fill all the field !');
                }
            }
        });
    });
</script>
