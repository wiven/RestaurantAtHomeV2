<?php
/**
 * Restaurant At Home
 *
 * Contact page
 *
 * @package	RestoAtHome
 * @author	A collaboration of: WiVen Web Solutions - IneTh - Shout!
 * @copyright	Copyright (c) 2014 - 2015
 * @copyright
 * @license	*
 * @link	http://restaurantathome.be
 * @since	Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<h2 class="page-header">Contacteer ons</h2>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
			<p>
				Heb je een vraag voor ons? Heb je enkele tips om RestaurantAtHome nog beter te maken ? Aarzel dan niet ons te contacteren! We reageren zo snel mogelijk op je vraag.

			</p>
		</div>

		<div class="col-lg-8">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-2 control-label" style="text-align: left;">Ik</label>
					<div class="col-sm-10">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default">
								<input type="radio" name="gender" value="male" /> ben een consument
							</label>
							<label class="btn btn-default">
								<input type="radio" name="gender" value="female" /> heb een restaurant
							</label>
							<label class="btn btn-default">
								<input type="radio" name="gender" value="other" /> ben van de pers
							</label>
							<label class="btn btn-default">
								<input type="radio" name="gender" value="other" /> heb een marketingvoorstel
							</label>
						</div>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Naam</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Naam">
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">E-mail</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="E-mailadres">
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Bericht</label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="5"></textarea>
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<p class="help-block"><span style="color: #a94442; font-weight: bold;">&ast;</span> Verplicht in te vullen</p>
						<button type="submit" class="btn btn-primary">Verstuur</button>
						<button type="cancel" class="btn btn-default">Annuleren</button>
					</div>
				</div>
			</form>
		</div>

		<div class="col-lg-4">
			<ul id="contact_methods">
				<li>
					<a href="mailto:info@restaurantathome.be">
						<img src="https://cdn1.iconfinder.com/data/icons/lumin-social-media-icons/512/Email-48.png" />info@restaurantathome.be
					</a>
				</li>
				<li>
					<a href="https://www.facebook.com/restaurantathome.be" target="_blank">
						<img src="https://cdn1.iconfinder.com/data/icons/lumin-social-media-icons/512/Facebook-48.png" />RestaurantAtHome.be
					</a>
				</li>
				<li>
					<a href="https://twitter.com/restoathome" target="_blank">
						<img src="https://cdn1.iconfinder.com/data/icons/lumin-social-media-icons/512/Twitter-48.png" />@RestoAtHome
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<style type="text/css">
	#contact_methods li {
		list-style-type: none;
	}

	#contact_methods li a {
		display: block;
	}

	#contact_methods li  img {
		margin: 2px 2px 2px 0;
	}
</style>


<?php //EOF  -'It all ends here'-   ?>
