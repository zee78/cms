
// ********* providde convenient CSRF protection for your AJAX based applications *****
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(()=>{

 


   var table = $('#tblOrder').DataTable({
          responsive: true,
          ajax: {
             "url": "/skincare/purchase-order/datatable",
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
           { data: "order_id" },
           { data: "order_type" },
           { data: "order_placed_by" },
           { data: "order_date" },
           { data: "vendor.vendor_name" },
           { data: "cost" },
           { data: "approve_by" },
           { data: "order_procurement_by" },
           { data: "order_receiving_date" },
           { data: "order_status" },
           { render : function(data, type, row , full) {
            // console.log(row)
              return `
              <div class="glyph">
                  <a href="/skincare/purchase-order/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                  <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteTrndAnalysis('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
              </div>


              `
             }
           },

           { render : function(data, type, row) {
            
             return `
                     <select class="form-control select2" name="change_status" id="change_status" data-value="`+row.id+`" >
                          <option>Select Status</option> 
                          <option value="PENDING">PENDING</option>              
                          <option value="APPROVE">APPROVE</option>              
                  </select>
             `
         }
             },
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
       "drawCallback": function( settings ) {
        // this.columns(0).visible(false);
        //  var api = this.api();
        //  console.log(api.columns( 0 ) )
        // // Output the data for the visible rows to the browser's console
        // console.log( api.rows( {page:'current'} ).data() );
      }

      });

   // **************************** hide and display user data ***********************

   if (typeof role === 'undefined') {
        table.columns(12).visible(false);
   }


   // *******************************************************************************


    //     // Toggle the visibility
    //     column.visible( ! column.visible() );

    // ********************** change status ******************************

    $(document).on("change", "select[name='change_status']", function(){
     // console.log(this.value);
     // console.log($(this).data("value"))

      $.ajax({
        url: '/skincare/purchase-order/change-order-status',
        type: 'POST',
        data: {orderStatus: this.value , orderId: $(this).data("value")},
        // contentType: false,
        // processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
              $('#tblOrder').DataTable().ajax.reload();

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })
})


    // ******************** ******************************* confirm delete ajax **********************


    $('#deleteData').on('submit' , function(event){
      event.preventDefault();
      var data = $("#deleteData").serialize();
      $purchaseId = $("#purchaseId").val();
      console.log($purchaseId)

         $.ajax({
          url: '/skincare/purchase-order/'+$purchaseId,
          type: 'DELETE',
          data: data,
          processData: false,

          success: (response)=>{

              if (response.status == 'true') {

                  $.notify(response.message , 'success'  );
                  window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/purchase-order";

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


  function deleteTrndAnalysis(id) {
    $("#deleteModel").modal('show');
    $("#purchaseId").val(id);
  }
