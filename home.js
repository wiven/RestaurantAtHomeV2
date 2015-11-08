$(document).ready(function () {

    const API_URL = 'http://syst.restaurantathome.be/api/';

    $('#main_search_button').on('click', function (e) {
        e.preventDefault();

        var where = $('#addressTop_chosen').val();
        var what = $('#itemTop').val();

        console.log('Zoeken naar ' + what + ' in ' + where);
        window.location.href = './search';
    });

    function autocompleteCity(val) {
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_URL + "cities/" + val,
            "method": "GET",
            "headers": {
                "content-type": "application/json"
            },
            "processData": false
        };

        // creating new product link

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
    }

//    $('#addressTop').chosen({
//        disable_search_threshold: 3,
//        no_results_text: 'Oeps, geen producten gevonden!',
//        placeholder_text_multiple: 'Zoek een gerelateerd product',
//        search_contains: true,
//        width: '100%',
//        max_selected_options: 3,
//        data_placeholder: 'LOCATIEEEE'
//    });
//
//    $('.chosen-search input').on('keyup', function () {
//        autocompleteCity($(this).val());
//    });
//
//    $('.chosen-search input').trigger("chosen:updated");

    $("#addressTop").select2({
        ajax: {
            url: API_URL + "cities/" + $(this).val(),
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, page) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data
                return {
                    results: data.items
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

});