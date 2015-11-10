var orders_html = '', prodName = '', clientName = '', cAddress = '';
var resto_id = Base64.decode(Cookies.get('restoId'));
var orderId = 0, promotionToUpdate = 0;
//const API_URL = 'http://localhost/RestaurantAtHomeAPI/';
const API_URL = 'http://syst.restaurantathome.be/api/';
var productTypes, submitBtn = '', temp = '';
var relatedProducts = Array(), prodCategories = Array(), prodCategoryIds = Array();

$(document).ready(function() {
    getPromotionInfo('active', resto_id);
    getPromotionInfo('comming', resto_id); //comming is known typo, made by back-end
    getPromotionInfo('passed', resto_id);

    $('#actionForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        live: 'enabled',
        locale: 'nl_BE',
        fields: {
            actionName: {
                validators: {
                    notEmpty: { },
                    stringLength: {
                        min: 3,
                        max: 45
                    }
                }
            },
            actionType: {
                validators: {
                    notEmpty: { }
                }
            },
            actionFromDate: {
                validators: {
                    notEmpty: { },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'Dit is geen geldige datum'
                    }
                }
            },
            actionToDate: {
                validators: {
                    notEmpty: { },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'Dit is geen geldige datum'
                    }
                }
            },
            actionReductionType: {
                validators: {
                    notEmpty: { }
                }
            },
            actionReductionAmount: {
                validators: {
                    notEmpty: { },
                    numeric: { },
                    greaterThan: {
                        value: 0
                    }
                }
            },
            actionLoyaltyPoints: {
                validators: {
                    notEmpty: { },
                    numeric: { },
                    greaterThan: {
                        value: 0
                    }
                }
            },
            actionDescription: {
                validators: {
                    stringLength: {
                        min: 0,
                        max: 80
                    }
                }
            },
            actionProduct: {
                validators: {
                    notEmpty: { }
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
                            "hash": Base64.decode(Cookies.get('hash')),
                            "Access-Control-Allow-Origin":  '*',
                            "content-type": "application/json",
                            "Pragma": "no-cache",
                            "Cache-Control": "no-cache",
                            "Expires": 0
                        },
                        "cache": false,
                        "processData": false,
                        "data": JSON.stringify(newAction)
                    }

                    // creating new action
                    $.ajax(settings).always(function (response) {
                        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

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
                var fromD = $('input[name="actionFromDate"]').val();
                var toD = $('input[name="actionToDate"]').val();

                var updatedAction = {
                    'id': promotionToUpdate.toString(),
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
                        "method": "PUT",
                        "headers": {
                            "hash": Base64.decode(Cookies.get('hash')),
                            "Access-Control-Allow-Origin":  '*',
                            "content-type": "application/json",
                            "Pragma": "no-cache",
                            "Cache-Control": "no-cache",
                            "Expires": 0
                        },
                        "cache": false,
                        "processData": false,
                        "data": JSON.stringify(updatedAction)
                    }

                    // creating new action
                    $.ajax(settings).always(function (response) {
                        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

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
                $.ajax(settings).done(function (response) {
                    response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

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
        }).on('err.form.fv', function(e) {
            e.preventDefault();

            setTimeout(function() {
                $('#actionSubmit').removeClass('disabled');
                $('#actionSubmit').prop('disabled', false);
                $('body').css('opacity', 1);
            }, 750);
        });

    /*$('.input-group.date').datepicker({
        format: "dd/mm/yyyy",
        language: "nl",
        todayHighlight: true
    });*!/

    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy'
    });

    $( "#datepicker" ).datepicker({
        dateFormat: "dd/mm/yy",
        todayHighlight: true
    });


    /!*$('#timepicker').timepicker({
        template: false,
        showInputs: false,
        minuteStep: 5,
        template: "modal",
        maxHours: 24,
        showMeridian: false,
        defaultTime: 'current'
    });*!/

    /!*$(function () {
        $('#datetimepicker1').datetimepicker();
    });*/

    initTooltips('.fa-edit', 'top', 'Actie bewerken');
    $('[data-toggle="tooltip"]').tooltip();

    /*setTimeout(function() {
        $('.panel-body').matchHeight();
        $.fn.matchHeight._update();
    }, 500);*/


});

$('#newActionModal').on('show.bs.modal', function(e) {
    $('#actionForm').data('formValidation').resetForm();
    var button = $(e.relatedTarget); // Button that triggered the modal
    var title = button.data('title'); // Extract info from data-* attributes
    var actionId = button.data('id'); // Extract info from data-* attributes
    promotionToUpdate = actionId;
    $('#ActionDelete').addClass('hidden');

    try {
        if(actionId.length != 0) {
            $('#ActionDelete').removeClass('hidden');
            getActionInfo(actionId);
        }
    } catch(err) {
        $('#actionName').val('');
        $('#actionType').val('');
        $('#actionProduct').val('');
        $('input[name="actionFromDate"]').val('');
        $('input[name="actionToDate"]').val('');
        $('#actionDescription').val('');
        $('input[name="actionReductionType"]').prop('checked', false);
        $('#actionReductionAmount').val('');
        $('#actionLoyaltyPoints').val('');
    }

    var modal = $(this);
    modal.find('.modal-title').text(title);

    $('#actionProduct').select2({
        placeholder: "Selecteer een actieproduct",
        minimumResultsForSearch: 3
    });
    $('.select2-container').css("width", "100%");

    getActionTypes();
    getRestoProducts(resto_id);


});

function initTooltips(element, position, title) {
    var div = $(element);

    div.attr('data-toggle', 'tooltip');
    div.attr('data-placement', position);
    div.attr('title', title);
}

function getPromotionInfo(type, restoId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/promotion/"+type+"/"+restoId+"/0/3",
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "Access-Control-Allow-Origin":  '*',
            "content-type": "application/json",
            "Pragma": "no-cache",
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));

        $('.'+type+'ActionsDiv tbody').empty();
        if(response.length == 0) {
            $('.'+type+'ActionsDiv').parent().html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen acties gevonden.<br />Klik <a href="#" data-toggle="modal" data-title="Nieuwe actie aanmaken" data-target="#newActionModal" data-backdrop="static" id="btn_new_action">hier</a> om een nieuwe actie aan te maken.</div>');
        }

        $.each(response, function(index,item) {
            var start = item.fromDate;
            var end = item.toDate;

            try {
                if(item.usage.length != 0) { var usage = item.usage; }
            } catch (err) {
                var usage = 0;
            }

            if(type == 'comming') {
                $('.'+type+'ActionsDiv tbody').append('<tr><td>'+item.name+'</td><td><span class="hidden-xs">Vanaf </span>'+start.substr(8, 2) + '/' + start.substr(5, 2) + '/' + start.substr(0, 4)+'</td><td>'+usage+'<a href="#" data-toggle="modal" data-id="'+item.id+'" data-title="Actie bewerken" data-target="#newActionModal" data-backdrop="static" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a></td></tr>');
            } else {
                $('.'+type+'ActionsDiv tbody').append('<tr><td>'+item.name+'</td><td><span class="hidden-xs">T.e.m. </span>'+end.substr(8, 2) + '/' + end.substr(5, 2) + '/' + end.substr(0, 4)+'</td><td>'+usage+'<a href="#" data-toggle="modal" data-id="'+item.id+'" data-title="Actie bewerken" data-target="#newActionModal" data-backdrop="static" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a></td></tr>');
            }
        });

        $('.'+type+'ActionsDiv').removeClass('hidden');
    });
}

