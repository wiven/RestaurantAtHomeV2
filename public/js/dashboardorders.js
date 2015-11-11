var orders_html = '', prodName = '', clientName = '', cAddress = '';
var orderUserId = 0;
var resto_id = Base64.decode(Cookies.get('restoId'));
var orderId = 0;
const API_URL = location.href.split('/')[0]+'//'+location.href.split('/')[2]+'/api/';
var productTypes, submitBtn = '', temp = '';
var relatedProducts = Array(), prodCategories = Array(), prodCategoryIds = Array();

$(document).ready(function () {
    getOrderCount();
});

$('#orderInfoModal').off().on('show.bs.modal', function(e) {
    modalLoading();
    getOrderInfo(orderId, clientName);
    var button = $(e.relatedTarget); // Button that triggered the modal
    var title = button.data('title'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text(title);

    setTimeout(function() {
        modalLoaded();
    }, 500);
});

initTooltips('.fa-edit', 'top', 'Actie bewerken');
$('[data-toggle="tooltip"]').tooltip();

function initTooltips(element, position, title) {
    var div = $(element);

    div.attr('data-toggle', 'tooltip');
    div.attr('data-placement', position);
    div.attr('title', title);
}

function getOrderCount() {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"dashboard/orders/"+resto_id,
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
    };

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        //console.log(response);
        // count and handle new orders
        if(response.new.length != 0) {
            //$('.newOrdersDiv .panel-body').html('');
            orders_html = '';
            getOrders('new', resto_id, 0, 5, '.newOrdersDiv');
        } else {
            $('.newOrdersDiv .panel-body').html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen nieuwe bestellingen gevonden.</div>');
        }

        // count and handle inprogress orders
        if(response.inProgress.length != 0) {
            //$('.newOrdersDiv .panel-body').html('');
            orders_html = '';
            getOrders('inprogress', resto_id, 0, 5, '.inprogressOrdersDiv');
        } else {
            $('.inprogressOrdersDiv .panel-body').html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen bestellingen in verwerking gevonden.</div>');
        }

        // count and handle ready orders
        if(response.ready.length != 0) {
            //$('.newOrdersDiv .panel-body').html('');
            orders_html = '';
            getOrders('ready', resto_id, 0, 5, '.readyOrdersDiv');
        } else {
            $('.readyOrdersDiv .panel-body').html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen af te leveren bestellingen gevonden.</div>');
        }

        // count and handle finished orders
        if(response.finished.length != 0) {
            //$('.newOrdersDiv .panel-body').html('');
            orders_html = '';
            getOrders('finished', resto_id, 0, 5, '.finishedOrdersDiv');
        } else {
            $('.finishedOrdersDiv .panel-body').html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen afgeleverde bestellingen gevonden.</div>');
        }
    });

    $('.ordersRow').removeClass('hidden');
}

function getOrders(type, restoId, skip, top, resultDiv) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/order/"+type+"/"+restoId+"/"+skip+"/"+top,
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
    };

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        var orderCount = 0;

        orders_html = '';
        orders_html += '<div class="table-responsive"><table class="table table-hover"><thead><tr><th>Afhaaltijdstip</th><th>Naam klant</th><th># items</th><th># slots</th><th>Prijs</th></tr></thead><tbody>';

        $.each(response, function(index,item) {
            var odt = response[index].orderDateTime;

            if(response[index].items != null) { var orderItems = response[index].items; } else { var orderItems = 0; }
            orders_html += '<tr class="order_detail_tr" data-id="'+response[index].id+'" data-name="'+response[index].name+' '+response[index].surname+'"><td>'+odt.substr(8, 2)+'/'+odt.substr(5, 2)+'/'+odt.substr(0, 4)+' '+odt.substr(11, 2)+'u'+odt.substr(14, 2)+'</td><td>'+response[index].name+' '+response[index].surname+'</td><td>'+orderItems+'</td><td>'+response[index].slots+'</td><td>€ '+response[index].amount+'</td></tr>';

            orderCount++;
        });

        orders_html += '</tbody></table></div>';

        if(orderCount > 5) {
            orders_html += '<div class="text-center"><a href="/dashboard/orders/'+type+'" class="btn btn-default btn-block"><span class="fa fa-plus-square"></span> Meer bestellingen weergeven ...</a></div>';
        }

        $(resultDiv+' .panel-body').html(orders_html);

        $('.order_detail_tr').off().on('click', function() {
            orderId = $(this).attr('data-id');
            clientName = $(this).attr('data-name');
            $('#orderInfoModal').modal({
                'backdrop': 'static'
            });
        });
    });
}

