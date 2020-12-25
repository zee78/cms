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

      $("#formSoldStatusUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                product_name: {
                    required: true,
                    // lettersonly: true
                },
                date: {
                    required: true,
                    // number: true
                },
                packs_sold: {
                    required: true,
                    // number: true
                },
                packs_in_hand: {
                    required: true,
                    // number: true
                },
                amount_received: {
                    required: true,
                    number: true
                },
            
            },
            messages: {
                product_name: {
                    required: "Please enter product name",

                } ,
                date: {
                    required: "Please enter date",
                    // number: "Please enter valid number",
                    

                } ,
                packs_sold: {
                    required: "Please enter sold packs",
                    // number: "Please enter valid number",

                } ,
                packs_in_hand: {
                    required: "Please enter packs in hand",
                    // number: "Please enter valid number",
                } ,
                amount_received: {
                    required: "Please enter amount you recived",
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
var createFormData = $('#formSoldStatusUpdate').serialize();
var id = $('#soldStatusId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/skincare/inventory/soldstatus/'+id,
        type: 'PATCH',
        data: createFormData ,
        processData: false,

        success: (response)=>{
            
            if (response.status == 'true') {

                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/inventory/soldstatus/";

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
