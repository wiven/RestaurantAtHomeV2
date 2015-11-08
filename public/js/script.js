$(document).ready(function () {

	$('#back_to_results').on('click', function (e) {
		e.preventDefault();
		goBack();
	});

	/* $('input, textarea').placeholder();

	$(':password').pwstrength({
		ui: {
			showVerdictsInsideProgressBar: true
		}
	});

	$.cookieBar({
		fixed: true,
		acceptOnScroll: 200
	}); */

});

function goBack() {
	window.history.back();
}
