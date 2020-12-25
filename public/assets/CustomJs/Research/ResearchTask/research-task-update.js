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

      $("#researchUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                title: {
                    required: true,
                    // lettersonly: true
                },
                project_type: {
                    required: true,
                    // lettersonly: true
                },
                funder_type: {
                    required: true,
                    // email: true
                },
                funder_name: {
                    required: true,
                    // number: true
                },
                amount: {
                    required: true,
                    number: true
                    
                },
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                },
                team_lead: {
                    required: true,
                   
                },
                team_members: {
                    required: true,
                   
                },
                status: {
                    required: true,
                   
                },


            },
            messages: {
                title: {
                    required: "Please enter title",

                } ,
                project_type: {
                    required: "Please select project type",

                } ,
                funder_type: {
                    required: "Please select funder type",

                } ,
                funder_name: {
                    required: "Please enter funder name",
                } ,
                amount: {
                    required: "Please enter amount",
                    number: "Please enter valid integer",

                } ,
                start_date: {
                    equalTo: "Please select starte date",

                } ,
                end_date: {
                    required: "Please select end date",

                } ,
                team_lead: {
                    required: "Please enter team lead",

                } ,
                team_members: {
                    required: "Please enter team member",

                } ,
                status: {
                    required: "Please select status",

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
var createFormData = $('#researchUpdate').serialize();
var id = $('#researchId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/research/research-task/'+id,
        type: 'PATCH',
        data: createFormData ,
        processData: false,

        success: (response)=>{
            
            if (response.status == 'true') {

                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/research/research-task/";

            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
