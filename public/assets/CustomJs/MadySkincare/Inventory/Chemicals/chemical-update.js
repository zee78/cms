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

      $("#formChemicalUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                chemical_name: {
                    required: true,
                    // lettersonly: true
                },
                stock_in_hand: {
                    required: true,
                    // lettersonly: true
                },
                unit_cost: {
                    required: true,
                    number: true
                },
                quantity_used: {
                    required: true,
                    number: true
                },
                usage_detail: {
                    required: true,
                    // lettersonly: true
                },
                quantity_remaining: {
                    required: true,
                    number: true

                    // lettersonly: true
                },
                stock_level: {
                    required: true,
                    // number: true
                },
                cost_chemicals_used: {
                    required: true,
                    number: true
                },
                wastage_amount: {
                    required: true,
                    number: true
                },
                wastage_cost: {
                    required: true,
                    number: true
                },


            },
            messages: {
                chemical_name: {
                    required: "Please enter chemical name",

                } ,
                stock_in_hand: {
                    required: "Please enter stock in hand",

                } ,
                unit_cost: {
                    required: "Please enter unit cost",
                    // number: "Please enter valid number",

                } ,
                quantity_used: {
                    required: "Please enter used quantity",
                    number: "Please enter valid number",
                } ,
                usage_detail: {
                    required: "Please enter usage",

                } ,
                quantity_remaining: {
                    required: "Please enter remaning quantity",
                    number: "Please enter valid number",


                } ,
                stock_level: {
                    required: "Please enter stock level",
                    // number: "Please enter valid number",

                } ,
                cost_chemicals_used: {
                    required: "Please enter cost of used chemicals",
                    number: "Please enter valid number",
                } ,
                 wastage_amount: {
                    required: "Please enter westage amount",
                    number: "Please enter valid number",

                } ,
                wastage_cost: {
                    required: "Please enter westage cost",
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
// var createFormData = new FormData (formData);
    var createFormData = $('#formChemicalUpdate').serialize();

    $chemicalId = $("#chemicalId").val();
    // console.log(createFormData);
    $.ajax({
        url: '/skincare/inventory/chemical/'+$chemicalId,
        type: 'PATCH',
        data: createFormData,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/inventory/chemical";
                
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
