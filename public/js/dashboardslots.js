var orders_html = '', prodName = '', clientName = '', cAddress = '';
var resto_id = Base64.decode(Cookies.get('restoId'));
var orderId = 0;
const API_URL = location.href.split('/')[0]+'//'+location.href.split('/')[2]+'/api/';
var productTypes, submitBtn = '', temp = '';
var relatedProducts = Array(), prodCategories = Array(), prodCategoryIds = Array();
var qtyChanged = 0;

// When the document is ready
$(document).ready(function () {
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        weekStart: 1,
        language: "nl-BE",
        autoclose: true,
        todayHighlight: true
    });

    $('#set_today_active_btn').trigger('click');

    $('.btn_slot_zero').on('click', function(evt) {
        evt.preventDefault();
        console.log($(this).attr('data-id'));
        setSlotZero($(this).attr('data-id'), $('#slotDate').val());
        var dt = $('#slotDate').val();
        setSlotZero($(this).attr('data-id'), dt.substr(6,4)+'-'+dt.substr(3,2)+'-'+dt.substr(0,2));
    });

    $('#slotForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        live: 'enabled',
        locale: 'nl_BE',
        fields: {
            slotAmount: {
                trigger: 'keyup',
                validators: {
                    notEmpty: { },
                    numeric: { },
                    greaterThan: {
                        value: 0
                    }
                }
            }
        }
    })
        .on('success.form.fv', function(e) {
            e.preventDefault();
            console.log('ok');
        }).on('err.form.fv', function(e) {
            e.preventDefault();

            setTimeout(function() {
                $('#actionSubmit').removeClass('disabled');
                $('#actionSubmit').prop('disabled', false);
                $('body').css('opacity', 1);
            }, 750);
        });
});

$('#set_today_active_btn').on('click', function() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    $('#slotDate').val(dd+'/'+mm+'/'+yyyy);

    $('#slotDate').trigger('changeDate');
});

function setSlotZero(slotId, dte) {
    var updateSlot = {
        'slottemplateId': slotId,
        'date': dte,
        'quantity': 0
    };

    console.log(JSON.stringify(updateSlot));

    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"slots/change",
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
            "data": JSON.stringify(updateSlot)
        }

        $.ajax(settings).always(function (response) {
            response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
            console.log(response);
        });
    } catch (err) {
        console.log(err);
    }
}

function changeSlotSize(slotId, dte, qty, qtyChId) {
    var updateSlot = {
        'id': qtyChId,
        'slottemplateId': slotId,
        'date': dte,
        'quantity': parseInt(qty)
    };

    console.log(JSON.stringify(updateSlot));

    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"slots/change",
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
            "data": JSON.stringify(updateSlot)
        }

        $.ajax(settings).always(function (response) {
            response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
            console.log(response);
        });
    } catch (err) {
        console.log(err);
    }
}

$('#slotDate').off().on('changeDate', function() {
    var val = $(this).val();
    var date = val.substr(6,4)+'-'+val.substr(3,2)+'-'+val.substr(0,2);

    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"restaurant/slots/overview/"+resto_id+"/"+date,
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

            if(response.length !== 0) {
                var d = new Date(val.substr(6,4)+'/'+val.substr(3,2)+'/'+val.substr(0,2));
                var n = d.getDay();

                $('#slotsDiv').empty();

                $.each(response, function (index, item) {
                    var slotQty = 0;
                    if(typeof item.changeQty != 'string') { slotQty = item.quantity; } else { slotQty = item.changeQty; qtyChanged = item.changeId; }

                    var temp =
                        '<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12" id="' + item.id + '">'+
                            '<div class="panel panel-default">'+
                                '<div class="panel-body">'+
                                    '<form class="form-horizontal" id="slotForm">'+
                                        '<div class="form-group has-feedback">'+
                                            '<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Van</label>'+
                                            '<div class="col-sm-10">'+
                                                '<input readonly="true" type="text" class="slotFromTime" value="' + item.fromTime.substr(0, item.fromTime.length - 3) + '" />'+
                                                '<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>'+
                                                '<span id="inputSuccess2Status" class="sr-only">(success)</span>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group has-feedback">'+
                                            '<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Tot</label>'+
                                            '<div class="col-sm-10">'+
                                                '<input readonly="true" type="text" class="slotToTime" value="' + item.toTime.substr(0, item.toTime.length - 3) + '" />'+
                                                '<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>'+
                                                '<span id="inputSuccess2Status" class="sr-only">(success)</span>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group has-feedback">'+
                                            '<div class="col-sm-5">'+
                                                '<input type="number" style="padding-right: 0;" class="form-control" id="slotAmount" name="slotAmount" required="required" placeholder="# slots" value="' + slotQty + '">'+
                                                '<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>'+
                                                '<span id="inputSuccess2Status" class="sr-only">(success)</span>'+
                                            '</div>'+
                                            '<label class="col-sm-6 control-label" for="inputSuccess2"># slots</label>'+
                                            '<div class="col-sm-12">'+
                                                '<a href="#" data-id="' + item.id + '" data-day="' + n + '" data-from="' + item.fromTime + '" data-to="' + item.toTime + '" class="btn_slot_zero btn btn-warning btn-block clearfix">'+
                                                '<span class="fa fa-eraser fa-fw"></span>0 zetten'+
                                                '</a>'+
                                            '</div>'+
                                        '</div>'+
                                    '</form>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    $('#slotsDiv').append(temp);
                });

                $('.btn_slot_zero').on('click', function (evt) {
                    evt.preventDefault();
                    setSlotZero($(this).attr('data-id'), val.substr(6,4)+'-'+val.substr(3,2)+'-'+val.substr(0,2));
                    $(this).parent().parent().find('#slotAmount').val(0);
                });

                $('#slotAmount').on('submit', function(e) {
                    e.preventDefault();
                    console.log('e');
                    $('#slotForm').submit();
                });
            } else {
                $('#slotsDiv').empty();
                $('#slotsDiv').html('<div class="alert alert-info text-center" role="alert" id="no_products_msg"><span class="fa fa-info-circle fa-fw"></span> Er zijn geen slots gevonden voor deze dag.</div>');
            }

            $('input[name="slotAmount"]').on('change', function() {
                var val = $('#slotDate').val();
                var date = val.substr(6,4)+'-'+val.substr(3,2)+'-'+val.substr(0,2);
                var dataBtn = $(this).parent().parent().find('.btn_slot_zero');
                var slotId = dataBtn.attr('data-id');
                var slotQty = $(this).val();

                var oldVal = $(this).data('oldValue'); //old value
                var newVal = $(this).val(); //new value

                console.log('old: '+oldVal);
                console.log('new: '+newVal);

                changeSlotSize(slotId, date, slotQty, qtyChanged);
            });

            $('input[name="slotAmount"]').on('focusin', function(){
                $(this).data('oldValue', $(this).val());
                console.log($(this).data('oldValue'));
            });
        });
    } catch (err) {
        console.log(err);
    }
});