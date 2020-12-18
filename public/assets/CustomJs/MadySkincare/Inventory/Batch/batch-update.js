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

      $("#formBatchUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                batch_code: {
                    required: true,
                    // lettersonly: true
                },
                product_name: {
                    required: true,
                    // lettersonly: true
                },
                batch_size: {
                    required: true,
                    // number: true
                },
                total_quantity: {
                    required: true,
                    number: true
                },


            },
            messages: {
                batch_code: {
                    required: "Please enter batch code name",

                } ,
                product_name: {
                    required: "Please enter product name",

                } ,
                batch_size: {
                    required: "Please enter batch size",
                    // number: "Please enter valid number",

                } ,
                total_quantity: {
                    required: "Please enter total quantity",
                    number: "Please enter valid number",
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
var createFormData = $('#formBatchUpdate').serialize();
var id = $('#batchId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/skincare/inventory/batch/'+id,
        type: 'PATCH',
        data: createFormData ,
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

}
