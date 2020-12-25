$(document).ready(()=>{
  
  $('#tblRoles').DataTable({
		responsive: true,
		ajax: {
           "url": "/roles/datatable",
           "dataSrc": ""
       },
       columns: [
         { data : 'id'},
         { data: "name" },
         { data: "created_at" },
         { render : function(data, type, row , full) {
            return `
            <a href ="/roles/roles-assign-permissions/`+row.id+`"> <i class="typcn typcn-cog-outline"></i> </a>
            `;
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

});