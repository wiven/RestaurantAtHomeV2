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
								<input type="radio" name="optionsUserType" value="consumer" checked="checked" required="required"> Ik ben een consument
							</label>
							<label class="col-xs-6">
								<input type="radio" name="optionsUserType" value="resto" required="required"> Ik heb een restaurant
							</label>
						</div>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputName">Voornaam
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="inputNameStatus" id="inputNameStatus" aria-describedby="inputNameStatus" required="required" placeholder="Voornaam">
						<span id="inputNameStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSurname">Naam
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="inputSurnameStatus" id="inputSurnameStatus" aria-describedby="inputSurnameStatus" required="required" placeholder="Naam">

						<span id="inputSurnameStatus" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">E-mailadres
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="E-mailadres">
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Paswoord
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="password" placeholder="Paswoord" required class="form-control" />
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Herhaal paswoord
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="password" placeholder="Herhaal paswoord" required class="form-control" />
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<h3>Stap 2 van <span class="totalStepsCount"></span>: Adresinformatie</h3>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Straat
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Straat">
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Nummer
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Nummer">

						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Bus</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Bus">
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Plaats
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Plaats">

						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Postcode
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
					</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Postcode">
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<!-- RESTO REGISTRATION -->
				<div class="restoRegistration hidden">
					<h3>Stap 3 van <span class="totalStepsCount"></span>: Restaurantinformatie</h3>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Naam restaurant
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Naam restaurant">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Keukentype
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Keukentype">

							<span id="inputSuccess2Status" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Telefoon
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Telefoon">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">E-mail
						</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="E-mail">

							<span id="inputSuccess2Status" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Website
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Website">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Logo
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Logo">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Beschrijving
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Beschrijving">

							<span id="inputSuccess2Status" class="sr-only">(success)</span>
						</div>
					</div>

					<h3>Stap 4 van <span class="totalStepsCount"></span>: Openingsuren restaurant</h3>

					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Maandag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Maandag">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
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
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Dinsdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Dinsdag">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
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
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Woensdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Woensdag">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
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
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Donderdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Donderdag">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
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
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Vrijdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Vrijdag">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
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
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Zaterdag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Zaterdag">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
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
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Zondag
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Zondag">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
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
						<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2"># slots
							<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Aantal slots per half uur">
							<span id="inputSuccess2Status" class="sr-only">(success)</span>
						</div>
					</div>
				</div>

				<div class="form-group has-feedback">
					<div class="col-sm-10 col-sm-offset-2">
						<div class="radio">
							<label>
								<input type="checkbox" name="generalConditions" value="consumer"> Ik heb de <a href="/generalconditions" target="_blank">algemene gebruiksvoorwaarden</a> gelezen en aanvaard ze.
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
