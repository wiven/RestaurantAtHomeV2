const API_URL = 'http://syst.restaurantathome.be/api/';

$(document).ready(function () {
    $('#btn_less_filters').addClass('hidden');

    var QueryString = function () {
        // This function is anonymous, is executed immediately and
        // the return value is assigned to QueryString!
        var query_string = {};
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            // If first entry with this name
            if (typeof query_string[pair[0]] === "undefined") {
                query_string[pair[0]] = decodeURIComponent(pair[1]);
                // If second entry with this name
            } else if (typeof query_string[pair[0]] === "string") {
                var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
                query_string[pair[0]] = arr;
                // If third or later entry with this name
            } else {
                query_string[pair[0]].push(decodeURIComponent(pair[1]));
            }
        }
        return query_string;
    }();

    $.each(QueryString, function(index, item) {
        switch(index) {
            case 'where':
                //console.log('where');
                break;
            case 'what':
                //console.log('what');
                break;
            case 'ppp':
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 100,
                    step: 5,
                    values: [item.split('-')[0], item.split('-')[1]],
                    slide: function (event, ui) {
                        $("#min_price").text(ui.values[0]);
                        $("#max_price").text(ui.values[1]);
                    },
                    stop: function( event, ui ) {
                        addParameter('./search'+window.location.search, 'ppp', ui.values[0] + '-' + ui.values[1], false);
                        updateSearchResults();
                    }
                });
                break;
            case 'distance':
                $("#slider-range-distance").slider({
                    range: true,
                    min: 0,
                    max: 30,
                    step: 1,
                    values: [item.split('-')[0], item.split('-')[1]],
                    slide: function (event, ui) {
                        $("#min_distance").text(ui.values[0]);
                        $("#max_distance").text(ui.values[1]);
                    },
                    stop: function( event, ui ) {
                        addParameter('./search'+window.location.search, 'distance', ui.values[0] + '-' + ui.values[1], false);
                        updateSearchResults();
                    }
                });
                break;
            case 'open':

                break;
            default:
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 100,
                    step: 5,
                    values: [15, 50],
                    slide: function (event, ui) {
                        $("#min_price").text(ui.values[0]);
                        $("#max_price").text(ui.values[1]);
                    },
                    stop: function( event, ui ) {
                        addParameter('./search'+window.location.search, 'ppp', ui.values[0] + '-' + ui.values[1], false);
                        updateSearchResults();
                    }
                });

                $("#slider-range-distance").slider({
                    range: true,
                    min: 0,
                    max: 30,
                    step: 1,
                    values: [0, 15],
                    slide: function (event, ui) {
                        $("#min_distance").text(ui.values[0]);
                        $("#max_distance").text(ui.values[1]);
                    },
                    stop: function( event, ui ) {
                        addParameter('./search'+window.location.search, 'distance', ui.values[0] + '-' + ui.values[1], false);
                        updateSearchResults();
                    }
                });

                return;
        }
        //console.log(index+' '+item);
    });

    getRestaurant(QueryString, false);

    //console.log(QueryString);

    $('.filter_btns').on('click', function () {
        $('.more_filters_section').toggleClass('hidden');
        $('#btn_more_filters').toggleClass('hidden');
        $('#btn_less_filters').toggleClass('hidden');
    });

    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 100,
        step: 5,
        values: [15, 50],
        slide: function (event, ui) {
            $("#min_price").text(ui.values[0]);
            $("#max_price").text(ui.values[1]);
        },
        stop: function( event, ui ) {
            addParameter('./search'+window.location.search, 'ppp', ui.values[0] + '-' + ui.values[1], false);
            updateSearchResults();
        }
    });

    $("#slider-range-distance").slider({
        range: true,
        min: 0,
        max: 30,
        step: 1,
        values: [0, 15],
        slide: function (event, ui) {
            $("#min_distance").text(ui.values[0]);
            $("#max_distance").text(ui.values[1]);
        },
        stop: function( event, ui ) {
            addParameter('./search'+window.location.search, 'distance', ui.values[0] + '-' + ui.values[1], false);
            updateSearchResults();
        }
    });
});

