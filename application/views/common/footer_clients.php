<?php /** * Restaurant At Home * * This file contains: * - The footer tags and main js * * @package RestoAtHome * @author A collaboration of: WiVen Web Solutions - IneTh - Shout! * @copyright Copyright (c) 2014 - 2015 * @copyright * @license * * @link http://restaurantathome.be * @since Version 1.0.0 */ defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>
</div>
<!-- close container fluid -->
</div>
<!-- end wrap -->
<!--
	<footer class="footer">
		<div class="container">
			<p class="text-muted">&COPY; Restaurant At Home</p>
		</div>
	</footer>-->

<div class="modal fade loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="border: 0; padding: 15px 15px 0 15px">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Login via</h4>
			</div>
			<div class="modal-body">
				<div class="social-buttons clearfix">
					<a href="#" class="btn btn-fb col-xs-5"><i class="fa fa-facebook"></i> Facebook</a>
					<a href="#" class="btn btn-tw col-xs-5 col-xs-offset-2"><i class="fa fa-twitter"></i> Twitter</a>
				</div>
				<span style="margin: 15px 0 15px;display: block;">OF</span>
				<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
					<div class="form-group">
						<label class="sr-only" for="exampleInputEmail2">E-mail</label>
						<input type="email" class="form-control" id="exampleInputEmail2" placeholder="E-mail" required>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputPassword2">Paswoord</label>
						<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Paswoord" required>
						<div class="help-block text-right"><a href="<?php echo base_url(); ?>user/passwordrecovery">Paswoord vergeten?</a>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Log in</button>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> Hou me ingelogd
						</label>
					</div>
				</form>

				<div class="bottom text-center">
					Nieuw hier? <a href="<?php echo base_url(); ?>register"><b>Registreer nu</b></a>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="border: 0; padding: 15px 15px 0 15px">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Login via</h4>
			</div>
			<div class="modal-body">
				<div class="social-buttons clearfix">
					<a href="#" class="btn btn-fb col-xs-5"><i class="fa fa-facebook"></i> Facebook</a>
					<a href="#" class="btn btn-tw col-xs-5 col-xs-offset-2"><i class="fa fa-twitter"></i> Twitter</a>
				</div>
				<span style="margin: 15px 0 15px;display: block;">OF</span>
				<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
					<div class="form-group">
						<label class="sr-only" for="exampleInputEmail2">E-mail</label>
						<input type="email" class="form-control" id="exampleInputEmail2" placeholder="E-mail" required>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputPassword2">Paswoord</label>
						<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Paswoord" required>
						<div class="help-block text-right"><a href="<?php echo base_url(); ?>user/passwordrecovery">Paswoord vergeten?</a>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Log in</button>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> Hou me ingelogd
						</label>
					</div>
				</form>

				<div class="bottom text-center">
					Nieuw hier? <a href="<?php echo base_url(); ?>register"><b>Registreer nu</b></a>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	#login-dp {
		min-width: 250px;
		padding: 14px 14px 0;
		overflow: hidden;
		background-color: rgba(255, 255, 255, .8);
	}

	#login-dp .help-block {
		font-size: 12px
	}

	#login-dp .bottom {
		background-color: rgba(255, 255, 255, .8);
		border-top: 1px solid #ddd;
		clear: both;
		padding: 14px;
	}

	#login-dp .social-buttons {
		margin: 12px 0
	}

	#login-dp .social-buttons a {
		width: 49%;
	}

	#login-dp .form-group {
		margin-bottom: 10px;
	}

	.btn-fb {
		color: #fff;
		background-color: #3b5998;
	}

	.btn-fb:hover {
		color: #fff;
		background-color: #496ebc
	}

	.btn-tw {
		color: #fff;
		background-color: #55acee;
	}

	.btn-tw:hover {
		color: #fff;
		background-color: #59b5fa;
	}

	@media(max-width:768px) {
		#login-dp {
			background-color: inherit;
			color: #fff;
		}
		#login-dp .bottom {
			background-color: inherit;
			border-top: 0 none;
		}
	}
</style>

<script src="<?php echo public_url(); ?>js/jquery-1.11.3.js"></script>
<script src="<?php echo public_url(); ?>js/bootstrap-3.3.2.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-backstretch-2.0.4.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-placeholder.js"></script>
<script src="<?php echo public_url(); ?>js/script.js"></script>

<!-- jQuery UI (necessary for some other plugins) -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Will be included in the controller as a parameter when needed on a page -->
<!--<script src="//maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
<script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>
<script src="<?php echo public_url(); ?>js/jquery.ui.touch-punch.js"></script>
<script src="<?php echo public_url(); ?>js/jquery.steps.min.js"></script>
<script src="<?php echo public_url(); ?>js/base64.js"></script>
<script src="<?php echo public_url(); ?>js/cookie.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-placeholder.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-password-check.js"></script>

<!--
	<script src="<?php echo public_url(); ?>js/instantclick.min.js" data-no-instant></script>
	<script data-no-instant>InstantClick.init('mousedown');</script>-->

<!--<script src="<?php echo public_url(); ?>js/script.js"></script>-->

