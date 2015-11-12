$(document).ready(function () {

	$('#back_to_results').on('click', function (e) {
		e.preventDefault();
		goBack();
	});

	if(typeof(Cookies.get('hash')) != 'undefined') {
		$('.loginLink').html('Log uit <i class="fa fa-sign-out fa-fw"></i>');
		$('.loginLink').attr('href', '/logout');
	}

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
