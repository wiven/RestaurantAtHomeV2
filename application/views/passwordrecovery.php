<?php
/**
 * Restaurant At Home
 *
 * Register page
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
	<h2 class="page-header">U bent uw paswoord vergeten?</h2>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
			<p>
				Hebt u een vraag voor ons, of vindt u dat er nog iets ontbreekt om dit project nog beter te maken? Aarzel dan niet en contacteer ons!
				Bent u een bestellende klant, of restauranthouder met interesse in RestaurantAtHome maar toch nog niet volledig overtuigd?
				Laat het ons weten, en we reageren zo snel mogelijk op je vraag.
			</p>
		</div>

		<div class="col-lg-12">
			<form class="form-horizontal">
				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Ik ben</label>
					<div class="col-sm-10">
						<div class="radio">
							<label class="col-xs-6">
								<input type="radio" name="optionsUserType" value="consumer" required="required"> Ik ben een consument
							</label>
							<label class="col-xs-6">
								<input type="radio" name="optionsUserType" value="resto" required="required"> Ik heb een restaurant
							</label>
						</div>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Voornaam</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" red placeholder="Voornaam">
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Naam</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Naam">
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">E-mailadres</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="E-mailadres">
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Paswoord</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" />
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Herhaal paswoord</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" />
						<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
						<span id="inputSuccess2Status" class="sr-only">(success)</span>
					</div>
				</div>

				<div class="form-group has-feedback">
					<div class="col-sm-10 col-sm-offset-2">
						<div class="radio">
							<label style="padding-left: 0;">
								<input type="checkbox" name="optionsUserType" value="consumer"> Ik heb de <a href="#" data-toggle="modal" data-target="#generalConditionsModal" data-backdrop="static">algemene gebruiksvoorwaarden</a> gelezen en aanvaard ze.
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<p class="help-block"><span style="color: #a94442; font-weight: bold;">&ast;</span> Verplicht in te vullen</p>
						<button type="cancel" class="btn btn-default">Annuleren</button>
						<button type="submit" class="btn btn-primary">Maak gebruik van RestaurantAtHome</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="generalConditionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Algemene gebruiksvoorwaarden</h4>
			</div>
			<div class="modal-body text-justify">
				"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

				Sectie 1.10.32 van "de Finibus Bonorum et Malorum", geschreven door Cicero in 45 v.Chr.

				"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"

				1914 vertaling door H. Rackham

				"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"

				Sectie 1.10.33 van "de Finibus Bonorum et Malorum", geschreven door Cicero in 45 v.Chr.

				"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."

				1914 vertaling door H. Rackham

				"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."
			</div><!--
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>-->
		</div>
	</div>
</div>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			...
		</div>
	</div>
</div>


<?php //EOF  -'It all ends here'-   ?>
