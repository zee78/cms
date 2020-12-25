$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(()=>{
// console.log(rolePermissions);

    $('#tblAssignPermissions').DataTable({
        "responsive": true,
        "ajax": {
        	url: "/permissions/datatable",
        	dataSrc: ""
        },
        "columns":[
           {data : "name"},
           { 
            "render": function ( data, type, row ) {
              return `
                    <div class="text-center">
                        <input type="checkbox" name='permissions' onchange="getCheckedPermissionsVal('`+row.id+`' , '`+row.name+`')" class="chkbGiveTakePermission" id="`+row.id+`" value="`+row.id+`">
                    </div>
                        `;
            
                }
          },
          
        ],
      language: {
        "searchPlaceholder": 'Search...',
        "sSearch": '',
        "lengthMenu": '_MENU_ items/page',
     },
     drawCallback: function () {
        $("input:checkbox[name=permissions]").each(function () {

            for (let i = 0; i < rolePermissions.length; i++) {
                if($(this).attr('id') == rolePermissions[i].id){
                    $("#"+$(this).attr('id')).prop('checked' , true);
                }
                
            }
        }); 
        
     },
    
    });

});


// ********************************** get checked permissions **************

function getCheckedPermissionsVal($id , $value) {
    $roleId = $("#role").val();
    // console.log($roleId);s
    // console.log($roleId);
    if($("#"+$id).is(":checked")){
        $.ajax({
            url: '/roles/roles-assign-permissions-to-role',
            type: 'POST',
            data: {role: $roleId , permission: $value , status: 'checked'},
        
    
            success: (response)=>{
                // if (response.status == 'true') {
                //     $.notify(response.message , 'success'  );
                // }else{
                //     $.notify(response , 'error');
    
                // }
            },
            error: (errorResponse)=>{
            //   console.log(errorResponse);
            //     $.notify(response.errorInfo , 'error'  );
    
    
            }
        })
    }else{
        $.ajax({
            url: '/roles/roles-assign-permissions-to-role',
            type: 'POST',
            data: {role: $roleId , permission: $value , status: 'unchecked'},
        
    
            success: (response)=>{
                // if (response.status == 'true') {
                //     $.notify(response.message , 'success'  );
                // }else{
                //     $.notify(response , 'error');
    
                // }
            },
            error: (errorResponse)=>{
            //   console.log(errorResponse);
            //     $.notify(response.errorInfo , 'error'  );
    
    
            }
        })

    }
            // console.log($("input[name='permissions']:checked").val());
            // console.log(favorite.join(", "));
}