const API_URL = 'http://syst.restaurantathome.be/api/';

function getRestaurant(resto, updateResults) {
    $("#all_results").empty();

    //console.log(resto);

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL + 'restaurantdetail/' + parseInt(resto),
        "method": "GET",
        "headers": {
            "Access-Control-Allow-Origin": '*',
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
        console.log(response);

        // setting all the restaurant details
        if (response.restaurantDetails.addressInfo.addition.length != 0) {
            var addressNumber = response.restaurantDetails.addressInfo.number + '/' + response.restaurantDetails.addressInfo.addition;
        } else {
            var addressNumber = response.restaurantDetails.addressInfo.number;
        }
        var address = response.restaurantDetails.addressInfo.street + ' ' + addressNumber + ', ' + response.restaurantDetails.addressInfo.postcode + ' ' + response.restaurantDetails.addressInfo.city;

        $('.restoAddress').text(address);
        $('.restoPhone').text(response.restaurantDetails.restaurantInfo.phone);
        $('.restoEmail').text(response.restaurantDetails.restaurantInfo.email);
        $('.restoEmail').parent().attr('href', 'mailto:' + response.restaurantDetails.restaurantInfo.email);
        $('.restoWebsite').text(response.restaurantDetails.restaurantInfo.url);
        $('.restoWebsite').parent().attr('href', response.restaurantDetails.restaurantInfo.url);

        if (response.restaurantDetails.specialties.length != 0) {
            $('.restoSpecialty').text('Specialiteit: ' + response.restaurantDetails.specialties[0].name);
        } else {
            $('.restoSpecialty').addClass('hidden');
        }

        /*if(response.restaurantDetails.specialties.length != 0) {
         $('.restoKitchentype').text('Keuken: '+response.restaurantDetails.specialties[0].name);
         } else {
         $('.restoKitchentype').addClass('hidden');
         }*/

        $.each(response.restaurantDetails.socialMedia, function (index, item) {
            switch (item.socialmediatypeId) {
                case '1':
                    $('.restoFacebook').attr('href', item.url);
                    $('.restoFacebook').removeClass('hidden');
                    break;
                case '2':
                    $('.restoTwitter').attr('href', item.url);
                    $('.restoTwitter').removeClass('hidden');
                    break;
                case '3':
                    $('.restoInstagram').attr('href', item.url);
                    $('.restoInstagram').removeClass('hidden');
                    break;
                default:
                    return;
            }
        });

        var daysOfWeek = Array('Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za');

        $('.restoHours').empty();

        $.each(response.restaurantDetails.openingHours, function (index, item) {
            $('.restoHours').append(daysOfWeek[index] + ': ' + item.fromTime.substr(0, item.fromTime.length - 3) + ' - ' + item.toTime.substr(0, item.toTime.length - 3) + '<br />');
        });

        $('.restoHours').append('<br />');

        $.each(response.restaurantDetails.paymentMethods, function (index, item) {
            switch (item.id) {
                case '1':
                    $('.restoHours').append('<span class="fa fa-money fa-2x" title="Cash"></span>');
                    break;
                case '2':
                    $('.restoHours').append('<span class="fa fa-credit-card fa-2x" title="Bancontact/Mister Cash/Maestro"></span>');
                    break;
                case '3':
                    $('.restoHours').append('<span class="fa fa-cc-visa fa-2x" title="VISA/MasterCard"></span>');
                    break;
                case '4':
                    $('.restoHours').append('<span class="fa fa-bitcoin fa-2x" title="Bitcoin"></span>');
                    break;
                default:
                    return;
            }
        });

        try {
            var restoLogo = response.restaurantDetails.restaurantInfo.logoPhoto.thumbnailUrl;
        } catch (err) {
            var restoLogo = 'http://placehold.it/450x210';
        }

        $('.restoLogo').attr('src', restoLogo);

        // setting all the actions
        $('#actiesTab').empty();
        if (response.promotions.length != 0) {
            $.each(response.promotions, function (index, item) {
                $('#actiesTab').append(
                    '<article class="col-lg-6 col-md-12 menu-item clearfix">' +
                    '<div class="col-lg-3 col-sm-3 col-xs-12">' +
                    '<span class="fa fa-certificate fa-fw fa-5x" style="color: ' + getRandomColor() + ';"></span>' +
                        //'<img src="http://lorempixel.com/300/300/food" width="100%">'+
                    '</div>' +
                    '<div class="col-lg-5 col-sm-5 col-xs-12">' +
                    '<h3>' + item.name + '</h3>' +
                        //'<h5><span class="label label-warning">Specialiteit</span></h5>'+
                    '<p>' + item.description + '</p>' +
                    '</div>' +
                    '<div class="col-lg-4 col-sm-4 col-xs-12">' +
                    '<div class="input-group">' +
                    '<span class="input-group-btn">' +
                    '<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[pr-' + item.id + ']">' +
                    '<span class="glyphicon glyphicon-minus"></span>' +
                    '</button>' +
                    '</span>' +
                    '<input type="text" name="quant[pr-' + item.id + ']" class="form-control input-number text-center" value="1" min="1" max="10">' +
                    '<span class="input-group-btn">' +
                    '<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[pr-' + item.id + ']">' +
                    '<span class="glyphicon glyphicon-plus"></span>' +
                    '</button>' +
                    '</span>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 26px;">Toevoegen</a>' +
                        //'<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>'+
                    '</div>' +
                    '</div>' +
                    '</article>'
                );
            });
        } else {
            $('#actiesTab').append('<article class="col-xs-12 menu-item clearfix"><h4 class="text-center">Er zijn helaas geen acties van dit restaurant.</h4></article>');
        }

        // setting all the products
        var productTypesArray = Array('Voorgerechten', 'Hoofdgerechten', 'Desserts', 'Dranken', 'Extra\'s');
        var productTypesTabArray = Array('voorgerechtenTab', 'hoofdgerechtenTab', 'dessertsTab', 'drankenTab', 'extrasTab');
        $.each(response.productTypes, function (index, item) {
            switch (item.name) {
                case 'Voorgerecht':
                    $('#' + productTypesTabArray[0]).empty();
                    if (item.products.length != 0) {
                        $.each(item.products, function (index, item) {
                            try {
                                var prodPhoto = item.photo.thumbnailUrl;
                            } catch (err) {
                                var prodPhoto = 'http://placehold.it/300x300';
                            }
                            $('#' + productTypesTabArray[0]).append(
                                '<article class="col-lg-6 col-md-12 menu-item clearfix">' +
                                '<div class="col-lg-3 col-sm-3 col-xs-3">' +
                                '<img src="' + prodPhoto + '" width="100%">' +
                                '</div>' +
                                '<div class="col-lg-5 col-sm-5 col-xs-5">' +
                                '<h3>' + item.name + '</h3>' +
                                '<h5><span class="label label-warning hidden-sm">Specialiteit</span></h5>' +
                                '<p>item.description</p>' +
                                '</div>' +
                                '<div class="col-lg-4 col-sm-4 col-xs-4">' +
                                '<div class="input-group">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-minus"></span>' +
                                '</button>' +
                                '</span>' +
                                '<input type="text" name="quant[pr-' + item.id + ']" class="form-control input-number text-center" value="1" min="1" max="10">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-plus"></span>' +
                                '</button>' +
                                '</span>' +
                                '</div>' +
                                '<div class="form-group">' +
                                '<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 26px;">Toevoegen</a>' +
                                '<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>' +
                                '</div>' +
                                '</div>' +
                                '</article>');
                        });
                    } else {
                        $('#' + productTypesTabArray[0]).append('<article class="col-xs-12 menu-item clearfix"><h4 class="text-center">Er zijn helaas geen producten van dit type.</h4></article>');
                    }
                    break;
                case 'Hoofdgerecht':
                    $('#' + productTypesTabArray[1]).empty();
                    if (item.products.length != 0) {
                        $.each(item.products, function (index, item) {
                            try {
                                var prodPhoto = item.photo.thumbnailUrl;
                            } catch (err) {
                                var prodPhoto = 'http://placehold.it/300x300';
                            }
                            $('#' + productTypesTabArray[1]).append(
                                '<article class="col-lg-6 col-md-12 menu-item clearfix">' +
                                '<div class="col-lg-3 col-sm-3 col-xs-3">' +
                                '<img src="' + prodPhoto + '" width="100%">' +
                                '</div>' +
                                '<div class="col-lg-5 col-sm-5 col-xs-5">' +
                                '<h3>' + item.name + '</h3>' +
                                '<h5><span class="label label-warning hidden-sm">Specialiteit</span></h5>' +
                                '<p>' + item.description + '</p>' +
                                '</div>' +
                                '<div class="col-lg-4 col-sm-4 col-xs-4">' +
                                '<div class="input-group">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-minus"></span>' +
                                '</button>' +
                                '</span>' +
                                '<input type="text" name="quant[pr-' + item.id + ']" class="form-control input-number text-center" value="1" min="1" max="10">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-plus"></span>' +
                                '</button>' +
                                '</span>' +
                                '</div>' +
                                '<div class="form-group">' +
                                '<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 26px;">Toevoegen</a>' +
                                '<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>' +
                                '</div>' +
                                '</div>' +
                                '</article>');
                        });
                    } else {
                        $('#' + productTypesTabArray[1]).append('<article class="col-xs-12 menu-item clearfix"><h4 class="text-center">Er zijn helaas geen producten van dit type.</h4></article>');
                    }
                    break;
                case 'Dessert':
                    $('#' + productTypesTabArray[2]).empty();
                    if (item.products.length != 0) {
                        $.each(item.products, function (index, item) {
                            try {
                                var prodPhoto = item.photo.thumbnailUrl;
                            } catch (err) {
                                var prodPhoto = 'http://placehold.it/300x300';
                            }
                            $('#' + productTypesTabArray[2]).append(
                                '<article class="col-lg-6 col-md-12 menu-item clearfix">' +
                                '<div class="col-lg-3 col-sm-3 col-xs-3">' +
                                '<img src="' + prodPhoto + '" width="100%">' +
                                '</div>' +
                                '<div class="col-lg-5 col-sm-5 col-xs-5">' +
                                '<h3>' + item.name + '</h3>' +
                                '<h5><span class="label label-warning hidden-sm">Specialiteit</span></h5>' +
                                '<p>item.description</p>' +
                                '</div>' +
                                '<div class="col-lg-4 col-sm-4 col-xs-4">' +
                                '<div class="input-group">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-minus"></span>' +
                                '</button>' +
                                '</span>' +
                                '<input type="text" name="quant[pr-' + item.id + ']" class="form-control input-number text-center" value="1" min="1" max="10">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-plus"></span>' +
                                '</button>' +
                                '</span>' +
                                '</div>' +
                                '<div class="form-group">' +
                                '<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 26px;">Toevoegen</a>' +
                                '<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>' +
                                '</div>' +
                                '</div>' +
                                '</article>');
                        });
                    } else {
                        $('#' + productTypesTabArray[2]).append('<article class="col-xs-12 menu-item clearfix"><h4 class="text-center">Er zijn helaas geen producten van dit type.</h4></article>');
                    }
                    break;
                case 'Dranken':
                    $('#' + productTypesTabArray[3]).empty();
                    if (item.products.length != 0) {
                        $.each(item.products, function (index, item) {
                            try {
                                var prodPhoto = item.photo.thumbnailUrl;
                            } catch (err) {
                                var prodPhoto = 'http://placehold.it/300x300';
                            }
                            $('#' + productTypesTabArray[3]).append(
                                '<article class="col-lg-6 col-md-12 menu-item clearfix">' +
                                '<div class="col-lg-3 col-sm-3 col-xs-3">' +
                                '<img src="' + prodPhoto + '" width="100%">' +
                                '</div>' +
                                '<div class="col-lg-5 col-sm-5 col-xs-5">' +
                                '<h3>' + item.name + '</h3>' +
                                '<h5><span class="label label-warning hidden-sm">Specialiteit</span></h5>' +
                                '<p>item.description</p>' +
                                '</div>' +
                                '<div class="col-lg-4 col-sm-4 col-xs-4">' +
                                '<div class="input-group">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-minus"></span>' +
                                '</button>' +
                                '</span>' +
                                '<input type="text" name="quant[pr-' + item.id + ']" class="form-control input-number text-center" value="1" min="1" max="10">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-plus"></span>' +
                                '</button>' +
                                '</span>' +
                                '</div>' +
                                '<div class="form-group">' +
                                '<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 26px;">Toevoegen</a>' +
                                '<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>' +
                                '</div>' +
                                '</div>' +
                                '</article>');
                        });
                    } else {
                        $('#' + productTypesTabArray[3]).append('<article class="col-xs-12 menu-item clearfix"><h4 class="text-center">Er zijn helaas geen producten van dit type.</h4></article>');
                    }
                    break;
                case 'Extra':
                    $('#' + productTypesTabArray[4]).empty();
                    if (item.products.length != 0) {
                        $.each(item.products, function (index, item) {
                            try {
                                var prodPhoto = item.photo.thumbnailUrl;
                            } catch (err) {
                                var prodPhoto = 'http://placehold.it/300x300';
                            }
                            $('#' + productTypesTabArray[4]).append(
                                '<article class="col-lg-6 col-md-12 menu-item clearfix">' +
                                '<div class="col-lg-3 col-sm-3 col-xs-3">' +
                                '<img src="' + prodPhoto + '" width="100%">' +
                                '</div>' +
                                '<div class="col-lg-5 col-sm-5 col-xs-5">' +
                                '<h3>' + item.name + '</h3>' +
                                '<h5><span class="label label-warning hidden-sm">Specialiteit</span></h5>' +
                                '<p>item.description</p>' +
                                '</div>' +
                                '<div class="col-lg-4 col-sm-4 col-xs-4">' +
                                '<div class="input-group">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-minus"></span>' +
                                '</button>' +
                                '</span>' +
                                '<input type="text" name="quant[pr-' + item.id + ']" class="form-control input-number text-center" value="1" min="1" max="10">' +
                                '<span class="input-group-btn">' +
                                '<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[pr-' + item.id + ']">' +
                                '<span class="glyphicon glyphicon-plus"></span>' +
                                '</button>' +
                                '</span>' +
                                '</div>' +
                                '<div class="form-group">' +
                                '<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 26px;">Toevoegen</a>' +
                                '<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>' +
                                '</div>' +
                                '</div>' +
                                '</article>');
                        });
                    } else {
                        $('#' + productTypesTabArray[4]).append('<article class="col-xs-12 menu-item clearfix"><h4 class="text-center">Er zijn helaas geen producten van dit type.</h4></article>');
                    }
                    break;
                default:
                    return;
            }
        });

    });
}

