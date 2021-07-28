<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Maintenance Request</h4>
                            <p class="card-title-desc">Fancy and customizable colorpicker plugin for Twitter Bootstrap.</p>

                            <form action="#">
                                <div class="mb-3">
                                    <label class="form-label">ID Maintenance Request</label>
                                    <input type="text" class="form-control" id="id_mtr" name="id_mtr" value="<?= $id_mtr ;?>" readonly>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">No Bukti Maintenance Request</label>
                                        <input type="text" class="form-control" id="no_bukti_mtr" name="no_bukti_mtr" value="<?= $no_bukti_mtr ;?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kode Machine</label>
                                            <input type="text" class="form-control" id="kode_machine" value="<?= $kode_machine ;?>">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Center modal</button>
                                             <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Center modal</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Machine</label>
                                            <input type="text" class="form-control" id="nama_machine" value="<?= $nama_machine ;?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Toggle Palette Only</label>
                                    <input type="text" class="form-control" id="colorpicker-togglepaletteonly" value="#7a6fbe">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Show Initial</label>
                                    <input type="text" class="form-control" id="colorpicker-showintial" value="#f5b225">
                                </div>
                                <div>
                                    <label class="form-label">Show Input And Initial</label>
                                    <input type="text" class="form-control" id="colorpicker-showinput-intial" value="#ec536c">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>