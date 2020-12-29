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

      $("#formCroProjectUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                project_type: {
                    required: true,
                    // lettersonly: true
                },
                title: {
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


            },
            messages: {
                project_type: {
                    required: "Please select project type",

                } ,
                title: {
                    required: "Please enter project title",

                } ,
                funder_type: {
                    required: "Please select funder type",

                } ,
                funder_name: {
                    required: "Please select funder name",
                    // number: "Please enter valid integer",
                } ,
                amount: {
                    required: "Please enter amount",

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
  var createFormData = $('#formCroProjectUpdate').serialize();
  var id = $('#projectId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/cro/project/'+id,
        type: 'PATCH',
        data: createFormData,
        // contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/cro/project/";
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
