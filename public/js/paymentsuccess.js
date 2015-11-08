const API_URL = 'http://syst.restaurantathome.be/api/';

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}


$(document).ready(function() {
    console.log( "ready!" );

    var month = [];
    month[0] = "januari";
    month[1] = "februari";
    month[2] = "maart";
    month[3] = "april";
    month[4] = "mei";
    month[5] = "juni";
    month[6] = "juli";
    month[7] = "augustus";
    month[8] = "september";
    month[9] = "oktober";
    month[10] = "november";
    month[11] = "december";

    if(Cookies.get('hash') == null)
        window.location = "../login?redirect_url="+window.location;

    var hash = Base64.decode(Cookies.get('hash'));

    var settings = {
        "async": true,
        "crossDomain": true,
        "url": API_URL + 'order/' +getUrlParameter("id"),
        "method": "GET",
        "headers": {
            "Access-Control-Allow-Origin":  '*',
            "content-type": "application/json",
            "Pragma": "no-cache",
            "Cache-Control": "no-cache",
            "Expires": 0,
            "hash": Base64.decode(Cookies.get('hash')) //"1f04ffd563aea220413dae5c41453c6cdaef167a"
        },
        "cache": false,
        "processData": false
    };

    console.log(settings);
    //.always(function (response, textStatus, errorThrown) {
    $.ajax(settings)
        .always(function (response, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
            console.log('getOrder Finished');

            try {
                response = JSON.parse(response.responseText.substr(1, response.responseText.length - 2));
                console.log(response);

                if (response.paymentStatus != 'Payed' && response.paymentmethodid == 1)
                {
                    $(".pending").removeClass("hidden");
                    $(".payed").addClass("hidden");
                }

                if(response.paymentmethodid == 2)
                {
                    if(response.paymentStatus == 'Pending' )
                    {
                        $(".payed").addClass("hidden");
                        $('#awaitingPayment').html("Wij wachten u betaling af ...");
                        $("#readyMessage").addClass("hidden");
                    }
                }

                var date = new Date(response.orderDateTime);
                var min = date.getMinutes();
                if(min == 0)
                    min = '00';
                $("#readyMessage").html('Uw bestelling zal klaar liggen op ' + date.getDate() + ' ' + month[date.getMonth()] + ' ' + date.getFullYear() + ' om ' + date.getHours() + 'u' +  min + '.');

                $.each(response.lines, function (index, item) {
                    $("#orderDetails").append(
                        '<li>' + item.quantity + 'x ' + item.name + '</li>'
                    );
                });
            } catch (e) {
                console.log("failed");
                console.log(e);
                //window.location = "../";
            }

        });
});