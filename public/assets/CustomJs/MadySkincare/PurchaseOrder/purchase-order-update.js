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

         $("#vendor_name").select2({

        // theme: "bootstrap",
        // dir: direction,
        allowClear: true,
        placeholder: "Select a vedndor",
        "pagination": {
        "more": true
        },

        // minimumResultsForSearch: Infinity,
        // dropdownParent:$('#formContainer'),
        // containerCssClass: ":all:",
        ajax: {
            url: "/skincare/vendors/select2",
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
                            text: obj.vendor_name,
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

      $("#updatePurchaseOrder").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                vendor_type: {
                    required: true,
                    // lettersonly: true
                },
                placed_by: {
                    required: true,
                    // lettersonly: true
                },
                date: {
                    required: true,
                    // email: true
                },
                vendor_name: {
                    required: true,
                    number: true
                },
                cost: {
                    required: true,
                    number: true,
                    
                },
                procurement_person: {
                    required: true,
                },
                receiving_date: {
                    required: true,
                },


            },
            messages: {
                vendor_type: {
                    required: "Please select vandor type",

                } ,
                placed_by: {
                    required: "Please enter who placed the order",

                } ,
                date: {
                    required: "Please enter order date",

                } ,
                vendor_name: {
                    required: "Please select vendor_name",
                    // number: "Please enter valid integer",
                } ,
                cost: {
                    required: "Please enter team lead",

                } ,
                procurement_person: {
                    required: "Please enter procurement person",

                } ,
                receiving_date: {
                    required: "Please enter receiving date",

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
var createFormData = $('#updatePurchaseOrder').serialize();
var id = $('#purchaseId').val();
    // console.log(createFormData);
    $.ajax({
        url: '/skincare/purchase-order/'+id,
        type: 'PATCH',
        data: createFormData,
        contentType: false,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/purchase-order";
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