function getActionTypes() {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"manage/promotiontype/all/",
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "Access-Control-Allow-Origin":  '*',
            "content-type": "application/json",
            "Pragma": "no-cache",
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));

        $('#actionType').empty();
        $('#actionType').append('<option value=""></option>');
        $.each(response, function(index,item) {
            $('#actionType').append('<option value="'+item.id+'">'+item.name+'</option>');
        });
    });
}

function getRestoProducts(restoId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/product/all/"+restoId,
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "Access-Control-Allow-Origin":  '*',
            "content-type": "application/json",
            "Pragma": "no-cache",
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));

        $('#actionProduct').empty();
        $('#actionProduct').append('<option value=""></option>');
        $.each(response, function(index,item) {
            $('#actionProduct').append('<option value="'+item.id+'">'+item.name+'</option>');
        });

        $('#actionProduct').trigger('change');
    });
}

function getActionInfo(aId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"promotion/"+aId,
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "Access-Control-Allow-Origin":  '*',
            "content-type": "application/json",
            "Pragma": "no-cache",
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));

        var fromD = response.fromDate;
        var toD = response.toDate;
        //console.log(response);

        $('#actionName').val(response.name);
        $('#actionType').val(response.promotiontypeId);
        try { $('#actionProduct').val(response.products[0].id); } catch(err) { $('#actionProduct').val(''); }
        $('#actionProduct').trigger("change");
        $('input[name="actionFromDate"]').val(fromD.substr(8,2)+'/'+fromD.substr(5,2)+'/'+fromD.substr(0,4));
        $('input[name="actionToDate"]').val(toD.substr(8,2)+'/'+toD.substr(5,2)+'/'+toD.substr(0,4));
        $('#actionDescription').val(response.description);
        $('input[value="'+response.discountType+'"]').attr('checked', 'checked');
        $('#actionReductionAmount').val(response.discountAmount);
        $('#actionLoyaltyPoints').val(response.loyaltyPoints);

        /*$('#actionType').empty();
        $('#actionType').append('<option value=""></option>');
        $.each(response, function(index,item) {
            $('#actionType').append('<option value="'+item.id+'">'+item.name+'</option>');
        });*/
    });
}

