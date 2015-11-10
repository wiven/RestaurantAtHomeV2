<?php /** * Restaurant At Home * * Register page * * @package RestoAtHome * @author A collaboration of: WiVen Web Solutions - IneTh - Shout! * @copyright Copyright (c) 2014 - 2015 * @copyright * @license * * @link http://restaurantathome.be * @since Version 1.0.0 */ defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>

<div class="container">
	<h2 class="page-header">Registreer je nu!</h2>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
			<p>
				Heb je een vraag voor ons? Heb je enkele tips om RestaurantAtHome nog beter te maken? Aarzel dan niet ons te contacteren! We reageren zo snel mogelijk op je vraag.
			</p>
		</div>

		<div class="col-lg-12">
			<form class="form-horizontal" id="registerForm">
				<h3>Stap 1 van <span class="totalStepsCount"></span>: Gebruikersinformatie</h3>

				<div class="form-group has-feedback">
					<div class="col-sm-10 col-sm-offset-2">
						<div class="radio">
							<label class="col-xs-6">
								<input type="radio" name="optionsUserType" value="Client" checked="checked" required="required"> Ik ben een consument
							</label>
							<label class="col-xs-6">
								<input type="radio" name="optionsUserType" value="Resto" required="required"> Ik heb een restaurant
							</label>
						</div>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputName">Voornaam
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="inputName" id="inputName" aria-describedby="inputNameStatus" required="required" placeholder="Voornaam">
						<span id="inputNameStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSurname">Naam
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="inputSurname" id="inputSurname" aria-describedby="inputSurnameStatus" required="required" placeholder="Naam">

						<span id="inputSurnameStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputEmail">E-mailadres
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="inputEmailStatus" required="required" placeholder="E-mailadres">
						<span id="inputEmailStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputPhone">Telefoonnummer
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputPhone" name="inputPhone" aria-describedby="inputPhoneStatus" required="required" placeholder="Telefoonnummer">
						<span id="inputPhoneStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputPassword1">Paswoord
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="password" placeholder="Paswoord" name="inputPassword1" id="inputPassword1" required="required" class="form-control" />
						<span id="inputPassword1Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputPassword2">Herhaal paswoord
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="password" placeholder="Herhaal paswoord" name="inputPassword2" id="inputPassword2" required="required" class="form-control" />
						<span id="inputPassword2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<h3>Stap 2 van <span class="totalStepsCount"></span>: Adresinformatie</h3>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputStreet">Straat
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputStreet" name="inputStreet" aria-describedby="inputStreetStatus" required="required" placeholder="Straat">
						<span id="inputStreetStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputNumber">Nummer
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputNumber" name="inputNumber" aria-describedby="inputNumberStatus" required="required" placeholder="Nummer">

						<span id="inputNumberStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputAddition">Bus</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputAddition" name="inputAddition" aria-describedby="inputAdditionStatus" placeholder="Bus">
						<span id="inputAdditionStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputPlace">Plaats
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputPlace" name="inputPlace" aria-describedby="inputPlaceStatus" required="required" placeholder="Plaats">

						<span id="inputPlaceStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputZip">Postcode
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputZip" name="inputZip" aria-describedby="inputZipStatus" required="required" placeholder="Postcode">
						<span id="inputZipStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<!-- RESTO REGISTRATION -->
				<div class="restoRegistration hidden">
					<h3>Stap 3 van <span class="totalStepsCount"></span>: Restaurantinformatie</h3>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputRestoName">Naam restaurant
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputRestoName" name="inputRestoName" aria-describedby="inputRestoNameStatus" required="required" placeholder="Naam restaurant">
							<span id="inputRestoNameStatus" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputRestoType">Keukentype
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-10">
							<select class="form-control" id="inputRestoType" name="inputRestoType" aria-describedby="inputRestoTypeStatus" required="required" placeholder="Keukentype">
								<option value="">Keukentype</option>
								<option value="1">Frans</option>
								<option value="2">Belgisch</option>
								<option value="3">Berlaars</option>
							</select>


							<span id="inputRestoTypeStatus" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputRestoPhone">Telefoon
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputRestoPhone" name="inputRestoPhone" aria-describedby="inputRestoPhoneStatus" placeholder="Telefoon">
							<span id="inputRestoPhoneStatus" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputRestoEmail">E-mail
						</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputRestoEmail" name="inputRestoEmail" aria-describedby="inputRestoEmailStatus" placeholder="E-mail">

							<span id="inputRestoEmailStatus" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputRestoWebsite">Website
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputRestoWebsite" name="inputRestoWebsite" aria-describedby="inputRestoWebsiteStatus" placeholder="Website">
							<span id="inputRestoWebsiteStatus" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputRestoLogo">Logo
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputRestoLogo" name="inputRestoLogo" aria-describedby="inputRestoLogoStatus" placeholder="Logo">
							<span id="inputRestoLogoStatus" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputRestoDescription">Beschrijving
						</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="inputRestoDescription" name="inputRestoDescription" aria-describedby="inputRestoDescriptionStatus" placeholder="Beschrijving"></textarea>

							<span id="inputRestoDescriptionStatus" class="sr-only">(success)</span>
						</div>
					</div>

					<h3>Stap 4 van <span class="totalStepsCount"></span>: Openingsuren restaurant</h3>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputOpeninghours1">Maandag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOpeninghours1" name="inputOpeninghours1" aria-describedby="inputOpeninghours1Status" required="required" placeholder="bv: 10:00-12:00,13:00-20:00">
							<span id="inputOpeninghours1Status" class="sr-only">(success)</span>
						</div>
						<div class="col-sm-2 text-right">
							<div class="checkbox">
								<label>
									<input name="closed" value="1" type="checkbox"> Gesloten
								</label>
							</div>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputOpeninghours2">Dinsdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOpeninghours2" name="inputOpeninghours2" aria-describedby="inputOpeninghours2Status" required="required" placeholder="bv: 10:00-12:00">
							<span id="inputOpeninghours2Status" class="sr-only">(success)</span>
						</div>
						<div class="col-sm-2 text-right">
							<div class="checkbox">
								<label>
									<input name="closed" value="2" type="checkbox"> Gesloten
								</label>
							</div>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputOpeninghours3">Woensdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOpeninghours3" name="inputOpeninghours3" aria-describedby="inputOpeninghours3Status" required="required" placeholder="bv: 10:00-12:00,13:00-20:00">
							<span id="inputOpeninghours3Status" class="sr-only">(success)</span>
						</div>
						<div class="col-sm-2 text-right">
							<div class="checkbox">
								<label>
									<input name="closed" value="3" type="checkbox"> Gesloten
								</label>
							</div>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputOpeninghours4">Donderdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOpeninghours4" name="inputOpeninghours4" aria-describedby="inputOpeninghours4Status" required="required" placeholder="bv: 10:00-12:00,13:00-20:00">
							<span id="inputOpeninghours4Status" class="sr-only">(success)</span>
						</div>
						<div class="col-sm-2 text-right">
							<div class="checkbox">
								<label>
									<input name="closed" value="4" type="checkbox"> Gesloten
								</label>
							</div>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputOpeninghours5">Vrijdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOpeninghours5" name="inputOpeninghours5" aria-describedby="inputOpeninghours5Status" required="required" placeholder="bv: 10:00-12:00,13:00-20:00">
							<span id="inputOpeninghours5Status" class="sr-only">(success)</span>
						</div>
						<div class="col-sm-2 text-right">
							<div class="checkbox">
								<label>
									<input name="closed" value="5" type="checkbox"> Gesloten
								</label>
							</div>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputOpeninghours6">Zaterdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOpeninghours6" name="inputOpeninghours6" aria-describedby="inputOpeninghours6Status" required="required" placeholder="bv: 10:00-12:00,13:00-20:00">
							<span id="inputOpeninghours6Status" class="sr-only">(success)</span>
						</div>
						<div class="col-sm-2 text-right">
							<div class="checkbox">
								<label>
									<input name="closed" value="6" type="checkbox"> Gesloten
								</label>
							</div>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputOpeninghours0">Zondag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputOpeninghours0" name="inputOpeninghours0" aria-describedby="inputOpeninghours0Status" required="required" placeholder="bv: 10:00-12:00,13:00-20:00">
							<span id="inputOpeninghours0Status" class="sr-only">(success)</span>
						</div>
						<div class="col-sm-2 text-right">
							<div class="checkbox">
								<label>
									<input name="closed" value="0" type="checkbox"> Gesloten
								</label>
							</div>
						</div>
					</div>

					<h3>Stap 5 van <span class="totalStepsCount"></span>: Creatie slotstructuur</h3>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSlotsTemplate"># slots
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSlotsTemplate" name="inputSlotsTemplate" aria-describedby="inputSlotsTemplateStatus" required="required" placeholder="Aantal slots per half uur">
							<span id="inputSlotsTemplateStatus" class="sr-only">(success)</span>
						</div>
					</div>
				</div>

				<div class="form-group has-feedback">
					<div class="col-sm-10 col-sm-offset-2">
						<div class="radio">
							<label>
								<input type="checkbox" name="generalConditions" required="required" id="generalConditions" value="conditions"> Ik heb de <a href="/generalconditions" target="_blank">algemene gebruiksvoorwaarden</a> gelezen en aanvaard ze.
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<p class="help-block"><span>&ast;</span> Verplicht in te vullen</p>
						<!--<button type="cancel" class="btn btn-default">Annuleren</button>-->
						<button type="submit" id="SubmitUserBtn" class="btn btn-primary">Gebruiker registreren</button>
						<!--						<button type="submit" class="btn btn-primary">Maak gebruik van RestaurantAtHome</button>-->
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php //EOF - 'It all ends here'- ?>
