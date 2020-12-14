$(document).ready(()=>{
  
  $('#tblFunder').DataTable({
    responsive: true,
    ajax: {
           "url": "/research/funders-datatable",
           "dataSrc": ""
       },
       columns: [
         { data : 'id'},
         { data: "funding_organization_name"},
         { data: "website" },
         { data: "email" },
         { data: "phoneNo" },
         { data: "team_lead" },
         { data: "funder_status" },
         { data: "response" }
        //  { render : function(data, type, row , full) {
        //     return `
        //     <div class="glyph">
        //         <a href="/roles/assign-permissions/`+row[0]+`"> <i class="glyph-icon iconsminds-tag primary"></i> </a>
        //     </div>
        //     `
        // }
        //     },
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

});