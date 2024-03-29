/* DEFINING CONSTANTS */
const API_URL = location.href.split('/')[0]+'//'+location.href.split('/')[2]+'/api/';

/* DEFINING (GLOBAL) VARIABLES */
var resto_id = Base64.decode(Cookies.get('restoId'));
var map = '', restoName = '', specialtyId = 0, kitchenTypeIdDb = 0, addressIdDb = 0;
var latDb = '', lngDb = '';
var setHeader;
var addressArray = Array();
var weekDayNames = Array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
var weekDayNamesNL = Array('maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag', 'zondag');
var contactInfoFormOK = false, SocialFormOK = false;
var realOH = Array('', '', '', '', '', '', '');
var temp = '';

// When the document is ready
$(document).ready(function () {
    // get all the resto data
    getInitialRestoInfo(resto_id);
    // get all the social media links
    //getSocialLinks(resto_id);

    $(".day_openings").bootstrapSwitch({
        onText: 'open',
        onColor: 'success',
        offText: 'gesloten',
        offColor: 'danger'
    });

    // handles the logo upload
    logoUpload();

    // handle file upload for resto photos
    restoPhotosUpload();

    // setting the header for photouploads
    setHeader = function (xhr) {
        xhr.setRequestHeader('hash', Base64.decode(Cookies.get('hash')));
    };
});

$('#editSocialModal').off().on('show.bs.modal', function() {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/socialmedia/all/" + resto_id,
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    // creating new product
    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        $.each(response, function(index,item) {
            switch(response[index].socialmediatypeId) {
                case "1":
                    if(response[index].url.length != 0) {
                        $('#SocialFacebook').val(response[index].url);
                        $('#SocialFacebook').attr('data-id', response[index].id);
                    }
                    break;
                case "2":
                    //if(response[index].url.length != 0) {
                        $('#SocialTwitter').val(response[index].url);
                        $('#SocialTwitter').attr('data-id', response[index].id);
                    //}
                    break;
                case "3":
                    //if(response[index].url.length != 0) {
                        $('#SocialInstagram').val(response[index].url);
                        $('#SocialInstagram').attr('data-id', response[index].id);
                    //}
                    break;
                default: console.log();
            }
        });
    });
});

$('#SocialForm').formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-times',
        validating: 'fa fa-refresh'
    },
    live: 'enabled',
    locale: 'nl_BE',
    fields: {
        SocialFacebook: {
            validators: {
                uri: {
                    protocol: 'https',
                    allowEmptyProtocol: false,
                    message: 'Moet beginnen met "https://facebook.com/"'
                },
                stringLength: {
                    min: 0,
                    max: 80
                }
            }
        },
        SocialTwitter: {
            validators: {
                uri: {
                    protocol: 'https',
                    allowEmptyProtocol: false,
                    message: 'Moet beginnen met "https://twitter.com/"'
                }
            }
        },
        SocialInstagram: {
            validators: {
                uri: {
                    protocol: 'https',
                    allowEmptyProtocol: false,
                    message: 'Moet beginnen met "https://instagram.com/"'
                }
            }
        }
    }
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();
        SocialFormOK = true;
        //console.log('OK');
        //$('#SocialFormSubmit').trigger('click');

        // Facebook
        if(document.getElementById('SocialFacebook').hasAttribute('data-id')) {
            if($('#SocialFacebook').val().length != 0) {
                updateSocialLink(resto_id, 1, $('#SocialFacebook').attr('data-id'), $('#SocialFacebook').val());
                $('#facebookLogo').attr('href', $('#SocialFacebook').val());
                $('#facebookLogo').removeClass('hidden');
            } else {
                deleteSocialLink($('#SocialFacebook').attr('data-id'));
                $('#SocialFacebook').removeAttr('data-id');
                $('#facebookLogo').removeAttr('href');
                $('#facebookLogo').addClass('hidden');
            }
        } else {
            if($('#SocialFacebook').val().length != 0) {
                addSocialLink(resto_id, 1, $('#SocialFacebook').val());
                $('#facebookLogo').attr('href', $('#SocialFacebook').val());
                $('#facebookLogo').removeClass('hidden');
            }
        }

        // Twitter
        if(document.getElementById('SocialTwitter').hasAttribute('data-id')) {
            if($('#SocialTwitter').val().length != 0) {
                updateSocialLink(resto_id, 2, $('#SocialTwitter').attr('data-id'), $('#SocialTwitter').val());
                $('#twitterLogo').attr('href', $('#SocialTwitter').val());
                $('#twitterLogo').removeClass('hidden');
            } else {
                deleteSocialLink($('#SocialTwitter').attr('data-id'));
                $('#SocialTwitter').removeAttr('data-id');
                $('#twitterLogo').removeAttr('href');
                $('#twitterLogo').addClass('hidden');
            }
        } else {
            if($('#SocialTwitter').val().length != 0) {
                addSocialLink(resto_id, 2, $('#SocialTwitter').val());
                $('#twitterLogo').attr('href', $('#SocialTwitter').val());
                $('#twitterLogo').removeClass('hidden');
            }
        }

        // Instagram
        if(document.getElementById('SocialInstagram').hasAttribute('data-id')) {
            if($('#SocialInstagram').val().length != 0) {
                updateSocialLink(resto_id, 3, $('#SocialInstagram').attr('data-id'), $('#SocialInstagram').val());
                $('#instagramLogo').attr('href', $('#SocialFacebook').val());
                $('#instagramLogo').removeClass('hidden');
            } else {
                deleteSocialLink($('#SocialInstagram').attr('data-id'));
                $('#SocialInstagram').removeAttr('data-id');
                $('#instagramLogo').removeAttr('href');
                $('#instagramLogo').addClass('hidden');
            }
        } else {
            if($('#SocialInstagram').val().length != 0) {
                addSocialLink(resto_id, 3, $('#SocialInstagram').val());
                $('#instagramLogo').attr('href', $('#SocialInstagram').val());
                $('#instagramLogo').removeClass('hidden');
            }
        }
});

