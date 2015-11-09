const API_URL = 'http://syst.restaurantathome.be/api/';


$(document).ready(function () {


    $('.homepageback').backstretch([
        'public/img/homepage/homepage-1.jpg', 'public/img/homepage/homepage-2.jpg', 'public/img/homepage/homepage-3.jpg', 'public/img/homepage/homepage-4.jpg', 'public/img/homepage/homepage-5.jpg', 'public/img/homepage/homepage-6.jpg', 'public/img/homepage/homepage-7.jpg', 'public/img/homepage/homepage-8.jpg'
    ], {
        duration: 5000,
        fade: 750
    });

    getRandomRestaurant();

    $('#main_search_button').click(function (e) {
        e.preventDefault();

        var city = $('#where').val();
        var what = $('#what').val();

        console.log(Base64.encode('./search?where=' + city + '&what=' + what));
        window.location.href = './search?where=' + city + '&what=' + what;
    });

    $('#searchform').submit(function (e) {
        e.preventDefault();
        $('#main_search_button').trigger('click');
    });

});

function getRandomRestaurant() {

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL+"home",
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

    $.ajax(settings).always(function (response, textStatus, errorThrown) {
        response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));

        $.each(response.spotlight, function (index, item) {
            try {
                var restoThumb = item.logoPhoto.url;
            } catch (err) {
                var restoThumb = 'http://syst.restaurantathome.be/public/img/restaurant-voorbeeld.jpg';
            }

            $("#restoInDeKijker").append('<a href="/restaurantdetail?id='+Base64.encode(item.id)+'" class="top_resto">'+'<div class="col-xs-6 col-md-3">'+'<figure class="thumbnail">'+'<img class="img-responsive" src="'+restoThumb+'">'+'<figcaption class="caption">'+'<h3 id="thumbnail-label">'+item.name+'</h3>'+'</figcaption>'+'</figure>'+'</div>'+'</a>');
            return index < 4;
        });

    });

}

/* $("#addressTop").select2({
 placeholder: 'Gemeente of postcode'
 }); */

// getAllCities();

// getAllKichtenTypes();

/* function getAllCities() {

 var settings = {
 "async": true,
 "crossDomain": true,
 "url": API_URL+"cities/all/",
 "method": "GET",
 "headers": {
 "content-type": "application/json",
 "Pragma": "no-cache" ,
 "Cache-Control": "no-cache",
 "Expires": 0
 },
 "cache": false,
 "processData": false
 };

 $.ajax(settings).always(function (response) {
 response = JSON.parse(response.substr(1, response.length - 2));

 $.each(response, function(index,item) {
 $("#addressTop").append('<option value="'+item.id+'">'+item.code+' - '+item.name+'</option>');
 });

 });

 $('#addressTop').on("select2:select", function (e) { log("select2:select", e); });

 } */

/* function log (name, evt) {
 if (!evt) {
 var args = "{}";
 } else {
 var args = JSON.stringify(evt.params, function (key, value) {
 if (value && value.nodeName) return "[DOM node]";
 if (value instanceof $.Event) return "[$.Event]";
 return value;
 });
 }
 var $e = $("<li>" + name + " -> " + args + "</li>");
 console.log($e);
 $e.animate({ opacity: 1 }, 10000, 'linear', function () {
 $e.animate({ opacity: 0 }, 2000, 'linear', function () {
 $e.remove();
 });
 });
 } */

/* function getAllKichtenTypes() {

 var settings = {
 "async": true,
 "crossDomain": true,
 "url": API_URL+"/manage/kitchentype/all/",
 "method": "GET",
 "headers": {
 "content-type": "application/json",
 "Pragma": "no-cache" ,
 "Cache-Control": "no-cache",
 "Expires": 0
 },
 "cache": false,
 "processData": false
 };

 $.ajax(settings).always(function (response) {
 response = JSON.parse(response.substr(1, response.length - 2));

 $.each(response, function(index,item) {
 $("#keukenType").append('<option value="'+item.code+'">'+item.name+'</option>');
 });
 });

 $("#keukenType").select2({
 placeholder: 'Belgisch, Frans, ...'
 });

 } */

/*var substringMatcher = function(strs) {
 return function findMatches(q, cb) {
 var matches, substringRegex;

 // an array that will be populated with substring matches
 matches = [];

 // regex used to determine if a string contains the substring `q`
 substrRegex = new RegExp(q, 'i');

 // iterate through the pool of strings and for any string that
 // contains the substring `q`, add it to the `matches` array
 $.each(strs, function(i, str) {
 if (substrRegex.test(str)) {
 matches.push(str);
 }
 });

 cb(matches);
 };
 };

 var cities = ['9000 - Gent', '3500 - Hasselt', '8790 - Waregem', '8500 - Kortrijk'
 ];

 $('#whereToEat .typeahead').typeahead({
 hint: true,
 highlight: true,
 minLength: 1
 },
 {
 name: 'cities',
 source: substringMatcher(cities)
 });*/