<?php echo (isset($additional_scripts) ? $additional_scripts : '') ?>

<script type="text/javascript">
	var pos = '';
	var markersArray = [];
	var time_to_destination = '';
	var distance_to_destination = '';

	$(document).ready(function () {
		/*if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

				//console.log("'"+pos+"'");
				//console.log($('#finish_address').text());


				//calculateDistances(pos, $('#finish_address').text());

			}, function () {
				handleNoGeolocation(true);
			});
		} else {
			// Browser doesn't support Geolocation
			handleNoGeolocation(false);
		}*/


		$('#contact_type_btns a').on('click', function (e) {
			//e.preventDefault();

			$('#contact_type_btns a').removeClass('btn-success');
			$('#contact_type_btns a').addClass('btn-primary');

			$(this).removeClass('btn-primary');
			$(this).addClass('btn-success');
		});


		$('body').scrollspy({ target: '#map_search_pane' });
				var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
				var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
				var map_height = $("body").innerHeight()-$("header").height();
				$('#map_search_pane').height(h);

		$('#product_type_chooser > a h4').on('click', function () {
			$(this).addClass('active');
//			console.log('active');
		});

		/*
			$('#generalConditionsModal').on('hide.bs.modal', function (e) {
				console.log('hide');
			});

			$('#generalConditionsModal').modal({
			  backdrop: 'static'
			});*/


		$('.passwordrecovery').on('click', function (e) {
			e.preventDefault();

			$('#test').modal({
				backdrop: 'static'
			});
		});

		//$('body').css('padding-top', $('#topnav').outerHeight());

		/*
			if(!(document.URL).includes("contact")) {
				$('body').css('padding-top', '71px');
			}*/

		if ((document.URL).indexOf("search") != -1 && (document.URL).indexOf("restaurantdetail") == -1) {
			var margin_all_results = parseInt($('#filterrow').outerHeight()) + parseInt($('#filterrow').css('margin-bottom').substring(0, $('#filterrow').css('margin-bottom').length - 2));
		}

		/*$('#all_results').css('padding-top', margin_all_results);*/

		var rating_given = 0;

		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});

		/*$("#slider-range").slider({
			range: true,
			min: 5,
			max: 100,
			step: 5,
			values: [15, 50],
			slide: function (event, ui) {
				$("#min_price").text(ui.values[0]);
				$("#max_price").text(ui.values[1]);
			}
		});*/

		/*$("#slider-range-distance").slider({
			range: true,
			min: 1,
			max: 50,
			step: 1,
			values: [1, 10],
			slide: function (event, ui) {
				$("#min_distance").text(ui.values[0]);
				$("#max_distance").text(ui.values[1]);
			}
		});*/

		$('#min_price').text($("#slider-range").slider("values", 0));
		$('#max_price').text($("#slider-range").slider("values", 1));
		//$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

		$('#min_distance').text($("#slider-range-distance").slider("values", 0));
		$('#max_distance').text($("#slider-range-distance").slider("values", 1));

		$('.ui-widget-header').css('background', '#337ab7');
		$('.ui-corner-all').css('border-radius', '10px');
		$('#slider-range').css('margin-top', '10px');
		$('#slider-range').css('border-radius', '10px');
		$('#slider-range').css('height', '2px');

		$('#slider-range-distance').css('margin-top', '10px');
		$('#slider-range-distande').css('border-radius', '10px');
		$('#slider-range-distance').css('height', '2px');

		$('.ui-slider-range').css('margin-top', '-2px');
		$('.ui-slider-range').css('border', '2px solid #337ab7');
		$('.ui-slider-handle').css('border', '2px solid #337ab7');
		$('.ui-slider-handle').css('background', '#fff');
		$('.ui-slider-handle').css('margin-top', '-4px');

		//$('#myTab a:last').tab('show'); // Select last tab

		$('#show_only_opened_restos').on('click', function () {
			var isChecked = $("#show_only_opened_restos input:checkbox")[0];

			if ($(isChecked).attr('checked') == 'checked') {
				$(isChecked).attr('checked', false);
			} else {
				$(isChecked).attr('checked', 'checked');
			}
		});

		$('#show_only_connected_restos').on('click', function () {
			var isChecked = $("#show_only_connected_restos input:checkbox")[0];

			if ($(isChecked).attr('checked') == 'checked') {
				$(isChecked).attr('checked', false);
			} else {
				$(isChecked).attr('checked', 'checked');
			}
		});

		$('img.star_rating').mouseover(function () {
			if (rating_given == 0) {
				$(this).attr('src', '../public/img/star_full.png');
				$(this).prevAll().attr('src', '../public/img/star_full.png');
			}
		});

		$('img.star_rating').mouseout(function () {
			if (rating_given == 0) {
				$(this).attr('src', '../public/img/star_empty.png');
				$(this).prevAll().attr('src', '../public/img/star_empty.png');
			}
		});

		$('img.star_rating').on('click', function () {
			$(this).attr('src', '../public/img/star_full.png');
			$(this).prevAll().attr('src', '../public/img/star_full.png');
			rating_given = 1;
		});

		function isTouchDevice() {
			return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
		}

		if (isTouchDevice() === false) {
			$('[data-toggle="tooltip"]').tooltip();
		}

		$('.adlistitem').html('<img src="http://placehold.it/' + ($('.adlistitem').innerWidth() - 30) + 'x100" />');

		$('.inviteRestoBtn').on('click', function () {
			$(this).text('Restaurant uitgenodigd');
			$(this).addClass('disabled');

			/*
				var $btn = $(this).button('loading')
	// business logic...
	$btn.button('reset')
			});*/
		});

		$('.add_as_favorite').on('click', function () {
			$('#loginModal').modal('show');

			/*
				if($(this).css('opacity') == 1) {
					$(this).css('opacity', 0.3);
					$(this).attr('data-original-title', 'Toegevoegd aan favorieten');
				} else {
					$(this).css('opacity', 1.0);
					$(this).attr('data-original-title', 'Voeg toe aan favorieten');
				}*/
		});

		//$('#myModal').modal('show');

		$('.login_link').on('click', function () {
			$('#loginModal').modal('show');
		});

		if (pos != '') {
			$('.resto_maps_viewer').attr('title', calculateDistanceAndTimeToResto("Lokerenbaan 100, 9240 Zele"));
		} else {
			$('.resto_maps_viewer').attr('title', 'Bekijk het restaurant op de kaart');
		}

		$('.resto_maps_viewer').on('click', function () {
			var resto = $(this).attr("data-restaurant");
			var adres = $(this).context.innerText;
			var adres = $(this).context.textContent;

			if (pos != '') {
				calculateDistances(pos, adres);
				setTimeout(function () {
					$('#resto_name_map').text(resto + ' (' + distance_to_destination + ' - ' + time_to_destination + ' rijden)');
					$('.resto_maps_viewer').attr('title', distance_to_destination + ' - ' + time_to_destination + ' rijden');
					$('.resto_maps_viewer').attr('data-original-title', distance_to_destination + ' - ' + time_to_destination + ' rijden');
				}, 2000);

			} else {
				$('#resto_name_map').text(resto);
			}

			//console.log(pos);
			//console.log(adres);


			//$('#resto_name_map').text(resto);

			if ((document.URL).indexOf("restaurantdetail") == -1) {
				$("#map_resto_overview").html('<iframe src="https://maps.google.com/maps?q=' + encodeURIComponent(adres) + '&amp;output=embed" height="230" width="100%" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" kwframeid="1"></iframe>');
			}


			$('#myModal').modal('show');
		});

		$('#sortbar a').on('click', function () {
			$('#resultrow').css('opacity', 0.3);

			$('#loadingModal').modal({
				keyboard: false,
				backdrop: 'static'
			});

			setTimeout(function () {
				//$('#loginModal').modal('hide');
				$('#resultrow').css('opacity', 1);
				$('#loadingModal').modal('hide');
				//$('#resultrow').html('<img src="../public/img/loader.gif" />');
			}, 2000);
		});
	});

	function calculateDistanceAndTimeToResto(address_resto) {
		calculateDistances(pos, address_resto);

		return distance_to_destination + ', ' + time_to_destination + ' rijden)';
	}

	/*function handleNoGeolocation(errorFlag) {
		if (errorFlag) {
			var content = 'Error: The Geolocation service failed.';
		} else {
			var content = 'Error: Your browser doesn\'t support geolocation.';
		}

//		alert(content);

		var options = {
			map: map,
			position: new google.maps.LatLng(60, 105),
			content: content
		};

		var infowindow = new google.maps.InfoWindow(options);
		map.setCenter(options.position);
	}*/

	function calculateDistances(start, finish) {
		var service = new google.maps.DistanceMatrixService();
		service.getDistanceMatrix({
			origins: [start],
			//origins: [origin1],
			destinations: [finish],
			//destinations: [destinationA],
			travelMode: google.maps.TravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			avoidHighways: false,
			avoidTolls: false
		}, callback);
	}

	function callback(response, status) {
		if (status != google.maps.DistanceMatrixStatus.OK) {
			alert('Error was: ' + status);
		} else {
			var origins = response.originAddresses;
			var destinations = response.destinationAddresses;
			//var outputDiv = document.getElementById('outputDiv');
			//outputDiv.innerHTML = '';
			deleteOverlays();

			for (var i = 0; i < origins.length; i++) {
				var results = response.rows[i].elements;
				//addMarker(origins[i], false);
				for (var j = 0; j < results.length; j++) {
					//outputDiv.innerHTML += origins[i] + ' to ' + destinations[j] + ': ' + results[j].distance.text + ' in ' + results[j].duration.text + '<br>';
					distance_to_destination = results[j].distance.text;
					time_to_destination = results[j].duration.text;
					//outputDiv.innerHTML += results[j].distance.text + ' in ' + results[j].duration.text + '<br>';
				}
			}
		}
	}

	function deleteOverlays() {
		for (var i = 0; i < markersArray.length; i++) {
			markersArray[i].setMap(null);
		}
		markersArray = [];
	}
</script>



</body>

</html>

<?php //EOF - 'It all ends here'- ?>
