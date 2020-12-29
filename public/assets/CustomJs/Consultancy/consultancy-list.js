$(document).ready(()=>{
  
  $('#tblFormulation').DataTable({
    responsive: true,
    ajax: {
           "url": "/skincare/formulation/datatable",
           "dataSrc": ""
       },
       columns: [
         { data : 'id'},
         { data: "formulation_name"},
         { data: "ingredient_name" },
         { data: "quantity" },
         { data: "equipment_used" },
         { data: "procedure" },
         { data: "container_used" },
         { data: "label_type_used" },
         { data: "pack_size" },
        { render : function(data, type, row , full) {
            // console.log(row)
              return `
              <div class="glyph">
                  <a href="/skincare/formulation/`+row.id+`/edit"> <i class="typcn typcn-edit"></i> </a>
                  <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#" onclick="deleteFormulation('`+row.id+`')"> <i class="typcn typcn-trash"></i> </a>
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
      $formulationId = $("#formulationId").val();
      console.log($formulationId)

         $.ajax({
          url: '/skincare/formulation/'+$formulationId,
          type: 'DELETE',
          data: data,
          processData: false,

          success: (response)=>{

              if (response.status == 'true') {

                  $.notify(response.message , 'success'  );
                  window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/formulation";

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

  function deleteFormulation(id) {
    $("#deleteModel").modal('show');
    $("#formulationId").val(id);
  }