// ****************************************************************
// ******* file created and written by mateen masood **************
// ************* date : 27-sep-2020 ******************************
// ****************** js file-name:product-create.js ******************
// ****************** view file name : Products/Products-create.blade.php ****
// ****************** controller name : Products/ProductController *********


// ********* providde convenient CSRF protection for your AJAX based applications *****
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// ****************************************************************
$(document).ready(()=>{


        // ***************** letters only and allow space in a name only *********

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");


    // ********************* form validation ***********

      $("#formEquipmentUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                quipment_name: {
                    required: true,
                    // lettersonly: true
                },
                equipment_number: {
                    required: true,
                    number: true
                },
                functional_status: {
                    required: true,
                    // number: true
                },
                hours_used: {
                    required: true,
                    number: true
                },
                start_time: {
                    required: true,
                    // lettersonly: true
                },
                end_time: {
                    required: true,
                    // number: true

                    // lettersonly: true
                },
                maintenance_date: {
                    required: true,
                    // number: true
                },
                due_date: {
                    required: true,
                    // number: true
                },

            },
            messages: {
                quipment_name: {
                    required: "Please enter equipment name",

                } ,
                equipment_number: {
                    required: "Please enter equipment number",
                    number: "Please enter valid number",
                    

                } ,
                functional_status: {
                    required: "Please enter functional status",
                    // number: "Please enter valid number",

                } ,
                hours_used: {
                    required: "Please enter hours used",
                    number: "Please enter valid number",
                } ,
                start_time: {
                    required: "Please enter start time",

                } ,
                end_time: {
                    required: "Please enter end time",
                    // number: "Please enter valid number",


                } ,
                maintenance_date: {
                    required: "Please enter maintenance date",
                    // number: "Please enter valid number",

                } ,
                due_date: {
                    required: "Please enter due date",
                    // number: "Please enter valid number",
                } ,
                

            },

            submitHandler: function(form) {
               form_Create(form);
            }

      });

})

// ****************** create from ajax request ********************
// ***************** for adding product tinot database ************

function form_Create(formData) {
//    let createFormData = $('#formCreate').serialize();
// console.log(formData)
var createFormData = $('#formEquipmentUpdate').serialize();
var id = $('#quipmentId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/skincare/inventory/equipment/'+id,
        type: 'PATCH',
        data: createFormData ,
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

}
