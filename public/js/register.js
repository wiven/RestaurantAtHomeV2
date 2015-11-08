const API_URL = 'http://syst.restaurantathome.be/api/';

$(document).ready(function() {var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL + 'restaurantdetail/6',
        "method": "GET",
        "headers": {
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
        console.log('getRestaurant');
        response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));
        console.log(response);
    });

    var totalStepsCount = 2;
    $('.totalStepsCount').text(totalStepsCount);

    $('input[name="optionsUserType"]').on('change', function() {
        console.log($(this).val());
        if($(this).val() == 'consumer') {
            totalStepsCount = 2;
            $('.totalStepsCount').text(totalStepsCount);
            $('.restoRegistration').addClass('hidden');
            $('#SubmitUserBtn').text('Gebruiker registreren');
        } else {
            totalStepsCount = 5;
            $('.totalStepsCount').text(totalStepsCount);
            $('.restoRegistration').removeClass('hidden');
            $('#SubmitUserBtn').text('Gebruiker en restaurant registreren');
        }
    });

    $('input[name="closed"]').on('change', function() {
        if($(this).is(":checked")) {
            console.log($(this).val() + ' closed');
        } else {
            console.log($(this).val() + ' open');
        }

        /*if($(this).val() == 'consumer') {
            totalStepsCount = 2;
            $('.totalStepsCount').text(totalStepsCount);
            $('.restoRegistration').addClass('hidden');
            $('#SubmitUserBtn').text('Gebruiker registreren');
        } else {
            totalStepsCount = 5;
            $('.totalStepsCount').text(totalStepsCount);
            $('.restoRegistration').removeClass('hidden');
            $('#SubmitUserBtn').text('Gebruiker en restaurant registreren');
        }*/
    });
});

$('#registerForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        live: 'enabled',
        locale: 'nl_BE',
        fields: {
            optionsUserType: {
                trigger: 'change',
                validators: {
                    notEmpty: {}
                }
            },
            /*slotAmount: {
                trigger: 'keyup',
                validators: {
                    notEmpty: { },
                    numeric: { },
                    greaterThan: {
                        value: 0
                    }
                }
            }*/
        }
    })
    .on('success.form.fv', function(e) {
        alert('ok');
        e.preventDefault();

        console.log('ok');
    }).on('err.form.fv', function(e) {
    alert('nok');
    e.preventDefault();

    setTimeout(function() {
        $('#actionSubmit').removeClass('disabled');
        $('#actionSubmit').prop('disabled', false);
        $('body').css('opacity', 1);
    }, 750);
});

$('#SubmitUserBtn').off().on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    $('#registerForm').submit();
});