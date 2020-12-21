$(document).ready(()=>{
  
  $('#tblEquipment').DataTable({
		responsive: true,
		ajax: {
           "url": "/skincare/inventory/equipment/datatable",
           "dataSrc": ""
       },
       columns: [
         { data : 'id'},
        //  {
        //     render: function (data, type, full, meta) {
        //         return (
        //             full.user.first_name+' '+full.user.last_name
        //         );
        //     },
        // },
         { data: "quipment_name" },
         { data: "equipment_number" },
         { data: "functional_status" },
         { data: "hours_used" },

          { data: "start_time" },
         { data: "end_time" },
         { data: "maintenance_date" },
         { data: "due_date" },
        { render : function(data, type, row , full) {
          // console.log(row)
            return `
            <div class="glyph">
                <a href="/skincare/inventory/equipment/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteBatch('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
            </div>


            `
           }
         },
       //   { render : function(data, type, row) {
       //     return `
       //             <label class="custom-control custom-checkbox mb-1 align-self-center data-table-rows-check">
       //                 <input type="checkbox" class="custom-control-input">
       //                 <span class="custom-control-label">&nbsp;</span>
       //             </label>
       //     `
       // }
       //     },
       ],
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		},

    "rowCallback": function (nRow, aData, iDisplayIndex) {
     var oSettings = this.fnSettings ();
     $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
     return nRow;
     },
     
	});

  // ******************** ******************************* confirm delete ajax **********************


  $('#deleteData').on('submit' , function(event){
    event.preventDefault();
    var data = $("#deleteData").serialize();
    $quipmentId = $("#quipmentId").val();
    console.log($quipmentId)

       $.ajax({
        url: '/skincare/inventory/equipment/'+$quipmentId,
        type: 'DELETE',
        data: data,
        processData: false,

        success: (response)=>{
            
            if (response.status == 'true') {

                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/inventory/equipment";

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

    });

});
function deleteBatch(id) {
  $("#deleteModel").modal('show');
  $("#quipmentId").val(id);
}