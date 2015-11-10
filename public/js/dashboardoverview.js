$(document).ready(function () {
    var settings = {
        "async": true,
        "crossDomain": true,
        url: API_URL + 'dashboard/overview/' + resto_id,
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get("hash")),
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }
    /*$.ajax({
        method: "GET",
        url: API_URL + 'dashboard/overview/' + resto_id,
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        },
        headers: {
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        }*/
    $.ajax(settings).always(function (msg) {
        msg = JSON.parse(msg.responseText.substr(1, msg.responseText.length-2));
        console.log(msg);
    //}).always(function (msg) {
        //console.log(msg);
        var newOrders = msg.newOrders;
        var activePromos = msg.activePromos;
        var openOrders = msg.openOrders;
        var partners = msg.partners;

        // checking for new orders
        if(parseInt(newOrders) !== 0) {
            if(parseInt(newOrders) === 1) {
                $('#multiple_orders').addClass('hidden');
            }
            $('#new_order_count').text(newOrders);
            $('#new_order_box').removeClass('hidden');
        } else {
            $('#new_order_box').addClass('hidden');
        }

        // checking active promos
        if(activePromos.length !== 0) {
            $.each(activePromos, function(index, value) {
                // check if usage is not null, because it's not readable for users
                if(activePromos[index].usage == null) {
                    activePromos[index].usage = 0;
                }

                var end_date = activePromos[index].toDate;
                end_date = end_date.substr(8,2) + '/' + end_date.substr(5,2) + '/' + end_date.substr(0,4);

                $('#active_promos_div').append('<tr><td>'+activePromos[index].name+'</td><td><span class="hidden-xs">T.e.m. </span>'+end_date+'</td><td>'+activePromos[index].usage+'<a href="#" data-toggle="modal" data-title="Actie wijzigen" data-target="#newActionModal" data-backdrop="static" data-id="'+activePromos[index].id+'" title="Actie wijzigen"><span class="fa fa-edit pull-right edit-action-icon"></span></a></td></tr>');
            });

            $('#new_order_count').text(msg.newOrders);

            $('#no_promos_msg').addClass('hidden');
            $('#active_promos').removeClass('hidden');
        } else {
            $('#no_promos_msg').removeClass('hidden');
            $('#active_promos').addClass('hidden');
        }

        // checking open orders today
        if(openOrders.length !== 0) {
            $.each(openOrders, function(index, value) {
                // check if items is not null, because it's not readable for users
                if(openOrders[index].items == null) {
                    openOrders[index].items = 0;
                }

                var collection_hour = openOrders[index].orderDateTime;
                collection_hour = collection_hour.substr(11,2) + 'u' + collection_hour.substr(14,2);

                $('#todays_orders_div').append('<tr class="warning order_overview"><td>'+collection_hour+'</td><td>'+openOrders[index].name+' '+openOrders[index].surname+'</td><td>'+openOrders[index].items+'</td><td>&euro; '+openOrders[index].amount+'</td></tr>');
            });

            $('#no_orders_msg').addClass('hidden');
            $('#todays_orders').removeClass('hidden');
        } else {
            $('#no_orders_msg').removeClass('hidden');
            $('#todays_orders').addClass('hidden');
        }

        // checking partners
        if(partners.length !== 0) {
            $.each(partners, function(index, value) {
                if((partners[index].photo == 'null') || (partners[index].photo.length == 0)) {
                    $('#partners_div').append('<a href="'+partners[index].url+'" target="_blank" class="top_resto"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="../public/img/partner-thumb.jpg"><div class="caption"><h3 id="thumbnail-label">'+partners[index].name+'</h3></div></div></div></a>');
                } else {
                    $('#partners_div').append('<a href="'+partners[index].url+'" target="_blank" class="top_resto"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="'+partners[index].photo+'"><div class="caption"><h3 id="thumbnail-label">'+partners[index].name+'</h3></div></div></div></a>');
                }
            });

            $('#no_partners_msg').addClass('hidden');
            $('#partners_div').removeClass('hidden');
        } else {
            $('#partners_div').addClass('hidden');
            $('#no_partners_msg').removeClass('hidden');
        }
    });


    // check for new orders every 30 seconds
    window.setInterval(function(){
        /*console.log('orders checked');*/
        check_new_orders(resto_id);
    }, 30000);

    //$('#promotionForm').parsley();

    Cookies.set('restoId', Base64.encode(resto_id));

    $('#PromotionStartDate').datepicker({
        format: 'dd/mm/yyyy'
    }).on('changeDate', function(e) {
        $('#promotionForm').formValidation('revalidateField', 'date');
    });

    $('#PromotionEndDate').datepicker();

    $('#promotionForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        live: 'enabled',
        locale: 'nl_BE',
        fields: {
            PromotionName: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 45
                    }
                }
            },
            PromotionType: {
                validators: {
                    notEmpty: { }
                }
            },
            PromotionStartDate: {
                validators: {
                    notEmpty: { },
                    date: {
                        format: 'DD/MM/YYYY'
                    }
                }
            },
            PromotionEndDate: {
                validators: {
                    notEmpty: { },
                    date: {
                        format: 'DD/MM/YYYY'
                    }
                }
            },
            reductionType: {
                validators: {
                    notEmpty: { }
                }
            },
            PromotionReductionAmount: {
                validators: {
                    notEmpty: { },
                    numeric: {
                        thousandsSeparator: '',
                        decimalSeparator: '.'
                    },
                    greaterThan: {
                        value: 0.1
                    },
                    lessThan: {
                        value: 100
                    }
                }
            },
            PromotionLoyaltyAmount: {
                validators: {
                    integer: { },
                    greaterThan: {
                        value: 1
                    }
                }
            },
            PromotionDescription: {
                validators: {
                    notEmpty: { },
                    stringlength: {
                        max: 100
                    }
                }
            },
            PromotionPhoto: {
                validators: {
                    file: {
                        extension: 'jpeg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 2097152   // 2048 * 1024
                    }
                }
            },
            PromotionProduct: {
                validators: {
                    notEmpty: { }
                }
            }
        }
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();
        //console.log('OK');

        var from = $('#PromotionStartDate').val();
        var _from = from.substr(6,4)+'-'+from.substr(3,2)+'-'+from.substr(0,2);

        var to = $('#PromotionEndDate').val();
        var _to = to.substr(6,4)+'-'+to.substr(3,2)+'-'+to.substr(0,2);

        var updated_promotion = {
            'id': promotion_id,
            'promotiontypeId': "2",
            'restaurantId': resto_id,
            'name': $('#PromotionName').val(),
            'productId': $('#PromotionProduct').children(':selected').attr('value'),
            'fromDate': _from,
            'toDate': _to,
            'description': $('#PromotionDescription').val(),
            'discountType': $('input[name="reductionType"]:checked').val(),
            'discountAmount': $('#PromotionReductionAmount').val(),
            'loyaltyPoints': $('#PromotionLoyaltyAmount').val()
        };

        $('input').removeClass('has-success');

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"promotion",
            "method": "PUT",
            "headers": {
                "hash": Base64.decode(Cookies.get("hash")),
                "content-type": "application/json",
                "Pragma": "no-cache" ,
                "Cache-Control": "no-cache",
                "Expires": 0
            },
            "cache": false,
            "processData": false,
            "data": JSON.stringify(updated_promotion)
        }

        //console.log(JSON.stringify(updated_promotion));

        $.ajax(settings).always(function (response) {
            console.log(response);
        });

        var promotionProduct = $('#PromotionProduct').val();

        if(promotionProduct.length != 0) {

            $.ajax({
                method: "GET",
                url: API_URL + 'product/' + promotionProduct,
                dataType: "jsonp",
                crossDomain: true,
                xhrFields: {
                    withCredentials: true
                }
            }).always(function (msg) {
                var updated_product = {
                    'id': promotionProduct,
                    'restaurantId': msg.restaurantId,
                    'producttypeId': msg.producttypeId,
                    'name': msg.name,
                    'description': msg.description,
                    'promotionId': promotion_id,
                    'price': msg.price,
                    'slots': msg.slots
                };

                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": API_URL+"product",
                    "method": "PUT",
                    "headers": {
                        "content-type": "application/json"
                    },
                    "processData": false,
                    "data": JSON.stringify(updated_product)
                }

                console.log(JSON.stringify(updated_product));

                $.ajax(settings).always(function (response) {
                    console.log(response);
                });
            });
        }
    });

    $('#PromotionType').chosen({
        disable_search_threshold: 5,
        no_results_text: 'Oeps, niets gevonden!',
        placeholder_text_single: 'Kies een type',
        search_contains: true,
        width: '100%'
    });

    $('#PromotionProduct').chosen({
        disable_search_threshold: 0,
        no_results_text: 'Oeps, niets gevonden!',
        placeholder_text_single: 'Kies een product',
        search_contains: true,
        width: '100%'
    });
});

