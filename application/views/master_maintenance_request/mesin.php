<table id="" border="1" class="ExcelTableXP" style="width:100%; border-bottom: none">
    <thead>
        <tr>
            <th style="text-align:left !important;padding:2px">
                <button type="button" onclick="addRow()" title="Tambah Baris" class="btn btn-primary">Tambah</button>
            </th>
        </tr>
    </thead>
</table>

<div>
    <div style="width: 100%; max-height:500px; height:450px; overflow: auto; border:1px solid #ACA899; table-layout:fixed;">
        <table class="ExcelTableXP" border="1" style="border-left: none; border-right: none; width: 100%"
            id="MachineTable">
            <thead>
                <tr>
                    <th class="text-center" style="width:5%;">Kode Mesin</th>
                    <th class="text-center" style="width:5%;"></th>
                    <th class="text-center" style="width:10%;">Plant Name</th>
                    <th class="text-center" style="width:15%;">Equipment Name</th>
                    <th class="text-center" style="width:10%;">Volt</th>
                    <th class="text-center" style="width:10%;">Req Date</th>
                    <th class="text-center" style="width:35%;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($mtr_details)) { ?>
                    <tr>
                        <td>
                            <input type="hidden" class="no1" name="no[1]" id="no1" value="1" readonly>
                            <input type="hidden" class="id_mesin1" name="id_mesin[1]" id="id_mesin1" readonly>
                            <button type="button" 
                                onClick="getRowSelected(1)"
                                class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pick</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger"
                                onclick="deleteRowMachineTable(this)">Hapus</button>
                        </td>
                        <td>
                            <input type="text" name="plant_name[1]" id="plant_name1" style="width: 100%; border: none"
                                required readonly>
                        </td>
                        <td>
                            <input type="text" name="equipment_name[1]" id="equipment_name1" style="width: 100%; border: none"
                                required readonly>
                        </td>
                        <td>
                            <input type="text" name="nominal_curr[1]" id="nominal_curr1" style="width: 100%; border: none"
                                required readonly>
                        </td>
                        <td>
                            <input type="date" name="date[1]" id="date1" class="datepicker" style="width: 100%; border: none"
                                required >
                        </td>
                        <td>
                            <textarea name="remarks2[1]" id="remarks21" style="width: 100%; border: none"></textarea>
                        </td>
                    </tr>
                <?php } else { ?>
                    <?php foreach($mtr_details as $key => $mtr_detail) { ?>
                    <tr>
                        <td>

                            <input type="hidden" class="no<?= $mtr_detail->id; ?>" name="no[<?= $mtr_detail->id; ?>]" 
                                id="no<?= $mtr_detail->id; ?>" 
                                value="<?= $key+1; ?>" readonly>

                            <input type="hidden" class="id_mesin<?= $mtr_detail->id; ?>" 
                                name="id_mesin[<?= $mtr_detail->id; ?>]" 
                                id="id_mesin<?= $mtr_detail->id; ?>" readonly>

                            <button type="button" 
                                onClick="getRowSelected(<?= $key+1; ?>)"
                                class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pick</button>

                        </td>
                        <td>
                            <button type="button" class="btn btn-danger"
                                onclick="deleteRowMachineTable(this)">Hapus</button>
                        </td>
                        <td>
                            <input type="text" 
                                name="plant_name[<?= $mtr_detail->id; ?>]" 
                                id="plant_name<?= $mtr_detail->id; ?>" 
                                style="width: 100%; border: none"
                                value="<?= $mtr_detail->plant_name; ?>"
                                required readonly>
                        </td>
                        <td>
                            <input type="text" 
                                name="equipment_name[<?= $mtr_detail->id; ?>]" 
                                id="equipment_name<?= $mtr_detail->id; ?>" 
                                style="width: 100%; border: none"
                                value="<?= $mtr_detail->equipment_name; ?>"
                                required readonly>
                        </td>
                        <td>
                            <input type="text" 
                                name="nominal_curr[<?= $mtr_detail->id; ?>]" 
                                id="nominal_curr<?= $mtr_detail->id; ?>" 
                                style="width: 100%; border: none"
                                value="<?= $mtr_detail->nominal_curr; ?>"
                                required readonly>
                        </td>
                        <td>
                            <input type="date" 
                                name="date[<?= $mtr_detail->id; ?>]" 
                                id="date<?= $mtr_detail->id; ?>" class="datepicker" style="width: 100%; border: none"
                                value="<?= $mtr_detail->date; ?>"
                                required >
                        </td>
                        <td>
                            <textarea 
                                name="remarks2[<?= $mtr_detail->id; ?>]" 
                                id="remarks2<?= $mtr_detail->id; ?>" style="width: 100%; border: none"><?= $mtr_detail->remarks2; ?></textarea>
                        </td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Master Mesin</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

            <input type="hidden" id="rowSelected">

            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Plant name</th>
                            <th>Equipment name</th>
                            <th>Mc no</th>
                            <th>Install date</th>
                            <th>Matr</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>

<script>
    $(document).on('shown.bs.modal', function() { 
        $('#myTable').dataTable({
            "bDestroy": true,
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "ajax": {
                "url": "<?= base_url(); ?>master_mesin/datatable",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [
                {"data": "radio_button"},
                {"data": "no"},
                {"data": "plant_name"},
                {"data": "equipment_name"},
                {"data": "mc_no"},
                {"data": "install_date"},
                {"data": "matr"},
            ],
            columnDefs : [
                { "orderable": false, "targets": [0] },
            ],   
            "order": [],  
        });
    });
</script>

<script>
    $(document).on("click", ".radioButtonMasterMesin", function() { 
        var idMesin = $(this).val()
        var rowSelected = $('#rowSelected').val()
        $.get('<?= base_url(); ?>master_mesin/by_id/' + idMesin, function(data, status){
            var data = JSON.parse(data)

            $(`#no${rowSelected}`).val(rowSelected)
            $(`#id_mesin${rowSelected}`).val(data.id_mesin)
            $(`#plant_name${rowSelected}`).val(data.plant_name)
            $(`#equipment_name${rowSelected}`).val(data.equipment_name)
            $(`#nominal_curr${rowSelected}`).val(data.nominal_curr)
            $(`#date${rowSelected}`).val(data.date)
            $(`#remarks2${rowSelected}`).val(data.remarks2)
        });
    });
</script>

<script>
    function getRowSelected(row) {
        $('#rowSelected').val(row)
    }
</script>

<script>
    let click = 1;
    function addRow() {
        let index = click += 1;

        let assetTable = document.getElementById('MachineTable').tBodies[0];
        let lastRowIndex = assetTable.rows.length;
        let newRow = assetTable.insertRow(lastRowIndex)
        let cell1 = newRow.insertCell(0);
        let cell2 = newRow.insertCell(1);
        let cell3 = newRow.insertCell(2);
        let cell4 = newRow.insertCell(3);
        let cell5 = newRow.insertCell(4);
        let cell6 = newRow.insertCell(5);
        let cell7 = newRow.insertCell(6);

        cell1.innerHTML = `<input type="hidden" class="no${index}" name="no[${index}]" 
                                id="no${index}" 
                                value="${lastRowIndex + 1}" readonly>

                            <input type="hidden" class="id_mesin${index}" 
                                name="id_mesin[${index}]" 
                                id="id_mesin${index}" readonly>
                                
                            <button type="button"
                                onClick="getRowSelected(${index})"
                                class="btn btn-primary" data-toggle="modal" data-target="#myModal">Pick</button>`;

        cell2.innerHTML = `<button type="button" class="btn btn-danger" onclick="deleteRowMachineTable(this)">Hapus</button>`;

        cell3.innerHTML = `<input type="text" 
                            name="plant_name[${index}]" 
                            id="plant_name${index}" 
                            style="width: 100%; border: none"
                            required readonly>`;

        cell4.innerHTML = ` <input type="text" 
                            name="equipment_name[${index}]" 
                            id="equipment_name${index}" 
                            style="width: 100%; border: none;"
                            required readonly>`;

        cell5.innerHTML = ` <input type="text" 
                            name="nominal_curr[${index}]" 
                            id="nominal_curr${index}" 
                            style="width: 100%; border: none;"
                            required readonly>`;

        cell6.innerHTML = `<input type="date" 
                            name="date[${index}]" 
                            id="date${index}" 
                            class="datepicker"
                            style="width: 100%; border: none"
                            required>`

        cell7.innerHTML = ` <textarea name="remarks2[${index}]" id="remarks2${index}" style="width: 100%; border: none"></textarea> `;
    }
</script>

<script>
    function deleteRowMachineTable(row) {
        var d = row.parentNode.parentNode.rowIndex;
        document.getElementById('MachineTable').deleteRow(d);
    }
</script>