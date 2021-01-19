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

      $("#formCostingUpdate").validate({

        errorPlacement:function (error , element) {
          error.insertAfter(element.parents(".form-group"))
        },
            rules: {
                product_name: {
                    required: true,
                    // lettersonly: true
                },
                ingredient_name: {
                    required: true,
                    // lettersonly: true
                },
                quantity_used: {
                    required: true,
                },
                container_name: {
                    required: true,
                },
                container_cost: {
                    required: true,
                    // lettersonly: true
                },
                sticker_cost: {
                    required: true,

                    // lettersonly: true
                },
                box_cost: {
                    required: true,
                    // number: true
                },
                bag_cost: {
                    required: true,
                },
                total_direct_cost: {
                    required: true,
                },
                gst: {
                    required: true,
                },
                marketing_cost: {
                    required: true,
                },
                profit_percentage: {
                    required: true,
                },
                profit_amount: {
                    required: true,
                },
                market_retail_price: {
                    required: true,
                },


            },
            messages: {
                product_name: {
                    required: "Please enter product name",

                } ,
                ingredient_name: {
                    required: "Please enter ingredient name",

                } ,
                quantity_used: {
                    required: "Please enter quantity used",
                    // number: "Please enter valid number",

                } ,
                container_name: {
                    required: "Please enter container name",
                } ,
                container_cost: {
                    required: "Please enter container cost",

                } ,
                sticker_cost: {
                    required: "Please enter sticker cost",


                } ,
                box_cost: {
                    required: "Please enter box cost",
                    // number: "Please enter valid number",

                } ,
                bag_cost: {
                    required: "Please enter bag cost",
                } ,
                 total_direct_cost: {
                    required: "Please enter total_direct_cost",

                } ,
                gst: {
                    required: "Please enter gst",
                } ,
                marketing_cost: {
                    required: "Please enter marketing_cost",
                } ,
                profit_percentage: {
                    required: "Please enter profit_percentage",
                } ,
                profit_amount: {
                    required: "Please enter profit_amount",
                } ,
                market_retail_price: {
                    required: "Please enter market_retail_price",
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
    var createFormData = $('#formCostingUpdate').serialize();
    var id = $('#costingId').val();
    console.log(id);
    $.ajax({
        url: '/skincare/costing/'+id,
        type: 'PATCH',
        data: createFormData,
        processData: false,

        success: (response)=>{
            if (response.status == 'true') {
                $.notify(response.message , 'success'  );
                window.location.href = window.location.protocol + '//' + window.location.hostname +":"+window.location.port+"/skincare/costing";
                
            }else{
                $.notify(response.message , 'error');

            }
        },
        error: (errorResponse)=>{
            $.notify( errorResponse, 'error'  );


        }
    })

}
