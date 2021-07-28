<form id="formMachineTable">

    <!-- jika form tambah value nya harus direplace setelah mtr head success simpan, kalau form edit tidak usah -->
    <input type="hidden" name="id_mtr_head" id="id_mtr_head" value="<?= empty($id_mtr) ? null : $id_mtr; ?>">

    <table id="" border="1" class="ExcelTableXP" style="width:100%; border-bottom: none">
        <thead>
            <tr>
                <th style="text-align:left !important;padding:2px">
                    <button type="button" onclick="addRow()" title="Tambah Baris" class="btn btn-primary">Tambah</button>
                    <button type="submit" title="Simpan" id="simpanMachineTable" class="btn btn-primary">Simpan</button>
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
                        <th class="text-center" style="width:15%;">Kode Mesin</th>
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
                                <input type="hidden" 
                                    class="no1"
                                    name="no[1]" id="no1" 
                                    value="1" 
                                    readonly
                                    style="text-align:center; border: none; width: 100%;">

                                <select class="id_mesin" onchange="onChangeMasterMesin(1, this)" name="id_mesin[1]"
                                    id="id_mesin1" style="width: 100%; height: 27px" required>
                                </select>
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
                                <input type="hidden" 
                                    class="no<?= $mtr_detail->id; ?>"
                                    name="no[<?= $mtr_detail->id; ?>]" id="no<?= $mtr_detail->id; ?>" 
                                    value="<?= $key+1; ?>" 
                                    readonly
                                    style="text-align:center; border: none; width: 100%;">

                                <select class="id_mesin" 
                                    onchange="onChangeMasterMesin(<?= $mtr_detail->id; ?>, this)" 
                                    name="id_mesin[<?= $mtr_detail->id; ?>]"
                                    id="id_mesin<?= $mtr_detail->id; ?>" 
                                    style="width: 100%; height: 27px" required>
                                    <option value="<?= $mtr_detail->id_mesin; ?>"><?= $mtr_detail->kode_mesin . ' - ' . $mtr_detail->equipment_name; ?></option>
                                </select>
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
</form>

<script>
    $(document).ready(function() {    
        loadSelect2(-1);

        $('#formMachineTable').submit(function(e) {
            e.preventDefault();
            let url  = "<?= empty($id_mtr) ? base_url() . 'maintenance_request_detail/store' : base_url() . 'maintenance_request_detail/update'; ?>" 
            let form = $(this).serialize();

            $.ajax({ 
                url: url,
                type: 'post',
                data: form,
                success: function(result) {
                    res = JSON.parse(result)
                    console.log(res)
                    if(res === true) {
                        alert('berhasil simpan data')
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                   console.log(errorThrown)
                }
		    })
        })
    });
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

        cell1.innerHTML = `
                        <input type="hidden" 
                                class="no${index}"
                                name="no[${index}]" id="no${index}" 
                                value="${lastRowIndex + 1}" 
                                readonly
                                style="text-align:center; border: none; width: 100%";>

                        <select class="id_mesin${index}"
                            onchange="onChangeMasterMesin(${index}, this)"
                            name="id_mesin[${index}]" 
                            id="id_mesin${index}" 
                            style="width: 100%;"
                            required>
                        </select>`;

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
        loadSelect2(index);
    }

    function loadSelect2(index){
        console.log(index)
        var id_mesin;

        if (index == -1) {
            id_mesin = $(`.id_mesin`)
        } else {
            id_mesin = $(`.id_mesin${index}`)
        }

        id_mesin.select2({
            // allowClear: true,
            // placeholder: "Pilih data",
            ajax: {
                url: '<?php echo base_url(); ?>master_mesin/select2',
                dataType: 'json',
                type: 'GET',
                delay: 250,
                processResults: function (data){
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: ` ${item.kode_mesin} - ${item.equipment_name} `,
                                id: item.id_mesin
                            }
                        })
                    };
                },
            }
        });
    }

    function onChangeMasterMesin(index, field) {

        var id_master_mesin_selected = field.value ? field.value : 0;

        $.get(`<?php echo base_url(); ?>master_mesin/by_id/${id_master_mesin_selected}`, function(data, status){
            var response = JSON.parse(data)
            // console.log('response ', response)

            $(`#id_mesin${index}`).val(response.id_mesin);
            $(`#plant_name${index}`).val(response.plant_name);
            $(`#equipment_name${index}`).val(response.equipment_name);
            $(`#nominal_curr${index}`).val(response.nominal_curr);
            $(`#date${index}`).val(response.date);
            $(`#remarks2${index}`).val(response.remarks2);
        });
    }

    function deleteRowMachineTable(row) {
        var d = row.parentNode.parentNode.rowIndex;
        document.getElementById('MachineTable').deleteRow(d);
    }
</script>