$(document).ready(function () {
    var QueryString = function () {
        // This function is anonymous, is executed immediately and
        // the return value is assigned to QueryString!
        var query_string = {};
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            // If first entry with this name
            if (typeof query_string[pair[0]] === "undefined") {
                query_string[pair[0]] = decodeURIComponent(pair[1]);
                // If second entry with this name
            } else if (typeof query_string[pair[0]] === "string") {
                var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
                query_string[pair[0]] = arr;
                // If third or later entry with this name
            } else {
                query_string[pair[0]].push(decodeURIComponent(pair[1]));
            }
        }
        return query_string;
    }();

    var restoId = Base64.decode(QueryString.id);

    getRestaurant(restoId, false);

    //getRestaurantdetailInfo();

    $('.btn_more_resto_info').on('click', function (e) {
        e.preventDefault();
        $('.hidden_info_mobile').slideToggle();
        $(".btn_more_resto_info").toggle();
    });

    $('#product_type_chooser a').on('click', function () {
        $('#product_type_chooser a').removeClass('active');
        $(this).addClass('active');
    });

    $('.add_product_btn').on('click', function (e) {
        e.preventDefault();

        var badge_parent = $(this).parent();
        var prod_id = $(this).attr('id').substring(8);
        var original_quant = parseInt($(badge_parent).children('.badge').text());
        var quant_to_add = parseInt($("#quant_" + prod_id).val());
        var new_quant = original_quant + quant_to_add;

        $(badge_parent).children('.badge').text(new_quant);
        $(badge_parent).children('.badge').show();
    });

    $('.delete_from_cart').on('click', function () {
        $(this).parent().parent().parent().remove();
    });

    $('#mapsModal').on('show.bs.modal', function () {
        $("#mapCanvas").html('<iframe src="//www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2520.716661239!2d3.2743649!3d50.8178881!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c33b23b2900d8d%3A0x75420920515aaeef!2sIJzerfrontlaan+13%2C+8500+Kortrijk!5e0!3m2!1snl!2sbe!4v1429536505436" width="100%" height="450" frameborder="0" style="border:0"></iframe>');
    });

});

function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
