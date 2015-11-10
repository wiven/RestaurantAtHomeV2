var orders_html = '', prodName = '', clientName = '', cAddress = '';
var resto_id = Base64.decode(Cookies.get('restoId'));
var orderId = 0;
//const API_URL = 'http://localhost/RestaurantAtHomeAPI/';
const API_URL = 'http://syst.restaurantathome.be/api/';
var productTypes, submitBtn = '', temp = '';
var relatedProducts = Array(), prodCategories = Array(), prodCategoryIds = Array();

$(document).ready(function () {
    getOrderCount();
});

$('#orderInfoModal').off().on('show.bs.modal', function(e) {
    console.log('order info');
    console.log(orderId);
    getOrderInfo(orderId, clientName);
    var button = $(e.relatedTarget); // Button that triggered the modal
    var title = button.data('title'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text(title);
    //modal.find('.modal-body input').val(title);
});

initTooltips('.fa-edit', 'top', 'Actie bewerken');
$('[data-toggle="tooltip"]').tooltip()

$('#orderInfoModal').on('show.bs.modal', function(e) {
    /*var button = $(e.relatedTarget); // Button that triggered the modal
     var title = button.data('title'); // Extract info from data-* attributes*/
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text('Orderinfo');
    //modal.find('.modal-body input').val(title);
});

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
    }

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        console.log(response);
        // count and handle new orders
        if(response.new.length != 0) {
            $('.newOrdersDiv .panel-body').html('');
            orders_html = '';
            getOrders('new', resto_id, 0, 5, '.newOrdersDiv');
        } else {
            $('.newOrdersDiv .panel-body').html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen nieuwe bestellingen gevonden.</div>');
        }

        // count and handle inprogress orders
        if(response.inProgress.length != 0) {
            $('.newOrdersDiv .panel-body').html('');
            orders_html = '';
            getOrders('inprogress', resto_id, 0, 5, '.inprogressOrdersDiv');
        } else {
            $('.inprogressOrdersDiv .panel-body').html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen bestellingen in verwerking gevonden.</div>');
        }

        // count and handle ready orders
        if(response.ready.length != 0) {
            $('.newOrdersDiv .panel-body').html('');
            orders_html = '';
            getOrders('ready', resto_id, 0, 5, '.readyOrdersDiv');
        } else {
            $('.readyOrdersDiv .panel-body').html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen af te leveren bestellingen gevonden.</div>');
        }

        // count and handle finished orders
        if(response.finished.length != 0) {
            $('.newOrdersDiv .panel-body').html('');
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
    }

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
    }

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.substr(1, response.length - 2));

        //console.log(response);
        getFullAddress(response.addressId);

        var odt = response.orderDateTime;

        $('#orderCollectDate').html(odt.substr(8, 2) + '/' + odt.substr(5, 2) + '/' + odt.substr(0, 4));
        $('#orderCollectHour').html(odt.substr(11, 2) + 'u' + odt.substr(14, 2));
        //$('#orderPaymentMethod').html(response.userId);
        $('#orderClientName').html(cName);
        setTimeout(function () {
            $('#orderClientAddress').html(cAddress);
        }, 500);

        try {
            if (response.couponId.length != 0) {
                $('#orderCouponCode').html(response.couponId);
            }
        } catch(err) {
            $('#orderCouponCode').html('-');
        }

        $('#orderClientMsg').html(response.comment);
        $('#orderProducts').empty('');

        $.each(response.lines, function(index,item) {
            console.log(item);
            getProductName(item.productId);
            setTimeout(function() {
                $('#orderProducts').append('<li>'+item.quantity+'x '+prodName+' ('+item.unitPrice+'/stuk)</li>');
            }, 500);
        });

        /*console.log(response.lines[0]);
        getProductName(response.lines[0].productId);*/

        /*setTimeout(function() {
            console.log(prodName);
        }, 500);*/

        $('#orderTotalAmount').html(response.amount);
        $('.orderMarkBusy').off().on('click', function() { changeOrderState(ordId, 'busy'); });
        $('.orderMarkReady').off().on('click', function() { changeOrderState(ordId, 'ready'); });
    });
}

function getProductName(prodId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"product/"+prodId,
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
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        prodName = response.name;
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
    }

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
        if(response[0].addition.length != 0) {
            cAddress = response[0].street+' '+response[0].number+'/'+response[0].addition+', '+response[0].postcode+' '+response[0].city;
        } else {
            cAddress = response[0].street+' '+response[0].number+', '+response[0].postcode+' '+response[0].city;
        }

    });
}