$('#contactInfoForm').formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-times',
        validating: 'fa fa-refresh'
    },
    live: 'enabled',
    locale: 'nl_BE',
    fields: {
        restoName: {
            validators: {
                notEmpty: {},
                stringLength: {
                    min: 3,
                    max: 80
                }
            }
        },
        restoAddress: {
            validators: {
                notEmpty: {},
                stringLength: {
                    min: 8,
                    max: 80
                }
            }
        },
        restoPhone: {
            validators: {
                notEmpty: {},
                numeric: {
                    message: 'Gelieve enkel cijfers in te geven'
                }
            }
        },
        restoEmail: {
            validators: {
                notEmpty: {},
                emailAddress: {
                    multiple: false,
                    message: 'Gelieve een geldig e-mailadres in te geven'
                }
            }
        },
        restoWebsite: {
            validators: {
                uri: {
                    protocol: 'http',
                    allowEmptyProtocol: false,
                    message: 'Moet beginnen met "http://"'
                }
            }
        },
        restoSpecialty: {
            validators: {
                notEmpty: {}
            }
        },
        restoKitchenType: {
            validators: {
                notEmpty: {}
            }
        },
        restoComment: {
            validators: {
                stringLength: {
                    min: 0,
                    max: 80
                }
            }
        }
    }
})
    .on('success.form.fv', function(e) {
        e.preventDefault();
        contactInfoFormOK = true;

        var restoAddressInputted = $('[name="restoAddress"]').val();

        addressArray["id"] = addressIdDb;
        addressArray["street"] = restoAddressInputted.split(' ')[0];
        if(restoAddressInputted.split(' ')[1].indexOf(',') != -1) {
            addressArray["number"] = restoAddressInputted.split(' ')[1].substr(0, restoAddressInputted.split(' ')[1].length-1);
        } else {
            addressArray["number"] = restoAddressInputted.split(' ')[1];
        }
        addressArray["addition"] = '';
        addressArray["postcode"] = restoAddressInputted.split(' ')[2];
        addressArray["city"] = restoAddressInputted.split(' ')[3];

        getCoordinatesAndUpdateAddress(addressArray["street"]+'+'+addressArray["number"]+'+'+addressArray["postcode"]+'+'+addressArray["city"]);

        var updatedRestoInfo = Array();

        updatedRestoInfo['name'] = $('[name="restoName"]').val();
        updatedRestoInfo['phone'] = $('[name="restoPhone"]').val();
        updatedRestoInfo['email'] = $('[name="restoEmail"]').val();
        updatedRestoInfo['website'] = $('[name="restoWebsite"]').val();
        updatedRestoInfo['specialty'] = $('[name="restoSpecialty"]').val();
        updatedRestoInfo['kitchen'] = $('[name="restoKitchenType"]').val();
        updatedRestoInfo['comment'] = $('[name="restoComment"]').val();

        //console.log(updatedRestoInfo);

        updateRestoInfo(updatedRestoInfo, resto_id);

        setTimeout(function() {
            getInitialRestoInfo(resto_id);
        }, 500);
    });

$('#SocialFormSubmit').on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    $('#SocialForm').submit();
    setTimeout(function() {
        if(SocialFormOK) {
            $('body').css('opacity', 1);
            $('#editSocialModal').modal('hide');
        } else {
            $('body').css('opacity', 1);
            $('#SocialFormSubmit').removeClass('disabled');
            $('#SocialFormSubmit').prop('disabled', false);
        }
    }, 500);
});

$('#contactInfoFormSubmit').on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    $('#contactInfoForm').submit();
    setTimeout(function() {
        if(contactInfoFormOK) {
            $('body').css('opacity', 1);
            $('#editContactModal').modal('hide');
        } else {
            $('body').css('opacity', 1);
            $('#contactInfoFormSubmit').removeClass('disabled');
            $('#contactInfoFormSubmit').prop('disabled', false);
        }
    }, 500);
});

$('#CoverPhotoFormSubmit').on('click', function(evt) {
    $('#CoverPhotoForm').submit();
});

$('#paymentsFormSubmit').on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    $('#paymentsForm').submit();
});

