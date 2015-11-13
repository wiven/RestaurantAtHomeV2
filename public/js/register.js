/* DEFINING CONSTANTS */
const API_URL = location.href.split('/')[0]+'//'+location.href.split('/')[2]+'/api/';

/* DEFINING GLOBAL VARIABLES */
var adId = 0, resto_id = 0;

$(document).ready(function() {
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
            fillKitchenTypes();
        }
    });

    $('input[name="closed"]').on('change', function() {
        if($(this).is(":checked")) {
            //console.log($(this).val() + ' closed');
            $('#inputOpeninghours'+$(this).val()).attr('disabled', 'disabled');
            $('#inputOpeninghours'+$(this).val()).val('00:00');
        } else {
            //console.log($(this).val() + ' open');
            $('#inputOpeninghours'+$(this).val()).removeAttr('disabled');
            $('#inputOpeninghours'+$(this).val()).val('');
        }
    });

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"cities/all/",
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
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
        //console.log(response);

        $('#inputPlaceDbLoader').removeClass('hidden');
        $('#inputPlaceDb').addClass('hidden');

        $.each(response, function(index, item) {
            $('#inputPlaceDb').append('<option value="'+item.id+'-'+item.code+'-'+item.name+'">'+item.code+' - '+item.name+'</option>');
        });

        $('#inputPlaceDb').select2({
            placeholder: "Plaats"
        });
        $('#inputPlaceDb').removeClass('hidden');
        $('#inputPlaceDbLoader').addClass('hidden');
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
            inputPassword2: {
                validators: {
                    identical: {
                        field: 'inputPassword1',
                        message: 'Dit moet exact hetzelfde zijn als in het vorige veld'
                    }
                }
            },
            inputZip: {
                validators: {
                    notEmpty: {},
                    digits: {},
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'Een postcode moet exact 4 cijfers lang zijn'
                    }
                }
            },
            inputRestoWebsite: {
                validators: {
                    uri: {
                        message: 'Geef een geldige URL in'
                    }
                }
            },
            inputSlotsTemplate: {
                validators: {
                    notEmpty: {},
                    digits: {}
                }
            }
        }
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();

        // getting ready for creating a new user
        var userInfo = {
            'email': $('#inputEmail').val(),
            'name': $('#inputName').val(),
            'surname': $('#inputSurname').val(),
            'phoneNo': $('#inputPhone').val(),
            'type': $('input[name="optionsUserType"]:checked').val(),
            'socialLogin': "0",
            'password': $.sha256($('#inputPassword1').val())
        };

        //console.log(userInfo);

         try {
             var settings = {
                 "async": true,
                 "crossDomain": true,
                 "url": API_URL+"user",
                 "method": "POST",
                 "headers": {
                     "Access-Control-Allow-Origin":  '*',
                     "content-type": "application/json",
                     "Pragma": "no-cache",
                     "Cache-Control": "no-cache",
                     "Expires": 0
                 },
                 "cache": false,
                 "processData": false,
                 "data": JSON.stringify(userInfo)
             };

             // creating new user
             $.ajax(settings).always(function (response) {
                 response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

                 try {
                     if(response.message.indexOf('exists') != -1) { swal("Oeps...", "Er bestaat al een gebruiker met dit e-mailadres", "error"); }
                 } catch(err) { }

                 try {
                     if(response.hash.length !== 0) {
                         Cookies.set('hash', Base64.encode(response.hash, { expires: 0 }));

                         var inputAddition = '';

                         if($('#inputAddition').val().length != 0) { inputAddition = $('#inputAddition').val(); }

                         // getting the coordinates of the inputted address and create the address
                         try {
                             var settings = {
                                 "async": true,
                                 "crossDomain": true,
                                 "url": "http://maps.google.com/maps/api/geocode/json?address="+encodeURIComponent($('#inputStreet').val()+' '+$('#inputNumber').val()+' '+inputAddition+', '+$('#inputPlaceDb').val().split('-')[2])+"BE&sensor=false",
                                 "method": "GET",
                                 "cache": false,
                                 "processData": false
                             };

                             $.ajax(settings).always(function (response) {
                                 var addressInfo = {
                                     'street': $('#inputStreet').val(),
                                     'number': parseInt($('#inputNumber').val()),
                                     'addition': inputAddition,
                                     'postcode': $('#inputPlaceDb').val().split('-')[1],
                                     'city': $('#inputPlaceDb').val().split('-')[2],
                                     'latitude': response.results[0].geometry.location.lat.toString(),
                                     'longitude': response.results[0].geometry.location.lng.toString(),
                                     'cityid': $('#inputPlaceDb').val().split('-')[0]
                                 };

                                 //console.log(addressInfo);

                                 var settings = {
                                     "async": true,
                                     "crossDomain": true,
                                     "url": API_URL+"user/address",
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
                                     "data": JSON.stringify(addressInfo)
                                 };

                                 // creating address for user
                                 $.ajax(settings).always(function (response) {
                                     response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

                                     try {
                                         if(response.id !== 0) {
                                             adId = response.id;
                                             $('#registerForm').data('formValidation').resetForm();
                                             $('#SubmitUserBtn').removeClass('disabled');
                                             $('#SubmitUserBtn').prop('disabled', false);
                                             $('body').css('opacity', 1);
                                             if($('input[name="optionsUserType"]:checked').val() == 'Client') {
                                                 swal({
                                                     title: "<i class='fa fa-check'></i><br />Proficiat!",
                                                     text: "Uw account werd succesvol aangemaakt.<br />U kan zich <a href='/login'>hier</a> aanmelden.",
                                                     html: true
                                                 });
                                             } else {
                                                 // adding the new restaurant
                                                 try {
                                                     var restoInfo = {
                                                         'name': $('#inputRestoName').val(),
                                                         'kitchentypeId': $('#inputRestoType').val(),
                                                         'addressId': adId,
                                                         'phone': $('#inputRestoPhone').val(),
                                                         'email': $('#inputRestoEmail').val(),
                                                         'url': $('#inputRestoWebsite').val(),
                                                         'photo': null,
                                                         'dominatingColor': "#ffffff",
                                                         'comment': $('#inputRestoDescription').val()
                                                     };

                                                     var settings = {
                                                         "async": true,
                                                         "crossDomain": true,
                                                         "url": API_URL+"restaurant",
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
                                                         "data": JSON.stringify(restoInfo)
                                                     }

                                                     // creating new restaurant
                                                     $.ajax(settings).always(function (response) {
                                                         response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

                                                         try {
                                                             if(response.id.length !== 0) {
                                                                 resto_id = response.id;

                                                                 // adding the openinghours
                                                                 try {
                                                                     for (i = 0; i < 7; i++) {
                                                                         for (j = 0; j < $('#inputOpeninghours'+i).val().split(',').length; j++) {
                                                                             var opened = 1;
                                                                             var toT = '00:00';
                                                                             if($('#inputOpeninghours'+i).parent().parent().find('input[name="closed"]').prop('checked')) { opened = 0; }
                                                                             if(!$('#inputOpeninghours'+i).parent().parent().find('input[name="closed"]').prop('checked')) {
                                                                                 toT = $('#inputOpeninghours'+i).val().split(',')[j].split('-')[1];
                                                                             }

                                                                             var ohInfo = {
                                                                                 'restaurantId': resto_id,
                                                                                 'dayOfWeek': i,
                                                                                 'fromTime': $('#inputOpeninghours'+i).val().split(',')[j].split('-')[0],
                                                                                 'toTime': toT,
                                                                                 'open': opened
                                                                             };

                                                                             console.log(ohInfo);

                                                                             var settings = {
                                                                                 "async": true,
                                                                                 "crossDomain": true,
                                                                                 "url": API_URL+"restaurant/openinghour",
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
                                                                                 "data": JSON.stringify(ohInfo)
                                                                             };

                                                                             $.ajax(settings).always(function (response) {
                                                                                 response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

                                                                                 try {
                                                                                     swal({
                                                                                         title: "<i class='fa fa-check'></i><br />Proficiat!",
                                                                                         text: "Uw account werd succesvol aangemaakt.<br />U kan zich <a href='/login'>hier</a> aanmelden.",
                                                                                         html: true
                                                                                     });
                                                                                     $('#registerForm').data('formValidation').resetForm();
                                                                                     $('#SubmitUserBtn').removeClass('disabled');
                                                                                     $('#SubmitUserBtn').prop('disabled', false);
                                                                                     $('body').css('opacity', 1);
                                                                                 } catch (err) {
                                                                                     //alert('322: Er bestaat al een gebruiker met dit e-mailadres!');
                                                                                     console.log('322');
                                                                                     console.log(err);
                                                                                     $('#SubmitUserBtn').removeClass('disabled');
                                                                                     $('#SubmitUserBtn').prop('disabled', false);
                                                                                     $('body').css('opacity', 1);
                                                                                 }

                                                                             });
                                                                         }
                                                                     }

                                                                     // setting the default amount of slots
                                                                     try {
                                                                         var settings = {
                                                                             "async": true,
                                                                             "crossDomain": true,
                                                                             "url": API_URL+"slots/template/generate/"+resto_id+"/30/"+$('#inputSlotsTemplate').val(),
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
                                                                         });
                                                                     } catch (err) {
                                                                         console.log(err);
                                                                     }
                                                                 } catch (err) {
                                                                     console.log(err);
                                                                 }
                                                             }
                                                         } catch (err) {
                                                             console.log('Het restaurant werd helaas niet toegevoegd!');
                                                             $('#SubmitUserBtn').removeClass('disabled');
                                                             $('#SubmitUserBtn').prop('disabled', false);
                                                             $('body').css('opacity', 1);
                                                         }

                                                     });
                                                 } catch (err) {
                                                     console.log(err);
                                                 }
                                             }
                                         }
                                     } catch (err) {
                                         $('#SubmitUserBtn').removeClass('disabled');
                                         $('#SubmitUserBtn').prop('disabled', false);
                                         $('body').css('opacity', 1);
                                     }

                                 });

                             });
                         } catch (err) {
                             console.log(err);
                         }

                         $('#registerForm').data('formValidation').resetForm();
                         $('#SubmitUserBtn').removeClass('disabled');
                         $('#SubmitUserBtn').prop('disabled', false);
                         $('body').css('opacity', 1);
                     }
                 } catch (err) {
                     //alert('395: Er bestaat al een gebruiker met dit e-mailadres!');
                     console.log('395');
                     console.log(err);
                     $('#SubmitUserBtn').removeClass('disabled');
                     $('#SubmitUserBtn').prop('disabled', false);
                     $('body').css('opacity', 1);
                 }
             });
         } catch (err) {
            console.log(err);
         }
    }).on('err.form.fv', function(e) {
        swal("Oeps...", "Gelieve alle velden correct in te vullen", "error");
        e.preventDefault();

        setTimeout(function() {
            $('#actionSubmit').removeClass('disabled');
            $('#actionSubmit').prop('disabled', false);
            $('body').css('opacity', 1);
        }, 750);
    }
);

$('#SubmitUserBtn').off().on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    $('#registerForm').submit();
});

function fillKitchenTypes() {
    // filling all the kitchen types
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"manage/kitchentype/all/",
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
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
        //console.log(response);

        $.each(response, function(index, item) {
            $('#inputRestoType').append('<option value="'+item.id+'">'+item.name+'</option>');
        });
    });
}