$('#actionSubmit').off().on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    //console.log($('#actionSubmit').val());
    $('#actionForm').submit();
});

$('#ActionDelete').off().on('click', function() {
    swal({
            title: "Bent u zeker dat u deze actie wil verwijderen?",
            text: "Let op: dit is onomkeerbaar!",
            cancelButtonText: "Annuleren",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
        function(){
            $('body').css('opacity', 0.5);
            $('#actionSubmit').addClass('disabled');
            $('#actionSubmit').prop('disabled', true);

            setTimeout(function(){
                try {
                    var settings = {
                        "async": true,
                        "crossDomain": true,
                        "url": API_URL+"promotion/delete/"+promotionToUpdate,
                        "method": "GET",
                        "headers": {
                            "hash": Base64.decode(Cookies.get('hash')),
                            "Access-Control-Allow-Origin":  '*',
                            "content-type": "application/json",
                            "Pragma": "no-cache",
                            "Cache-Control": "no-cache",
                            "Expires": 0
                        },
                        "cache": false,
                        "processData": false
                    }

                    // deleting the action
                    $.ajax(settings).always(function (response) {
                        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

                        $('#actionForm').data('formValidation').resetForm();
                        $('#actionSubmit').removeClass('disabled');
                        $('#actionSubmit').prop('disabled', false);
                        $('#newActionModal').modal('hide');
                        $('body').css('opacity', 1);

                        swal("Actie werd verwijderd!");

                        setTimeout(function() {
                            location.reload(true);
                        }, 750);
                    });
                } catch (err) {
                    console.log(err);
                }
            }, 500);
        });

    /*try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"promotion/delete/"+promotionToUpdate,
            "method": "GET",
            "headers": {
                "hash": Base64.decode(Cookies.get('hash')),
                "Access-Control-Allow-Origin":  '*',
                "content-type": "application/json",
                "Pragma": "no-cache",
                "Cache-Control": "no-cache",
                "Expires": 0
            },
            "cache": false,
            "processData": false
        }

        // deleting the action
        $.ajax(settings).always(function (response) {
            response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

            $('#actionForm').data('formValidation').resetForm();
            $('#actionSubmit').removeClass('disabled');
            $('#actionSubmit').prop('disabled', false);
            $('#newActionModal').modal('hide');
            $('body').css('opacity', 1);

            setTimeout(function() {
                location.reload(true);
            }, 750);
        });
    } catch (err) {
        console.log(err);
    }*/
});