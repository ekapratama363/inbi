<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
        <div class="card-header">
        
            <form id="formPrintOrMutlipleDelete" action="#" method="post">   
                <div class="grid-margin">
                    <!-- for type submit delete or print -->
                    <input type="hidden" name="type" id="type">
                    <a href="<?php echo base_url() . $this->uri->segment(1) .'/'. $this->uri->segment(2) . '/' . $this->uri->segment(3) ; ?>/create" 
                    class="btn btn-primary" title="Create">
                        <i class="fa fa-plus"></i></a>
                </div>
            </form>
        </div>
                  
        <div class="card-body">
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <!-- <th style="width: 5%"><input type="checkbox" id="checkAll" class="customcheck"></th>         -->
                            <th style="width: 5%">No</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
      
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>assets/vendors/jquery/jquery.min.js"></script>

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
                "url": "<?php echo base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3); ?>/datatable",
                "dataType": "json",
                "type": "POST",
                // "data": {
                //     _token: "{{csrf_token()}}",
                // }
            },
            "columns": [
                // {"data": "check_box"},
                {"data": "no"},
                {"data": "category"},
                {"data": "description"},
                {"data": "image"},
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


