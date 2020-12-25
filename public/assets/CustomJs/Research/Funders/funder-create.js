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

      $("#formCreateFunder").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                funding_organization_name: {
                    required: true,
                    // lettersonly: true
                },
                website: {
                    required: true,
                    // lettersonly: true
                },
                email: {
                    required: true,
                    email: true
                },
                phoneNo: {
                    required: true,
                    number: true
                },
                team_lead: {
                    required: true,
                    
                },
                status: {
                    required: true,
                },
                response: {
                    required: true,
                },


            },
            messages: {
                funding_organization_name: {
                    required: "Please enter funding organization name",

                } ,
                website: {
                    required: "Please enter website url",

                } ,
                email: {
                    required: "Please enter email",

                } ,
                phoneNo: {
                    required: "Please enter phone number",
                    number: "Please enter valid integer",
                } ,
                team_lead: {
                    required: "Please enter team lead",

                } ,
                status: {
                    equalTo: "Please select status",

                } ,
                response: {
                    required: "Please enter response",

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
var createFormData = new FormData (formData);
    // console.log(createFormData);
    $.ajax({
        url: '/research/funders',
        type: 'POST',
        data: createFormData,
        contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/research/funders/";
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