var product_html = '';
var resto_id = Base64.decode(Cookies.get('restoId'));
var promotion_id = '';
var temp;

//const API_URL = 'http://localhost/RestaurantAtHomeAPI/';
const API_URL = 'http://syst.restaurantathome.be/api/';

function check_new_orders(restoId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        url: API_URL + 'dashboard/neworders/' + restoId,
        method: "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get("hash")),
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    //$.ajax({
    //    method: "POST",
    //    url: API_URL + 'dashboard/neworders/' + restoId,
    //    dataType: "jsonp",
    //    crossDomain: true,
    //    xhrFields: {
    //        withCredentials: true
    //    }
    //}).always(function (msg) {
    $.ajax(settings).always(function (response) {
        msg = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
        console.log(msg.count);

        if(parseInt(msg.count) !== 0) {
            if(parseInt(msg.count) === 1) {
                $('#multiple_orders').addClass('hidden');
            } else {
                $('#multiple_orders').removeClass('hidden');
            }
            $('#new_order_count').text(msg.count);
            $('#new_order_box').removeClass('hidden');
        } else {
            $('#new_order_box').addClass('hidden');
        }
    });
}

function get_data(method, type, id) {
    $.ajax({
        method: method,
        url: API_URL + type + '/' + id,
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).always(function (msg) {
        console.log(msg);
        return msg;
    });
}

function pad(num, size) {
    console.log('num: '+num);
    console.log('size: '+size);
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}

$('#newActionModal').on('show.bs.modal', function(e) {
    var button = $(e.relatedTarget); // Button that triggered the modal
    var title = button.data('title'); // Extract info from data-* attributes
    var product_id = button.data('id');
    promotion_id = product_id;

    var promotion = '';

    $.ajax({
        method: "POST",
        url: API_URL  + 'promotion/' + product_id,
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).always(function (msg) {
        promotion = msg;

        //console.log(promotion);

        var fromDate = new Date(promotion.fromDate);
        fromDate = pad(fromDate.getDate(), 2) + '/' + pad((fromDate.getMonth()+1), 2) + '/' + fromDate.getFullYear();

        var toDate = new Date(promotion.toDate);
        toDate = pad(toDate.getDate(), 2) + '/' + pad((toDate.getMonth()+1), 2) + '/' + toDate.getFullYear();

        $('#PromotionName').val(promotion.name);
        $('#PromotionStartDate').val(fromDate);
        $('#PromotionEndDate').val(toDate);

        if(promotion.discountType == "Percentage") {
            $('#PromotionReductionType1').prop('checked', true);
            $('#PromotionReductionType2').prop('checked', false);
        } else {
            $('#PromotionReductionType1').prop('checked', false);
            $('#PromotionReductionType2').prop('checked', true);
        }
        
        $('#PromotionReductionAmount').val(promotion.discountAmount);
        $('#PromotionLoyaltyAmount').val(promotion.loyaltyPoints);
        $('#PromotionDescription').val(promotion.description);

        // get all the products of the restaurant, to choose from
        $.ajax({
            method: "GET",
            url: API_URL + '/restaurant/product/all/' + resto_id,
            dataType: "jsonp",
            crossDomain: true,
            xhrFields: {
                withCredentials: true
            }
        }).always(function (msg) {
            console.log('products');
            var select_to_add = $('#PromotionProduct');

            select_to_add.empty();
            select_to_add.append('<option value=""></option>');

            $.each(msg, function(index, item) {
                select_to_add.append($('<option></option>').val(item.id).html(item.name));

            });

            if(promotion.products.length !== 0) {
                $('#PromotionProduct').val(promotion.products[0].id);
            }

            $('#PromotionProduct').trigger('chosen:updated');
        });
    });

    var modal = $(this);
    modal.find('.modal-title').text(title);


});

$('#newActionModal').on('hide.bs.modal', function(e) {
    $('#editPromotionBtn').removeClass('disabled');
    $('#editPromotionBtn').prop('disabled', false);
    $('#promotionForm').data('formValidation').resetForm();
    $('#PromotionType').children().remove();
    $('#PromotionProduct').children().remove();
});

$('#editPromotionBtn').on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    $('#promotionForm').submit();
    setTimeout(function() {
        $('body').css('opacity', 1);
        $('#newActionModal').modal('hide');
    }, 1500);
});