$('#openingHoursFormSubmit').on('click', function(evt) {
    evt.preventDefault();
    $('body').css('opacity', 0.5);
    $(this).addClass('disabled');
    $(this).prop('disabled', true);
    $('#openingHoursForm').submit();
});

$('#openingHoursForm').on('submit', function(evt) {
    evt.preventDefault();

    var allOk = true;
    var checkOpen = 0;

    $.each(weekDayNames, function(index,item) {
        var toCheck = $('#hours'+weekDayNames[index]).val();
        if(toCheck.length != 0) {
            if((toCheck.substr(2,1) == ':') && (toCheck.substr(5,1) == '-') && (toCheck.substr(8,1) == ':')) {
                //console.log('uur ok');
            } else {
                //console.log('uur nok');
                allOk = false;
                swal({ title: "Opgelet!", text: 'Het openingsuur van '+weekDayNamesNL[index]+' klopt niet!', type: "error" });
            }
        } else {
            /*addOpeningHours(
                resto_id,
                weekDayNames.indexOf(weekDayNames[index]),
                $('#hours'+weekDayNames[index]).val().substr(0,5)+':00',
                $('#hours'+weekDayNames[index]).val().substr(6,5)+':00',
                0
            );*/
        }
    });

    //console.log(allOk);

    if(allOk) {
        $.each(weekDayNames, function(idx,item) {
            if($('#hours'+weekDayNames[idx]).val().length != 0) {
                checkOpen = 1;

                $.each($('#hours'+weekDayNames[idx]).val().split(';'), function(index, item) {
                    updateOpeningHours(
                        parseInt($('#hours'+weekDayNames[idx]).attr('data-id')),
                        weekDayNames.indexOf(weekDayNames[idx]),
                        $('#hours'+weekDayNames[idx]).val().substr(0,5)+':00',
                        $('#hours'+weekDayNames[idx]).val().substr(6,5)+':00',
                        checkOpen
                    );
                });

                /*updateOpeningHours(
                    parseInt($('#hours'+weekDayNames[idx]).attr('data-id')),
                    weekDayNames.indexOf(weekDayNames[idx]),
                    $('#hours'+weekDayNames[idx]).val().substr(0,5)+':00',
                    $('#hours'+weekDayNames[idx]).val().substr(6,5)+':00',
                    checkOpen
                );*/
            } else {
                checkOpen = 0;

                addOpeningHours(
                    weekDayNames.indexOf(weekDayNames[idx]),
                    '00:00:00',
                    '00:00:00',
                    checkOpen
                );
            }
        });

        getInitialRestoInfo(resto_id);

        $('#editOpeningHoursModal').modal('hide');
        $('body').css('opacity', 1);
        $('#openingHoursFormSubmit').removeClass('disabled');
        $('#openingHoursFormSubmit').prop('disabled', false);
    }
});

$('.day_openings').on('switchChange.bootstrapSwitch', function(event, state) {
    var changedElement = $(this)[0];
    var dayChange = changedElement.name.substr(4, changedElement.name.length);

    if(state) {
        $('#hours'+dayChange).show();
    } else {
        $('#hours'+dayChange).hide();
    }
    //console.log($(this).closest('.edit_hours_link'));
});

$('.edit_hours_link').on('click', function() {
    var dayClicked = $(this).attr('id').substr(6, $(this).attr('id').length);
    console.log(weekDayNames.indexOf(dayClicked));

    swal({
        title: "...",
        text: "Wat zijn de openingsuren voor "+weekDayNamesNL[weekDayNames.indexOf(dayClicked)]+"?",
        type: "input",
        showCancelButton: true,
        cancelButtonText: "Annuleren",
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "13:00"
    }, function(inputValue){
        if (inputValue === false) return false;
        if (inputValue === "") {
            swal.showInputError("You need to write something!");
            return false
        }
        swal("Nice!", "You wrote: " + inputValue, "success");
    });
});

$('#paymentsForm').on('submit', function(evt) {
    evt.preventDefault();
    updatePayments();
});

$('#CoverPhotoForm').on('submit', function(evt) {
    console.log($(this).serialize());
    evt.preventDefault();
    //updateCoverPhoto($('[name="files"]').get(0).files[0], resto_id);
    updateCoverPhoto($(this).serializeArray(), resto_id);
});

$('#mapsModal').off().on('shown.bs.modal', function() {
    map = new google.maps.Map(document.getElementById('mapCanvas'), {
        zoom: 13,
        center: new google.maps.LatLng($('.restoAddress').attr('data-lat'), $('.restoAddress').attr('data-long')),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true,
        zoomControl: true
    });

    var image = '../../public/img/resto_marker.png';
    var infowindow = new google.maps.InfoWindow();

    var marker = new google.maps.Marker({
        position: {lat: parseFloat($('.restoAddress').attr('data-lat')), lng: parseFloat($('.restoAddress').attr('data-long'))},
        map: map,
        title: restoName,
        icon: image
    });

    google.maps.event.addListener(marker, 'click', (function (marker) {
        return function () {
            infowindow.setContent('<a href="https://www.google.com/maps?daddr='+parseFloat($('.restoAddress').attr('data-lat'))+','+parseFloat($('.restoAddress').attr('data-long'))+'&saddr" target="_blank">Routebeschrijving naar '+restoName+'</a>');
            infowindow.open(map, marker);
        }
    })(marker));

    google.maps.event.trigger(map, "resize");
});