function getRestaurant(resto, updateResults) {
    try { var what = (resto.what); } catch (err) { var what = 'null'; }
    try { var where = (resto.where); } catch (err) { var where = 'null'; }
    try { if(resto.ppp.length != 0) { var ppp = (resto.ppp);} else { var ppp = '15-50'; } } catch (err) { var ppp = '15-50'; }
    try { if(resto.distance.length != 0) { var distance = (resto.distance);} else { var distance = '0-15'; } } catch (err) { var distance = '0-15'; }
    try { if(resto.open.length != 0) { var open = (resto.open);} else { var open = 'false'; } } catch (err) { var open = 'false'; }
    try { if(resto.tags.length != 0) { var tagString = '&1020='+(resto.tags);} else { var tagString = ''; } } catch (err) { var tagString = ''; }

    /*console.log(what);
    console.log(where);*/

    // reset all the filter fields
    if(!updateResults) {
        $("#actionsUsed").empty();
        $("#tagsUsed").empty();
    }

    $("#all_results").empty();

    console.log(API_URL + 'search/0/20/900=2374&902='+distance+'&1002='+ppp+tagString+'&open='+open);

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL + 'search/0/20/900=2374&902='+distance+'&1002='+ppp+tagString+'&open='+open,
        //"url": API_URL + '/search/0/20/900='+where+'&1001='+what,
        "method": "GET",
        "headers": {
            "content-type": "application/json",
            "Pragma": "no-cache",
            "Cache-Control": "no-cache",
            "Expires": 0
        },
        "cache": false,
        "processData": false
    };

    /*$.ajax(settings).always(function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);


    });*/

    //console.log(API_URL + 'search/0/20/900=2374&902='+distance+'&1002='+ppp+tagString+'&open='+open);

    $.ajax(settings).always(function (response, textStatus, errorThrown) {
    //$.ajax(settings).always(function (response) {
        console.log('getRestaurant');
        response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));

        //console.log(response);

        // fill in all the promotions
        if(!updateResults) {
            $.each(response.promotionUse, function(index, item) {
                $("#actionsUsed").append(
                    '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">'+
                        '<div class="checkbox">'+
                            '<label>'+
                                '<input type="checkbox" name="actions" value="'+item.id+'">'+item.name+
                                ' <span class="badge">'+item.usage+'</span>'+
                            '</label>'+
                        '</div>'+
                    '</div>');
            });
        }

        // adding the actions to the URL
        $("input:checkbox[name=actions]").off().on('change', function(){
            var actionsSet = Array();
            $("input:checkbox[name=actions]:checked").each(function(){
                actionsSet.push($(this).val());
            });

            //console.log('actionsSet: '+actionsSet);
            if(actionsSet.length != 0) {
                addParameter('./search'+window.location.search, 'actions', actionsSet, false);
                updateSearchResults();
            } else {
                var url = window.location.search.slice(0, window.location.search.indexOf("actions=")-1);
                url += window.location.search.slice(window.location.search.indexOf("actions=")+9, window.location.search.length);
                window.history.pushState('page2', 'Title', url);
                updateSearchResults();
            }
        });

        // adding the open-tag to the UI
        if(!updateResults) {
            $("#tagsUsed").append(
                '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">'+
                    '<div class="checkbox">'+
                        '<label>'+
                            '<input type="checkbox" name="open"> Nu open '+
                            '<span class="badge" id="openCount"></span>'+
                        '</label>'+
                    '</div>'+
                '</div>');
        }

        // adding the open-tag to the URL
        $("input:checkbox[name=open]").off().on('change', function(){
            if($("input:checkbox[name=open]:checked").length != 0) {
                addParameter('./search'+window.location.search, 'open', 'true', false);
                updateSearchResults();
            } else {
                addParameter('./search'+window.location.search, 'open', 'false', false);
                updateSearchResults();
            }

            //console.log('tagsSet: '+tagsSet);
            /*if(tagsSet.length != 0) {
                addParameter('./search'+window.location.search, 'tags', tagsSet, false);
            } else {
                var url = window.location.search.slice(0, window.location.search.indexOf("tags=")-1);
                url += window.location.search.slice(window.location.search.indexOf("tags=")+5, window.location.search.length);
                window.history.pushState('page2', 'Title', url);
            }*/
        });

        // fill in all the tags
        if(!updateResults) {
            $.each(response.tagUse, function(index, item) {
                $("#tagsUsed").append(
                    '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">'+
                        '<div class="checkbox">'+
                            '<label>'+
                                '<input type="checkbox" name="tags" value="'+item.id+'">'+item.name+
                                ' <span class="badge">'+item.usage+'</span>'+
                            '</label>'+
                        '</div>'+
                    '</div>');
            });
        }

        // adding the tags to the URL
        $("input:checkbox[name=tags]").off().on('change', function(){
            var tagsSet = Array();
            $("input:checkbox[name=tags]:checked").each(function(){
                tagsSet.push($(this).val());
            });

            //console.log('tagsSet: '+tagsSet);
            if(tagsSet.length != 0) {
                addParameter('./search'+window.location.search, 'tags', tagsSet, false);
                updateSearchResults();
            } else {
                var url = window.location.search.slice(0, window.location.search.indexOf("tags=")-1);
                url += window.location.search.slice(window.location.search.indexOf("tags=")+5, window.location.search.length);
                window.history.pushState('page2', 'Title', url);
                updateSearchResults();
            }
        });

        if(response.totalResults == 1) {
            $('#totalResults').text(response.totalResults+' resultaat');
        } else {
            $('#totalResults').text(response.totalResults+' resultaten');
        }

        var locations = Array();
        var openCounter = 0;
        var soloRestoLat = '';
        var soloRestoLng = '';

        // fill in all the results
        $.each(response.results, function (index, item) {
            //console.log(item);

            if (item.addition.length != 0) {
                var restoAddress = item.street + ' ' + item.number + '/' + item.addition + ', ' + item.city;
            } else  {
                var restoAddress = item.street + ' ' + item.number + ', ' + item.city;
            }

            locations.push(['<span class="resto_pointer"><a href="/restaurantdetail?id='+Base64.encode(item.id)+'" class="resto_pointer_link">'+item.name+'</a></span>', item.latitude, item.longitude, index]);

            if(item.open) { var openString = '<span class="label label-success resto_current_state">Nu open</span>'; } else { var openString = '<span class="label label-danger resto_current_state">Nu gesloten</span>'; }
            if(item.hasPromotions) { var actionsString = '<span class="label label-info resto_labels">ACTIES</span>'; } else { var actionsString = ''; }
            if(item.specialities.length != 0) { var specialtyString = '<span class="label label-default resto_labels hidden-xs">'+item.specialities[0].name+'</span>'; } else { var specialtyString = ''; }

            $("#all_results").append(
                '<li class="list-group-item clearfix resto_result" data-opened="'+item.open+'">' +
                    '<a href="/restaurantdetail?id='+Base64.encode(item.id)+'" data-id="'+Base64.encode(item.id)+'">' +
                        '<div class="col-lg-9 col-md-9 col-sm-10 col-xs-8 clearfix">' +
                            '<h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">'+item.name+'</h3>' +
                            '<p class="resto_address">'+restoAddress+'</p>' +
                            '<p class="col-md-12 hidden-xs clearfix resto_subtext">'+item.comment+'</p>' +
                            openString +
                            specialtyString +
                            '<span class="label label-default resto_labels hidden-xs">'+item.kitchenType+'</span>' +
                            actionsString +
                        '</div>' +

                        '<div class="col-lg-3 col-md-3 col-sm-2 col-xs-4 pull-right">' +
                            '<img src="//s3-media1.fl.yelpassets.com/bphoto/4FAeNpaaC4Pu1XMaIAIsjA/90s.jpg" class="pull-right">' +
                        '</div>' +
                    '</a>' +
                '</li>');

            if(item.open) { openCounter++; }

            soloRestoLat = item.latitude;
            soloRestoLng = item.longitude;

            $('#openCount').html(openCounter);
        });

        var mapCenterLat = response.fromCity.latitude;
        var mapCenterLng = response.fromCity.longitude;

        console.log(response.totalResults);

        if(response.totalResults == 1) {
            var map = new google.maps.Map(document.getElementById('map_search_pane'), {
                zoom: 11,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true
            });
        } else if(response.totalResults == 0) {
            var map = new google.maps.Map(document.getElementById('map_search_pane'), {
                zoom: 11,
                center: new google.maps.LatLng(mapCenterLat, mapCenterLng),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true
            });
            $("#all_results").append(
                '<li class="list-group-item clearfix resto_result">' +
                '<div class="col-xs-12 clearfix">' +
                '<h3">Er werden helaas geen resultaten terug gevonden</h3>' +
                '</div>' +
                '</li>');
        } else {
            var map = new google.maps.Map(document.getElementById('map_search_pane'), {
                zoom: 11,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true
            });
        }



        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        var bounds = new google.maps.LatLngBounds();
        var image = '../../public/img/resto_marker.png';

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: image
            });

            if(response.totalResults != 0) { bounds.extend(marker.position); }

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);

                    //map.setCenter(marker.getPosition());
                    //$("a[data-id='Companies']")@@@@@@
                }
            })(marker, i));
        }

        if(response.totalResults != 0) { map.fitBounds(bounds); }

        var listener = google.maps.event.addListener(map, "idle", function () {
            map.setZoom(11);
            google.maps.event.removeListener(listener);
        });


        $('.btn_more_resto_info').on('click', function (e) {
            e.preventDefault();
            alert('ok');
        });

        $('.btnNoInvite').on('click', function (e) {
            e.preventDefault();
            $('.inviteRestoModal').modal('hide');
        });

        $('.resto_pointer').on('click', function () {
            var scroll_to = $('.resto_result:first-child').offset().top - 91;
            $('html,body').animate({
                    scrollTop: scroll_to
                },
                'slow');

            $('.resto_result:first-child').css('background-color', '#eee');
        });
    });
}

