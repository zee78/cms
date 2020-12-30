$(document).ready(()=>{
  
  var table = $('#tblGlassWare').DataTable({
		responsive: true,
		ajax: {
           "url": "/skincare/inventory/glasssware/datatable",
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
         { data: "glassware_name" },
         { data: "stock_in_hand" },
         { data: "breakge" },
         { data: "responsible_person" },
         { render : function(data, type, row , full) {
            return `
            <div class="glyph">
                <a href="/skincare/inventory/glasssware/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteGlassware('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
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
  // **************************** hide and display user data ***********************
    if (typeof role === 'undefined') {
        table.columns(5).visible(false);
    }
  // *******************************************************************************
  // ******************** ******************************* confirm delete ajax **********************


  $('#deleteData').on('submit' , function(event){
    event.preventDefault();
    var data = $("#deleteData").serialize();
    $glasswarelId = $("#glasswarelId").val();
    console.log($glasswarelId)

       $.ajax({
        url: '/skincare/inventory/glasssware/'+$glasswarelId,
        type: 'DELETE',
        data: data,
        processData: false,

        success: (response)=>{
            
            if (response.status == 'true') {

                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/inventory/batch";

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
function deleteGlassware(id) {
  $("#deleteModel").modal('show');
  $("#glasswareId").val(id);
}