$('#editContactModal').off().on('show.bs.modal', function() {
    modalLoading('editContactModal', 'contactModalLoaderDiv');

    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL + "dashboard/profile/" + resto_id,
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
            if(response.status != 401) {
                response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
            } else {
                return;
            }

            restoName = response.restaurantInfo.name;
            $('input[name="restoName"]').val(response.restaurantInfo.name);
            $('[name="restoComment"]').text(response.restaurantInfo.comment);

            kitchenTypeIdDb = response.restaurantInfo.kitchentypeId;
            getKitchenType(response.restaurantInfo.kitchentypeId);

            // setting the 'edit contact modal' values
            $('input[name="restoAddress"]').val(response.addressInfo.street+' '+response.addressInfo.number+', '+response.addressInfo.postcode+' '+response.addressInfo.city);
            $('input[name="restoPhone"]').val(response.restaurantInfo.phone);
            $('input[name="restoEmail"]').val(response.restaurantInfo.email);
            $('input[name="restoWebsite"]').val(response.restaurantInfo.url);

            // filling the 'specialty' dropdown
            getKitchenTypes();

            // filling the 'specialty' dropdown
            fillSpecialties();
            if(response.specialties.length != 0) {
                specialtyId = response.specialties[0].id;
            }

            setTimeout(function() {
                try {
                    $('[name="restoSpecialty"]').val(response.specialties[0].id);
                } catch (err) {
                    $('[name="restoSpecialty"]').val('');
                }

                try {
                    $('[name="restoKitchenType"]').val(response.restaurantInfo.kitchentypeId);
                } catch (err) {
                    $('[name="restoKitchenType"]').val('');
                }

                // hiding the loader and showing the content
                modalLoaded('editContactModal', 'contactModalLoaderDiv');
            },500);


        });
    } catch (err) {
        console.log(err);
    }
});

$('#editPaymentsModal').off().on('show.bs.modal', function() {
    modalLoading('editPaymentsModal', 'paymentsModalLoaderDiv');
    // getting all the payment methods
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"manage/paymentmethod/all/",
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        $('#paymentsForm').empty();

        $.each(response, function(index,item) {
            $('#paymentsForm').append('<div class="checkbox"><label><input type="checkbox" value="'+response[index].id+'" name="payment'+response[index].id+'">'+response[index].name+'</label></div>');
        });
    });

    // setting the payment methods for the restaurant
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/paymentmethod/"+resto_id,
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

        $.each(response, function(index,item) {
            $('[name="payment'+response[index].id+'"]').attr("checked", true);
        });

        modalLoaded('editPaymentsModal', 'paymentsModalLoaderDiv');
    });
});

$('#editOpeningHoursModal').off().on('show.bs.modal', function() {
    getOpeningHours();
});

$('#editSocialModal').on('hide.bs.modal', function(e) {
    $('#SocialForm').data('formValidation').resetForm();
    $('#SocialFormSubmit').removeClass('disabled');
    $('#SocialFormSubmit').prop('disabled', false);
});

$('#editContactModal').on('hide.bs.modal', function(e) {
    $('#contactInfoForm').data('formValidation').resetForm();
    $('#contactInfoFormSubmit').removeClass('disabled');
    $('#contactInfoFormSubmit').prop('disabled', false);
});

function getKitchenType(kitchenTypeId) {
    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"manage/kitchentype/" + kitchenTypeId,
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

            if(response[0].name.length != 0) {
                $('.restoKitchen').html(response[0].name);
                kitchenTypeIdDb = response.id;
            } else {
                $('.restoKitchen').hide();
            }
        });
    } catch (err) {
        console.log(err);
    }
}

function getSocialLinks(restoId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/socialmedia/all/" + restoId,
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

    // creating new product
    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        $.each(response, function(index,item) {
            switch(response[index].socialmediatypeId) {
                case "1":
                    if(response[index].url.length != 0) {
                        $('#facebookLogo').attr('href', response[index].url);
                        $('#facebookLogo').removeClass('hidden');
                    }
                    break;
                case "2":
                    if(response[index].url.length != 0) {
                        $('#twitterLogo').attr('href', response[index].url);
                        $('#twitterLogo').removeClass('hidden');
                    }
                    break;
                case "3":
                    if(response[index].url.length != 0) {
                        $('#instagramLogo').attr('href', response[index].url);
                        $('#instagramLogo').removeClass('hidden');
                    }
                    break;
                default: console.log();
            }
        });
    });
}

