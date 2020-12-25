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

      $("#formTrainingCreate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                title: {
                    required: true,
                    // lettersonly: true
                },
                form_type: {
                    required: true,
                    // lettersonly: true
                },
                date: {
                    required: true,
                    // email: true
                },
                speaker: {
                    required: true,
                    // number: true
                },
                number_participants: {
                    required: true,
                    number: true
                    
                },
                total_amount_received: {
                    required: true,
                    number: true,
                },
                total_amount_spent: {
                    required: true,
                    number: true,
                }


            },
            messages: {
                title: {
                    required: "Please enter title",

                } ,
                form_type: {
                    required: "Please select  type",

                } ,
                date: {
                    required: "Please select date",

                } ,
                speaker: {
                    required: "Please enter speaker name",
                } ,
                number_participants: {
                    required: "Please enter amount",
                    number: "Please enter valid integer",

                } ,
                total_amount_received: {
                    required: "Please enter total amount recived",
                    number: "Please enter valid number",


                } ,
                total_amount_spent: {
                    required: "Please enter total amount spent",
                    number: "Please enter valid number",

                }

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
var createFormData = new FormData (formData);
    // console.log(createFormData);
    $.ajax({
        url: '/research/training-form',
        type: 'POST',
        data: createFormData,
        contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/research/training-form/";
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
