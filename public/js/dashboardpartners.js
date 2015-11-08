$(document).ready(function () {
    $.ajax({
        method: "GET",
        url: API_URL + 'dashboard/partners/0/10000',
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).always(function (msg) {
        var partners = msg.partners;

        // checking partners
        if(partners.length !== 0) {
            $.each(partners, function(index, value) {
                if((partners[index].photo == 'null') || (partners[index].photo.length == 0)) {
                    $('#partners_div').append('<a href="'+partners[index].url+'" target="_blank" class="top_resto"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="../public/img/partner-thumb.jpg"><div class="caption"><h3 id="thumbnail-label">'+partners[index].name+'</h3></div></div></div></a>');
                } else {
                    $('#partners_div').append('<a href="'+partners[index].url+'" target="_blank" class="top_resto"><div class="col-sm-6 col-md-3 col-lg-3"><div class="thumbnail"><img src="'+partners[index].photo+'"><div class="caption"><h3 id="thumbnail-label">'+partners[index].name+'</h3></div></div></div></a>');
                }
            });

            $('#no_partners_msg').addClass('hidden');
            $('#partners_div').removeClass('hidden');
        } else {
            $('#no_partners_msg').removeClass('hidden');
            $('#partners_div').addClass('hidden');
        }

        $('#partners_div .thumbnail img').matchHeight();
    }).fail(function (jqXHR, textStatus) {
        console.log(jqXHR);
        alert("Request failed: " + textStatus);
    });
});

//const API_URL = 'http://localhost/RestaurantAtHomeAPI/';
const API_URL = 'http://syst.restaurantathome.be/api/';