function getRestoPhotos(restoId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"photo/restaurant/" + restoId,
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

    // adding photos to UI
    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        $('.carousel-indicators').empty();
        $('.carousel-inner').empty();
        $('#existingRestoPhotos').empty();

        if(response.length != 0) {
            $.each(response, function(index,item) {
                $('#existingRestoPhotos').append(
                    '<li class="list-group-item col-lg-6 col-md-6 col-xs-12">'+
                        '<img src="'+item.url.thumbnailUrl+'" style="max-width: 1OOpx; max-height: 100px;" alt="Sfeerfoto restaurant" />'+
                        '<a href="#" class="btn btn-danger pull-right btnDeleteRestoPhoto" title="Foto verwijderen" data-id="'+item.id+'">'+
                            '<span class="fa fa-trash-o fa-fw fa-2x pull-right"></span>'+
                        '</a>'+
                    '</li>');
                if(index == 0) {
                    $('.carousel-indicators').append('<li data-target="#carousel-resto-photos" data-slide-to="'+index+'" class="active"></li>');

                    $('.carousel-inner').append(
                        '<div class="item active">'+
                            '<img src="'+item.url.thumbnailUrl+'" alt="Sfeerfoto">'+
                            '<div class="carousel-caption"></div>'+
                        '</div>');
                } else {
                    $('.carousel-indicators').append('<li data-target="#carousel-resto-photos" data-slide-to="'+index+'"></li>');

                    $('.carousel-inner').append(
                        '<div class="item">'+
                            '<img src="'+item.url.thumbnailUrl+'" alt="Sfeerfoto">'+
                            '<div class="carousel-caption"></div>'+
                        '</div>');
                }

            });

            $('#photosLogo').removeClass('hidden');
        } else {
            $('#existingRestoPhotos').append('<li class="list-group-item col-xs-12 text-center">Er zijn nog geen foto\'s voor dit restaurant. Voeg er snel enkele toe door op de groene knop "Toevoegen" hierboven te klikken.</li>');
            $('#photosLogo').addClass('hidden');
        }

        $('.btnDeleteRestoPhoto').on('click', function() {
            var btn = $(this);
            swal({
                title: "Bent u zeker dat u deze foto wil verwijderen?",
                text: "Let op: dit is onomkeerbaar!",
                cancelButtonText: "Annuleren",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            },
            function(){
                setTimeout(function(){
                    $('#existingRestoPhotos').empty();
                    $('#existingRestoPhotos').append('<span class="fa fa-spinner fa-spin fa-5x fa-fw" style="width: 100%; z-index: 9999;"></span>');
                    deleteRestoPhoto(btn.attr('data-id'));
                    swal("Foto werd verwijderd!");


                    setTimeout(function(){
                        getRestoPhotos(resto_id);
                    }, 500);
                }, 500);
            });
        });
    });
}

function deleteRestoPhoto(phId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"photo/restaurant/delete/" + phId,
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

    // adding photos to UI
    $.ajax(settings).always(function (response) {});
}

function addSocialLink(restoId, typeId, typeValue) {
    var socialLink = {
        "restaurantId": restoId,
        "socialmediatypeId": typeId,
        "url": typeValue
    };

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/socialmedia",
        "method": "POST",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "content-type": "application/json"
        },
        "cache": false,
        "processData": false,
        "data": JSON.stringify(socialLink)
    }

    $.ajax(settings).always(function (response) {
        console.log(response);
    });
}

function updateSocialLink(restoId, typeId, recordId, typeValue) {
    var socialLink = {
        "id": recordId,
        "restaurantId": restoId,
        "socialmediatypeId": typeId,
        "url": typeValue
    };

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/socialmedia",
        "method": "PUT",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "content-type": "application/json"
        },
        cache: false,
        "processData": false,
        "data": JSON.stringify(socialLink)
    }

    $.ajax(settings).always(function (response) {
        //console.log(response);
    });
}

function deleteSocialLink(recordId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/socialmedia/delete/"+recordId,
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "content-type": "application/json"
        },
        "processData": false
    }

    $.ajax(settings).always(function (response) {
        //console.log(response);
    });
}

