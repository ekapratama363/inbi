<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
      
    <form id="formPrintOrMutlipleDelete" action="<?php echo base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2); ?>/print_or_multiple_delete" method="post">  
            
        <div class="card-header">
            <div class="grid-margin">
                <!-- for type submit delete or print -->
                <input type="hidden" name="type" id="type">
                <a href="<?php echo base_url() . $this->uri->segment(1) .'/'. $this->uri->segment(2); ?>/create" 
                class="btn btn-primary" title="Create">
                    <i class="fa fa-plus"></i></a>
            
                <button id="deleteAll" type="button" class="btn btn-danger" title="Multiple Delete"
                name="multiple_delete"><i class="fa fa-trash"></i></button>

                <!-- <button id="printAll" type="button" class="btn btn-success" title="Multiple Print" 
                name="multiple_print">
                <i class="fa fa-file-pdf-o"></i></button> -->
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%"><input type="checkbox" id="checkAll" class="customcheck"></th>        
                            <th style="width: 5%">No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <!-- <th>Icon</th> -->
                            <!-- <th>Category</th> -->
                            <th>Image</th>
                            <th>Other Image</th>
                            <th>Other Image</th>
                            <!-- <th>Page</th> -->
                            <th style="width: 5%">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </form>
  </div>
</div>
<!-- Data Table -->
<script>
    $(document).ready(function(){
        $('#myTable').dataTable({
            // "scrollY": "400px",
            // "scrollX": "700px",
            // "scrollX": true,
            //"scrollCollapse": true,
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            // "responsive": true,
            // "scrollCollapse": true,
            // "columnDefs": [    
            //    {                                 
            //        "targets": '_all',
            //        "render": $.fn.dataTable.render.text()
            //    }    
            //  ], 
            //"scrollCollapse": true,
            "ajax": {
                "url": "<?php echo base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2); ?>/datatable",
                "dataType": "json",
                "type": "POST",
                // "data": {
                //     _token: "{{csrf_token()}}",
                // }
            },
            "columns": [
                {"data": "check_box"},
                {"data": "no"},
                {"data": "title"},
                {"data": "description"},
                // {"data": "product_categories"},
                {"data": "image"},
                {"data": "other_image_1"},
                {"data": "other_image_2"},
                {"data": "action"},
            ],
            columnDefs : [
                // { 
                //     "className": "invoice", 
                //     "targets" : [0, 3],//first column / numbering column
                // }
                { "orderable": false, "targets": [0] },
                // { "orderable": true, "targets": [1, 2, 3] }
            ],   
            "order": [],  

        });

    });
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    /* Get the checkboxes values based on the class attached to each check box */
    $("#deleteAll").click(function() {
        getValueUsingClassDelete();

        // console.log(getValueUsingClassDelete());
    });
    $("#printAll").click(function() {
        getValueUsingClassPrint();

        // console.log(getValueUsingClassPrint());
    });
			
    function getValueUsingClassDelete(){
        // type for submit delete
        $("#type").val("delete");

        /* declare an checkbox array */
        let chkArray = [];
        
        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".checkboxes:checked").map(function() {
            chkArray.push($(this).val());
        });
        
        /* we join the array separated by the comma */
        let selected;
        selected = chkArray.join(',') ;
        
        /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
        if(selected.length > 0){
            let act = confirm('Are you sure delete this data?');
            (act === true) ? formFunction() : false;
        }else{
            return alert("Please at least check one of the checkbox");	
        }

		function formFunction() {
		    document.getElementById("formPrintOrMutlipleDelete").submit();
		}
    } 

    function getValueUsingClassPrint(){
        // type for submit print
        $("#type").val("print");

        /* declare an checkbox array */
        let chkArray = [];
        
        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".checkboxes:checked").map(function() {
            chkArray.push($(this).val());
        });
        
        /* we join the array separated by the comma */
        let selected;
        selected = chkArray.join(',') ;
        
        /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
        if(selected.length == 0) {
            return alert("Please at least check one of the checkbox");	
        } else {
            formFunction()
        }

		function formFunction() {
		    document.getElementById("formPrintOrMutlipleDelete").submit();
		}
    } 
</script>


