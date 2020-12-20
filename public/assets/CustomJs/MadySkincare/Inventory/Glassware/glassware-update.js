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

        // *****************date picker initilization *************

    // Datepicker
    $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
    });


        // ***************** letters only and allow space in a name only *********

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");


    // ********************* form validation ***********

      $("#formGlasswareUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                glassware_name: {
                    required: true,
                    // lettersonly: true
                },
                stock_in_hand: {
                    required: true,
                    // number: true
                },
                breakge: {
                    required: true,
                    // number: true
                },
                responsible_person: {
                    required: true,
                    // number: true
                },

            },
            messages: {
                glassware_name: {
                    required: "Please enter glasssware name",

                } ,
                stock_in_hand: {
                    required: "Please enter stock in hand",
                    // number: "Please enter valid number",
                    

                } ,
                breakge: {
                    required: "Please enter breakage",
                    // number: "Please enter valid number",

                } ,
                responsible_person: {
                    required: "Please enter responsible person name",
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
var createFormData = $('#formGlasswareUpdate').serialize();
var id = $('#glasswareId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/skincare/inventory/glasssware/'+id,
        type: 'PATCH',
        data: createFormData,
        contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/inventory/glasssware";
                
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
