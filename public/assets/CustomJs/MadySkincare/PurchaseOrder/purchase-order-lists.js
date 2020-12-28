
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
           { render : function(data, type, row , full) {
            // console.log(row.)
            if(row.user == null || row.user == undefined){
              return 'Not Approved Yet'
            }else{
              return row.user.first_name+ ' '+row.user.last_name;

            }
             }
           },
           { data: "order_procurement_by" },
           { data: "order_receiving_date" },
           { data: "order_status" },
           { render : function(data, type, row , full) {
            // console.log(row)
              return `
              <div class="glyph">
                  <a href="/skincare/inventory/batch/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                  <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteTrndAnalysis('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
              </div>


              `
             }
           },

           { render : function(data, type, row) {
            
             return `
                     <select class="form-control" name="change_status" id="change_status`+row.id+`" data-value="`+row.id+`" >             
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
         var api = this.api();
  
        // console.log( api.rows( {page:'current'} ).data() );
        $.each(api.rows( {page:'current'} ).data()  , (index , value )=>{
        console.log(value.id)
         // $("#change_status: selected").val(value.order_status)
        // console.log("#change_status"+value.id)
        // console.log($("#change_status1").val('APPROVE') )
        $('#change_status1 option').val('APPROVE').prop('selected', true)
       //  console.log($("#change_status1 option[value=APPROVE]").attr("selected", true) )
       // console.log ( document.querySelector("#change_status1 option[value='APPROVE']").setAttribute('selected',true) )

        })
        // $("#change_status").val(api.rows( {page:'current'} ).data()[0]['order_status'])
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
      $batchId = $("#batchId").val();
      console.log($batchId)

         $.ajax({
          url: '/skincare/costing/'+$batchId,
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


  function deleteTrndAnalysis(id) {
    $("#deleteModel").modal('show');
    $("#batchId").val(id);
  }