function getInitialRestoInfo(restoId) {
    $('#loaderDiv').removeClass('hidden');
    $('#restoInfoDiv').addClass('hidden');

    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL + "dashboard/profile/" + restoId,
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
            if(response.status != 401) {
                response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
            } else {
                return;
            }

            //console.log(response);

            restoName = response.restaurantInfo.name;

            // LEFT COLUMN
            $('.restoAddress').html(response.addressInfo.street+' '+response.addressInfo.number+', '+response.addressInfo.postcode+' '+response.addressInfo.city);
            setLatLongAddress(response.addressInfo.id);
            addressIdDb = response.addressInfo.id;

            $('.restoPhone').html(response.restaurantInfo.phone);
            $('.restoEmail').html('<a href="mailto:'+response.restaurantInfo.email+'">'+response.restaurantInfo.email+'</a>');
            $('.restoUrl').html('<a href="'+response.restaurantInfo.url+'" target="_blank">'+response.restaurantInfo.url+'</a>');

            if(response.specialties.length != 0) {
                $('.restoSpecialty').html(response.specialties[0].name);
            } else {
                $('.restoSpecialtyDiv').hide();
            }

            kitchenTypeIdDb = response.restaurantInfo.kitchentypeId;
            getKitchenType(response.restaurantInfo.kitchentypeId);
            getSocialLinks(resto_id);
            getRestoPhotos(resto_id);

            // CENTER COLUMN
            if(response.restaurantInfo.logoPhoto != null) {
                $('.restoLogo').attr('src', response.restaurantInfo.logoPhoto.url);
            } else {
                $('.restoLogo').attr('src', 'http://placehold.it/450x210');
            }

            // RIGHT COLUMN
            var openingHoursContent = '';
            var daysOfWeek = Array('Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za', 'Zo');
            var openingHoursFromDB = Array();
            var d = new Date();
            var n = d.getDay();

            $.each(response.openingHours, function(index,item) {
                if(realOH[item.dayOfWeek].length != 0) {
                    realOH[item.dayOfWeek] += ' & '+item.fromTime.substr(0, item.fromTime.length-3)+' - '+item.toTime.substr(0, item.toTime.length-3);
                } else {
                    realOH.splice(item.dayOfWeek, 0, item.fromTime.substr(0, item.fromTime.length-3)+' - '+item.toTime.substr(0, item.toTime.length-3));
                }

                //console.log(item);
                /*var day = item.dayOfWeek;

                if(item.open == "0") {
                    openingHoursFromDB[day] = daysOfWeek[day]+': Gesloten';
                } else {
                    var from = item.fromTime.substr(0, item.fromTime.length-3);
                    var to = item.toTime.substr(0, item.toTime.length-3);
                    openingHoursFromDB[day] = daysOfWeek[day]+': '+from+' - '+to;
                }*/
            });

            $.each(realOH, function(index,item) {
                if(item.length != 0) {
                    if(item.substr(0,1) == "0") {
                        if(index == 0) { temp = daysOfWeek[index]+': Gesloten'; }
                        if(index == (n)) {
                            if(index != 0) { openingHoursContent+='<strong>Gesloten</strong>'; }
                        } else {
                            if(index != 0) { openingHoursContent+=daysOfWeek[index]+': Gesloten'; }
                        }
                    } else {
                        if(index == 0) {
                            temp = daysOfWeek[index]+': '+item;
                        }
                        if(index == (n)) {
                            if(index != 0) { openingHoursContent+='<strong>'+daysOfWeek[index]+': '+item+'</strong>'; }
                        } else {
                            if(index != 0) { openingHoursContent+=daysOfWeek[index]+': '+item; }
                        }
                    }

                    if(index != 0) { openingHoursContent+='<br />'; }
                }
            });

            /*$.each(openingHoursFromDB, function(index,item) {
                if(typeof(openingHoursFromDB[index]) != "undefined") {
                    if(index == (n-1)) {
                        openingHoursContent+='<strong>'+openingHoursFromDB[index]+'</strong>';
                    } else {
                        openingHoursContent+=openingHoursFromDB[index];
                    }
                    openingHoursContent+='<br />';
                }
            });*/

            // resetting the payment methods
            $('.PaymentCash').addClass('hidden');
            $('.PaymentBancontact').addClass('hidden');
            $('.PaymentCredit').addClass('hidden');
            $('.PaymentBitcoin').addClass('hidden');
            $('.PaymentSodexo').addClass('hidden');
            $('.PaymentEMV').addClass('hidden');

            // setting the payment methods
            $.each(response.paymentMethods, function(index,item) {

                //console.log(response.paymentMethods[index].id);

                switch(item.id) {
                    case "1":
                        $('.PaymentCash').removeClass('hidden');
                        break;
                    case "2":
                        $('.PaymentBancontact').removeClass('hidden');
                        break;
                    case "3":
                        $('.PaymentCredit').removeClass('hidden');
                        break;
                    case "4":
                        $('.PaymentBitcoin').removeClass('hidden');
                        break;
                    case "5":
                        $('.PaymentSodexo').removeClass('hidden');
                        break;
                    case "6":
                        $('.PaymentEMV').removeClass('hidden');
                        break;
                    default: console.log();
                }
            });

            $('#RestoOpeningHours').html(openingHoursContent+temp);

            // setting the 'edit contact modal' values
            /*$('input[name="restoAddress"]').val(response.addressInfo.street+' '+response.addressInfo.number+', '+response.addressInfo.postcode+' '+response.addressInfo.city);
            $('input[name="restoPhone"]').val(response.restaurantInfo.phone);
            $('input[name="restoEmail"]').val(response.restaurantInfo.email);
            $('input[name="restoWebsite"]').val(response.restaurantInfo.url);*/

            // filling the 'specialty' dropdown
            //fillSpecialties();
            if(response.specialties.length != 0) {
                specialtyId = response.specialties[0].id;
            }

            // filling the 'specialty' dropdown
            //getKitchenTypes();

            getAndSetPayments();

            // hiding the loader and showing the content
            $('#loaderDiv').addClass('hidden');
            $('#restoInfoDiv').removeClass('hidden');
        });
    } catch (err) {
        console.log(err);
    }
}

