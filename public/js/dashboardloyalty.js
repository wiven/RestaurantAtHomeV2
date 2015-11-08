$(document).ready(function() {
    $('#loyaltyForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        live: 'enabled',
        locale: 'nl_BE',
        fields: {
            loyaltyNumber: {
                validators: {
                    notEmpty: { },
                    numeric: { },
                    greaterThan: {
                        value: 0
                    }
                }
            },
            loyaltyGift: {
                notEmpty: { },
                stringLength: {
                    min: 3,
                    max: 45
                }
            }
        }
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();

        // creating new action
        if($('body').find('.modal-title').text().indexOf('Nieuw') == 0) {
            var fromD = $('input[name="actionFromDate"]').val();
            var toD = $('input[name="actionToDate"]').val();

            var newAction = {
                'name': $('#actionName').val(),
                'promotiontypeId': $('#actionType').val(),
                'restaurantId': resto_id,
                'productId': $('#actionProduct').val(),
                'fromDate': fromD.substr(6,4)+'-'+fromD.substr(3,2)+'-'+fromD.substr(0,2),
                'toDate': toD.substr(6,4)+'-'+toD.substr(3,2)+'-'+toD.substr(0,2),
                'description': $('#actionDescription').val(),
                'discountType': $('input[name="actionReductionType"]:checked').val(),
                'discountAmount': $('#actionReductionAmount').val(),
                'loyaltyPoints': $('#actionLoyaltyPoints').val()
            };

            try {
                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": API_URL+"promotion",
                    "method": "POST",
                    "headers": {
                        "content-type": "application/json"
                    },
                    "processData": false,
                    "data": JSON.stringify(newAction)
                }

                // creating new action
                $.ajax(settings).always(function (response) {
                    response = JSON.parse(response.responseText.substr(1, response.length-2));

                    if(response.id !== 0) {
                        $('#actionForm').data('formValidation').resetForm();
                        $('#actionSubmit').removeClass('disabled');
                        $('#actionSubmit').prop('disabled', false);
                        $('#newActionModal').modal('hide');
                        $('body').css('opacity', 1);

                        setTimeout(function() {
                            location.reload(true);
                        }, 750);
                    }
                });
            } catch (err) {
                console.log(err);
            }


            // updating an existing action
        } else {

        }

        /*if($('#productModalSubmit').text() == "Product bewerken") {
         // update existing product
         var editedProduct = Array();

         editedProduct["producttypeId"] = $('#ProductType').children(':selected').attr('value');
         editedProduct["promotionId"] = prodPromoId;
         editedProduct["name"] = $('#ProductName').val();
         editedProduct["description"] = $('#ProductDescription').val();
         editedProduct["photo"] = $('#ProductPhoto').val();
         editedProduct["price"] = $('#ProductPrice').val();
         editedProduct["slots"] = $('#ProductSlots').val();
         editedProduct["loyaltyPoints"] = $('#ProductLoyalty').val();
         photoUpload(existingProdId);
         updateProduct(editedProduct, resto_id, existingProdId);

         setTimeout(function() {
         $('#productForm').data('formValidation').resetForm();
         $("#productModalSubmit").removeClass('disabled');
         $("#productModalSubmit").prop('disabled', false);
         $('#newProductModal').hide();
         $('body').css('opacity', 1);
         //location.reload(true);
         }, 500);

         } else {
         // create new product
         var _product = {
         'restaurantId': resto_id,
         'producttypeId':$('#ProductType').children(':selected').attr('value'),
         'promotionId':null,
         'name':$('#ProductName').val(),
         'description':$('#ProductDescription').val(),
         'photo':$('#ProductPhoto').val(),
         'price':$('#ProductPrice').val(),
         'slots':$('#ProductSlots').val(),
         'loyaltyPoints':$('#ProductLoyalty').val()
         };

         var settings = {
         "async": true,
         "crossDomain": true,
         "url": API_URL+"product",
         "method": "POST",
         "headers": {
         "content-type": "application/json"
         },
         "processData": false,
         "data": JSON.stringify(_product)
         }

         // creating new product
         $.ajax(settings).always(function (response) {
         response = JSON.parse(response.responseText.substr(1, response.length-2));

         if(response.id !== 0) {
         new_product_id = response.id;
         relatedProducts = $('#ProductRelatedProducts').val();

         if(relatedProducts != null) {
         if(relatedProducts.length != 0) {
         relatedProducts.split(new_product_id, 1);
         // setting up related product of newly created product (if any)
         $.each(relatedProducts, function(index,item) {
         relateProducts(new_product_id, item);
         });
         }
         }

         //photoUpload(new_product_id);

         $('#productForm').data('formValidation').resetForm();
         $(submitBtn).removeClass('disabled');
         $(submitBtn).prop('disabled', false);
         $('#newProductModal').modal('hide');
         //photoUpload(new_product_id);

         $('#addProductPhotoModal').modal('show');
         productPhotoUpload();

         /!*setTimeout(function() {
         getProducts();
         }, 500);*!/
         }
         });
         }*/
    })
    .on('err.form.fv', function(e) {
        e.preventDefault();

        setTimeout(function() {
            $('#loyaltyFormSubmit').removeClass('disabled');
            $('#loyaltyFormSubmit').prop('disabled', false);
            $('body').css('opacity', 1);
        }, 750);
    });
});

$('#loyaltyFormSubmit').on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    $('#loyaltyForm').submit();
});