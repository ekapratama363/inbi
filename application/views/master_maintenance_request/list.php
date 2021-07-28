<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4>Maintenance Request</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Advanced</li>
                            </ol>
                    </div>
                </div>
               
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary mb-3" type="button" href="<?= base_url() ;?>maintenance_request/tambah"><i class="fas fa-plus"></i> Create</a>

                            <div class="table-responsive">
                                <table id="tableMTR" class="table mb-0">
                                    <thead style="font-size:11px;">
                                        <tr>
                                            <th>No Bukti MTR</th>
                                            <th>Status</th>
                                            <th>Kode Machine</th>
                                            <th>Nama Machine</th>
                                            <th>Requester</th>
                                            <th>Tanggal</th>
                                            <th>No Bukti WO</th>
                                            <th>Closed By</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 11px;">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->   

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

<!-- Right Panel -->
<script type="text/javascript" src="<?php echo base_url('js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('datatables/datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('datatables/lib/js/dataTables.bootstrap.min.js') ?>"></script>

<script>
var tabel = null;

$(document).ready(function() {
tabel = $('#tableMTR').DataTable({
    "processing": true,
    "serverSide": true,
    "ordering": true, // Set true agar bisa di sorting
    "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
    "ajax":
    {
        "url": "<?php echo base_url('index.php/Maintenance_request/view') ?>", // URL file untuk proses select datanya
        "type": "POST"
    },
    "deferRender": true,
    "aLengthMenu": [[10, 30, 50],[ 10, 30, 50]], // Combobox Limit
    "columns": [
        { "data": "no_bukti_mtr" }, // Tampilkan nis
        { "render": function ( data, type, row ) {  // Tampilkan jenis kelamin
                var html = ""

                if(row.status == 'Open')
                { // Jika jenis kelaminnya 1
                    html = '<span style="color:white;background-color:grey;font-size:10px;" class="badge">Open</span>' // Set laki-laki
                }
                else if(row.status == 'Progress')
                { // Jika bukan 1
                    html = '<span style="color:white;background-color:blue;font-size:10px;" class="badge">Progress</span>' // Set perempuan
                }
                else if(row.status == 'Pending')
                { // Jika bukan 1
                    html = '<span style="color:white;background-color:red;font-size:10px;" class="badge">Pending</span>' // Set perempuan
                }
                else if(row.status == 'Complete')
                { // Jika bukan 1
                    html = '<span style="color:white;background-color:green;font-size:10px;" class="badge">Complete</span>' // Set perempuan
                }
                else if(row.status == 'Close')
                { // Jika bukan 1
                    html = '<span style="color:white;background-color:#7CFC00;font-size:10px;" class="badge">Close</span>' // Set perempuan
                }
                else if(row.status == 'Waiting')
                { // Jika bukan 1
                    html = '<span style="color:white;background-color:black;font-size:10px;" class="badge">Waiting</span>' // Set perempuan
                }
                else if(row.status == 'Hold')
                { // Jika bukan 1
                    html = '<span style="color:white;background-color:#D2691E;font-size:10px;" class="badge">Hold</span>' // Set perempuan
                }
                else if(row.status == '')
                { // Jika bukan 1
                    html = '<span style="color:white;background-color:#330000;font-size:10px;" class="badge">None</span>' // Set perempuan
                }
                return html; // Tampilkan jenis kelaminnya
            }
        },
        { "data": "kode_machine" }, // Tampilkan telepon
        { "data": "nama_machine" }, // Tampilkan telepon
        { "data": "pic_requester" }, // Tampilkan alamat
        { "data": "tgl_req" }, // Tampilkan alamat
        { "data": "no_bukti_wo" }, // Tampilkan alamat
        { "data": "user_closed" }, // Tampilkan alamat
        { "data": "id_mtr",
            "render": 
            function( data, type, row, meta ) 
            {

                var html = '<a type="button" class="btn btn-success btn-sm" href="maintenance_request/edit/'+data+'"><i class="fas fa-pencil-alt"></i></a> '
                html +=  '<a type="button" class="btn btn-danger btn-sm" href="edit/'+data+'"><i class="fa fa-ban"></i></a>'

                return html
                //return '<a class="btn btn-primary" style="width:5px;height:5px;" href="edit/'+data+'">Edit</a>';
            }
        },
    ],
});
});
</script>