function setLatLongAddress(addressId) {
    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"user/address/" + addressId,
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
            //console.log(response);

            $('.restoAddress').attr('data-lat', response.latitude);
            $('.restoAddress').attr('data-long', response.longitude);
        });
    } catch (err) {
        console.log(err);
    }
    /*


    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"user/address/" + addressId,
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

    // creating new product
    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));


    });*/
}

function fillSpecialties() {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/speciality/all/",
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    // creating new product
    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        $('[name="restoSpecialty"]').empty();
        $('[name="restoSpecialty"]').append('<option></option>');

        $.each(response, function(index,item) {
            if(response[index].name.length != 0) {
                $('[name="restoSpecialty"]').append('<option value="'+response[index].id+'">'+response[index].name+'</option>');
            }
        });
    });
}

function deleteSpecialty(restoId, specialtyId) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/speciality/delete/"+restoId+"/"+specialtyId,
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
    });
}

function getKitchenTypes() {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"manage/kitchentype/all/",
        "method": "GET",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "content-type": "application/json",
            "Pragma": "no-cache" ,
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    }

    // creating new product
    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        $('[name="restoKitchenType"]').empty();
        $('[name="restoKitchenType"]').append('<option></option>');

        $.each(response, function(index,item) {
            if(item.name.length != 0) {
                $('[name="restoKitchenType"]').append('<option value="'+item.id+'">'+item.name+'</option>');
            }
        });
    });
}

function updateCoverPhoto(file, restoId) {
	'use strict';
	
    var url = API_URL+'photo/restaurant/logo/'+restoId;
    
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        beforeSend: function ( xhr ) {
            setHeader(xhr);
        },
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            /*$('#progress .progress-bar').css(
                'width',
                progress + '%'
            );*/
			
			if(progress == 100) {
				$('#editCoverModal').modal('hide');
            }
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function getCoordinatesAndUpdateAddress(address) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://maps.googleapis.com/maps/api/geocode/json?address="+address+"&sensor=false",
        "method": "GET",
        "cache": false,
        "processData": false
    }

    $.ajax(settings).always(function (response) {
        addressArray["latitude"] = (response.results[0].geometry.location.lat).toString();
        addressArray["longitude"] = (response.results[0].geometry.location.lng).toString();

        latDb = (response.results[0].geometry.location.lat).toString();
        lngDb = (response.results[0].geometry.location.lng).toString();

        var transferData = {
            "id": addressArray["id"],
            "street": addressArray["street"],
            "number": addressArray["number"],
            "addition": addressArray["addition"],
            "postcode": addressArray["postcode"],
            "city": addressArray["city"],
            "latitude": addressArray["latitude"],
            "longitude": addressArray["longitude"]
        };

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"user/address",
            "method": "PUT",
            "headers": {
                "hash": Base64.decode(Cookies.get('hash')),
                "content-type": "application/json",
            },
            cache: false,
            "processData": false,
            "data": JSON.stringify(transferData)
        }

        $.ajax(settings).always(function (response) {
            //console.log();
        });
    });
}

function updateAddress(values, latDb2) {
    var test = latDb2;

    var transferData = {
        "id": values["id"],
        "street": values["street"],
        "number": values["id"],
        "addition": values["addition"],
        "postcode": values["postcode"],
        "city": values["city"],
        "latitude": latDb,
        "longitude": lngDb
    };

    console.log(test);

    console.log(JSON.stringify(transferData));

    /*var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"user/address",
        "method": "PUT",
        "headers": {
            "content-type": "application/json",
            "hash": "bade6027da78136bdd57a3c574d7afb4af1395d9"
        },
        cache: false,
        "processData": false,
        "data": JSON.stringify(transferData)
    }

    $.ajax(settings).always(function (response) {
        //console.log(response);
    });*/
}

function updateRestoInfo(info, restoId) {
    var update = {
        "id": restoId,
        "name": info['name'],
        "kitchentypeId": info['kitchen'],
        "addressId": addressIdDb,
        "phone": info['phone'],
        "email": info['email'],
        "url": info['website'],
        "photo": "url to photo",
        "dominatingColor": "#5584",
        "comment": info['comment']
    };

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant",
        "method": "PUT",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "Access-Control-Allow-Origin":  '*',
            "content-type": "application/json",
            "Pragma": "no-cache",
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        cache: false,
        "processData": false,
        "data": JSON.stringify(update)
    }

    $.ajax(settings).always(function (response) {
        //console.log(response);
    });

    // getting all the current specialties
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/speciality/"+restoId,
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

        // delete all existing specialties (preventing duplicate entries)
        $.each(response, function(index,item) {
            deleteSpecialty(restoId, item.id);
        });
    });

    setTimeout(function() {
        // adding the new specialty
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL+"restaurant/speciality/"+restoId+"/"+info['specialty'],
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
            "processData": false
        }

        $.ajax(settings).always(function (response) {
            console.log('added '+info['specialty']);
        });
    }, 400);


}