function addParameter(url, parameterName, parameterValue, atStart){
    replaceDuplicates = true;
    if(url.indexOf('#') > 0){
        var cl = url.indexOf('#');
        urlhash = url.substring(url.indexOf('#'),url.length);
    } else {
        urlhash = '';
        cl = url.length;
    }
    sourceUrl = url.substring(0,cl);

    var urlParts = sourceUrl.split("?");
    var newQueryString = "";

    if (urlParts.length > 1)
    {
        var parameters = urlParts[1].split("&");
        for (var i=0; (i < parameters.length); i++)
        {
            var parameterParts = parameters[i].split("=");
            if (!(replaceDuplicates && parameterParts[0] == parameterName))
            {
                if (newQueryString == "")
                    newQueryString = "?";
                else
                    newQueryString += "&";
                newQueryString += parameterParts[0] + "=" + (parameterParts[1]?parameterParts[1]:'');
            }
        }
    }
    if (newQueryString == "")
        newQueryString = "?";

    if(atStart){
        newQueryString = '?'+ parameterName + "=" + parameterValue + (newQueryString.length>1?'&'+newQueryString.substring(1):'');
    } else {
        if (newQueryString !== "" && newQueryString != '?')
            newQueryString += "&";
        newQueryString += parameterName + "=" + (parameterValue?parameterValue:'');
    }
    window.history.pushState('page2', 'Title', urlParts[0] + newQueryString + urlhash);
    return urlParts[0] + newQueryString + urlhash;
};

function updateSearchResults() {
    // read the URL
    var QueryString = function () {
        // This function is anonymous, is executed immediately and
        // the return value is assigned to QueryString!
        var query_string = {};
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            // If first entry with this name
            if (typeof query_string[pair[0]] === "undefined") {
                query_string[pair[0]] = decodeURIComponent(pair[1]);
                // If second entry with this name
            } else if (typeof query_string[pair[0]] === "string") {
                var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
                query_string[pair[0]] = arr;
                // If third or later entry with this name
            } else {
                query_string[pair[0]].push(decodeURIComponent(pair[1]));
            }
        }
        return query_string;
    }();

    getRestaurant(QueryString,  true);

    console.log(QueryString);

    // make an API-call
    // update the results
    //console.log('Results should be updated!');
};