function getOrderInfo(ordId, cName) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"order/"+ordId,
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
    };

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));

        //console.log(response);
        getFullAddress(response.addressId);
        getPaymentMethod(response.paymentmethodid);

        var odt = response.orderDateTime;

        $('#orderCollectDate').html(odt.substr(8, 2) + '/' + odt.substr(5, 2) + '/' + odt.substr(0, 4));
        $('#orderCollectHour').html(odt.substr(11, 2) + 'u' + odt.substr(14, 2));

        $('#orderClientName').html(cName);
        setTimeout(function () {
            $('#orderClientAddress').html(cAddress);
            switch (response.paymentStatus) {
                case 'Payed':
                    $('#orderPaymentMethod').append(' (Betaald)');
                    $('#orderPaymentMethod').addClass('label-success');
                    $('#orderPaymentMethod').removeClass('label-warning');
                    break;
                case 'Pending':
                    $('#orderPaymentMethod').append(' (In afwachting)');
                    $('#orderPaymentMethod').addClass('label-warning');
                    $('#orderPaymentMethod').removeClass('label-success');
                    break;
                default: return;
            }
        }, 500);

        try {
            if (response.couponId.length != 0) {
                $('#orderCouponCode').html('ja');
            } else {
                $('#orderCouponCode').html('nee');
            }
        } catch(err) {
            $('#orderCouponCode').html('-');
        }

        $('#orderClientMsg').html(response.comment);
        $('#orderProducts').empty('');

        $.each(response.lines, function(index,item) {
            //console.log(item);
            //getProductName(item.productId);
            setTimeout(function() {
                $('#orderProducts').append('<li>'+item.quantity+'x '+item.name+' ('+item.price+'/stuk)</li>');
            }, 500);
        });

        switch(response.orderStatusId) {
            case 10:
                $('#nextStatusBtn').html(
                    '<a href="#" class="btn btn-default btn-block orderMarkBusy">'+
                        'Markeer als in verwerking'+
                    '</a>');
                $('#nextStatusBtn').removeClass('hidden');
                $('#readyStatusBtn').removeClass('hidden');
                $('#readyStatusBtn').addClass('col-lg-6');
                $('#readyStatusBtn').addClass('col-md-6');
                break;
            case 20:
                $('#nextStatusBtn').html(
                    '<a href="#" class="btn btn-warning btn-block orderMarkReady">'+
                        'Markeer als af te leveren'+
                    '</a>');
                $('#nextStatusBtn').removeClass('hidden');
                $('#readyStatusBtn').removeClass('hidden');
                $('#readyStatusBtn').addClass('col-lg-6');
                $('#readyStatusBtn').addClass('col-md-6');
                break;
            case 40:
                $('#nextStatusBtn').addClass('hidden');
                $('#readyStatusBtn').removeClass('hidden');
                $('#readyStatusBtn').removeClass('col-lg-6');
                $('#readyStatusBtn').removeClass('col-md-6');
                break;
            case 100:
                $('#nextStatusBtn').addClass('hidden');
                $('#readyStatusBtn').addClass('hidden');
                break;
            default: break;
        }

        $('#orderTotalAmount').html(response.amount);
        $('.orderMarkBusy').off().on('click', function() { changeOrderState(orderId, 20); });
        $('.orderMarkReady').off().on('click', function() { changeOrderState(orderId, 40); });
        $('.orderMarkFinished').off().on('click', function() { changeOrderState(orderId, 100); });
    });
}

function changeOrderState(ordId, statusCode) {
    var updatedOrder = {
        'id': ordId,
        'orderStatusId': statusCode
    };

    console.log(updatedOrder);

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/order/"+resto_id,
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
        "data": JSON.stringify(updatedOrder)
    }

    $.ajax(settings).always(function (response) {
        getOrderCount();
        setTimeout(function() { $('#orderInfoModal').modal('hide'); }, 250);
    });
}

function getPaymentMethod(pmId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"manage/paymentmethod/"+pmId,
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
    };

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));
        $('#orderPaymentMethod').html(response.name);
    });
}

function getFullAddress(addressId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"user/address/"+addressId,
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
    };

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
        if(response.addition.length != 0) {
            cAddress = response.street+' '+response.number+'/'+response.addition+', '+response.postcode+' '+response.city;
        } else {
            cAddress = response.street+' '+response.number+', '+response.postcode+' '+response.city;
        }

    });
}

function modalLoaded() {
    $('.modal-header').removeClass('hidden');
    $('.modal-body').removeClass('hidden');
    $('.modal-footer').removeClass('hidden');
    $('#orderModalLoaderDiv').addClass('hidden');
}

function modalLoading() {
    $('#orderModalLoaderDiv').removeClass('hidden');
    $('.modal-header').addClass('hidden');
    $('.modal-body').addClass('hidden');
    $('.modal-footer').addClass('hidden');
}