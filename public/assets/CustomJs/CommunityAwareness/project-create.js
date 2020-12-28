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


            // ************** select2 initlization ****************

         $("#funder_name").select2({

        // theme: "bootstrap",
        // dir: direction,
        allowClear: true,
        placeholder: "Select a Funder",
        "pagination": {
        "more": true
        },

        // minimumResultsForSearch: Infinity,
        // dropdownParent:$('#formContainer'),
        // containerCssClass: ":all:",
        ajax: {
            url: "/research/funders/select2",
            type: "get",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                     searchTerm: params.term,
                };
            },
            processResults: function (response) {
                return {
                    results: $.map(response, function (obj) {
                        return {
                            text: obj.funding_organization_name,
                            id: obj.id
                        }
                    }),
                }
            },
            cache: true
        },

        // formatResult: FormatResult,

    });



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

      $("#formCommunityAwrProjectCreate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                project_name: {
                    required: true,
                    // lettersonly: true
                },
                team_lead: {
                    required: true,
                    // lettersonly: true
                },
                team_members: {
                    required: true,
                    // email: true
                },
                start_date: {
                    required: true,
                    // number: true
                },
                end_date: {
                    required: true,
                },
                monthly_progress: {
                    required: true,
                },
                


            },
            messages: {
                project_name: {
                    required: "Please enter project name",

                } ,
                
                monthly_progress: {
                    required: "Please enter monthly prograss",

                } ,
                start_date: {
                    required: "Please select start date",

                } ,
                end_date: {
                    required: "Please select end date",

                } ,
                team_lead: {
                    required: "Please enter team lead",

                } ,
                team_members: {
                    required: "Please enter teams members",

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
        url: '/community-awareness/project',
        type: 'POST',
        data: createFormData,
        contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/community-awareness/project/";
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