function getAndSetPayments() {
    // getting all the payment methods
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"manage/paymentmethod/all/",
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

        $('#paymentsForm').empty();

        $.each(response, function(index,item) {
            $('#paymentsForm').append('<div class="checkbox"><label><input type="checkbox" value="'+response[index].id+'" name="payment'+response[index].id+'">'+response[index].name+'</label></div>');
        });
    });

    // setting the payment methods for the restaurant
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/paymentmethod/"+resto_id,
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
        //console.log(response);

        $.each(response, function(index,item) {
            $('[name="payment'+response[index].id+'"]').attr("checked", true);
        });
    });
}

function updatePayments() {
    $.each($('#paymentsForm input'), function( key, value) {
        if($(this).prop('checked')) {
            addPaymentMethod($(this).attr('name').substr(7, $(this).attr('name').length));
        } else {
            deletePaymentMethod($(this).attr('name').substr(7, $(this).attr('name').length));
        }
    });

    setTimeout(function(){ getInitialRestoInfo(resto_id); }, 500);

    $('#editPaymentsModal').modal('hide');
    $('body').css('opacity', 1);
    $('#paymentsFormSubmit').removeClass('disabled');
    $('#paymentsFormSubmit').prop('disabled', false);
}

function addPaymentMethod(pm) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/paymentmethod/"+resto_id+'/'+pm,
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
        "processData": false
    }

    $.ajax(settings).always(function (response) {
        //console.log('added '+pm);
    });
}

function deletePaymentMethod(pm) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/paymentmethod/delete/"+resto_id+'/'+pm,
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

    // creating new product
    $.ajax(settings).always(function (response) {
        //response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
    });
}

function getOpeningHours() {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"dashboard/profile/"+resto_id,
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

    // creating new product
    $.ajax(settings).always(function (response) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));

        console.log(response.openingHours);

        $.each(response.openingHours, function(index,item) {
            var fromShow = item.fromTime.substr(0,5);
            var toShow = item.toTime.substr(0,5);

            console.log(parseInt(item.dayOfWeek)+1);

            if(item.open === '1') {
                $('#hours'+weekDayNames[parseInt(item.dayOfWeek)+1]).val(fromShow+'-'+toShow);
            }

            $('#hours'+weekDayNames[item.dayOfWeek+1]).attr('data-id', item.id);
        });
    });
}

function addOpeningHours(weekDay, from, to, checkOpen) {
    var hour = {
        "restaurantId": resto_id,
        "dayOfWeek": weekDay,
        "fromTime": from,
        "toTime": to,
        "open": checkOpen
    };

    //console.log(hour);
    //console.log(JSON.stringify(hour));

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
        cache: false,
        "processData": false,
        "data": JSON.stringify(hour)
    }

    $.ajax(settings).always(function (response) {
        console.log('add ok');
    });
}

function updateOpeningHours(recordId, weekDay, from, to, checkOpen) {
    var hour = {
        "id": recordId,
        "restaurantId": resto_id,
        "dayOfWeek": weekDay,
        "fromTime": from,
        "toTime": to,
        "open": checkOpen
    };

    console.log(JSON.stringify(hour));

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"restaurant/openinghour",
        "method": "PUT",
        "headers": {
            "hash": Base64.decode(Cookies.get('hash')),
            "Access-Control-Allow-Origin":  '*',
            "content-type": "application/json",
            "Pragma": "no-cache",
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        cache: false,
        "processData": false,
        "data": JSON.stringify(hour)
    }

    $.ajax(settings).always(function (response) { });
}

function logoUpload() {
    // handle file upload for logo
    'use strict';

    var url = API_URL+'photo/restaurant/logo/'+resto_id;

    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        beforeSend: function ( xhr ) {
            setHeader(xhr);
        },
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                console.log(file.name);
                //$('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);

            if(progress == 100) {
                $('#editCoverModal').modal('hide');
                setTimeout(function() {
                    getInitialRestoInfo(resto_id);
                }, 500);
            }
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function restoPhotosUpload() {
    // handle file upload for resto photos
    'use strict';

    var url = API_URL+'photo/restaurant/'+resto_id;

    $('#restoFileupload').fileupload({
        url: url,
        dataType: 'json',
        beforeSend: function ( xhr ) {
            setHeader(xhr);
        },
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            /*$('#progress .progress-bar').css(
             'width',
             progress + '%'
             );*/

            if(progress == 100) {
                $('#editRestoPhotosModal').modal('hide');
                setTimeout(function() {
                    getInitialRestoInfo(resto_id);
                }, 500);
            }
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function modalLoaded(modalName, loaderName) {
    $('#'+modalName+' .modal-header').removeClass('hidden');
    $('#'+modalName+' .modal-body').removeClass('hidden');
    $('#'+modalName+' .modal-footer').removeClass('hidden');
    $('#'+loaderName).addClass('hidden');
}

function modalLoading(modalName, loaderName) {
    $('#'+loaderName).removeClass('hidden');
    $('#'+modalName+' .modal-header').addClass('hidden');
    $('#'+modalName+' .modal-body').addClass('hidden');
    $('#'+modalName+' .modal-footer').addClass('hidden');
}