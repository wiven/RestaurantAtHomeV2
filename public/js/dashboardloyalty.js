var resto_id = Base64.decode(Cookies.get('restoId'));
const API_URL = location.href.split('/')[0]+'//'+location.href.split('/')[2]+'/api/';
var loyId = 0;

$(document).ready(function() {
    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"dashboard/loyalty/"+resto_id,
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

        // getting all the initial data
        $.ajax(settings).always(function (response) {
            response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
            console.log(response);
            if(response.length == 1) {
                loyId = response[0].id;
                $('#loyaltyReductionAmount').val(response[0].amount);
                $('#loyaltyNumber').val(response[0].points);
                $('input[value="'+response[0].type+'"]').attr('checked', 'checked');
                getRestoProducts(resto_id);
            }
        });
    } catch (err) {
        console.log(err);
    }

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

        loyaltyUpdate(loyId);
    })
    .on('err.form.fv', function(e) {
        e.preventDefault();

        setTimeout(function() {
            $('#loyaltyFormSubmit').removeClass('disabled');
            $('#loyaltyFormSubmit').prop('disabled', false);
            $('body').css('opacity', 1);
        }, 500);
    });
});

$('#loyaltyFormSubmit').on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    $('#loyaltyForm').submit();
});

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

        $('#loyaltyProduct').select2({
            placeholder: "Selecteer een kortingproduct",
            minimumResultsForSearch: 1
        });
        $('.select2-container').css("width", "100%");

        $('#loyaltyProduct').empty();
        $('#loyaltyProduct').append('<option value=""></option>');
        $.each(response, function(index,item) {
            $('#loyaltyProduct').append('<option value="'+item.id+'">'+item.name+'</option>');
        });
    });
}

function loyaltyUpdate(loyaltyId) {
    var updatedLoyalty = {
        'id': loyaltyId,
        'type': $('input[name="loyaltyReductionType"]:checked').val(),
        'amount': $('#loyaltyReductionAmount').val(),
        'points': $('#loyaltyNumber').val()
    };

    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"loyaltybonus",
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
            "data": JSON.stringify(updatedLoyalty)
        }

        // updating loyalty
        $.ajax(settings).always(function (response) {
            $('#loyaltySuccessMsg').removeClass('hidden');
            $('#loyaltyForm').data('formValidation').resetForm();
            $('#loyaltyFormSubmit').removeClass('disabled');
            $('#loyaltyFormSubmit').prop('disabled', false);
            $('body').css('opacity', 1);

            setTimeout(function() {
                $('#loyaltySuccessMsg').addClass('hidden');
            }, 1500);
        });
    } catch (err) {
        console.log(err);
    }
}