<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">

	<button class="btn btn-default col-lg-2 col-md-2 col-sm-2 col-xs-12" onclick="window.history.back(-1);">
		<span class="fa fa-chevron-circle-left"></span> Terug</span>
	</button>

	<a href="/checkout" id="checkout_btn" class="btn btn-primary col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-right hidden">
		Afrekenen
	</a>

	<div class="form-group">
		<button id="basket_btn" class="btn btn-default col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-right hidden" data-toggle="modal" data-target="#basketModal" data-backdrop="static">
			<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> &euro; 164,89
			<span class="badge basket_count_badge">11</span>
		</button>
	</div>

</div>

<div class="container-fluid">
	<div class="row" id="content-container">
		<!-- TOP INFO BOX RESTAURANT -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<ul class="list-group clearfix">
				<li class="list-group-item clearfix" id="info_resto">
					<div class="hidden-lg hidden-md hidden-sm col-xs-12 text-center">
						<img id="logo_resto" class="restoLogo" src="http://placehold.it/450x210">
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center" id="important_info_resto">
						<a href="https://www.google.com/maps?daddr=51.0993192,3.8444533&saddr" title="Routebeschrijving" target="_blank"><img src="https://cdn3.iconfinder.com/data/icons/internet-and-web-4/78/internt_web_technology-08-16.png" /> <span class="restoAddress">IJzerfrontlaan 13, 8500 Kortrijk</span></a>
						<!--data-toggle="modal" data-target="#mapsModal" data-backdrop="static"-->
						<br /> <span class="restoPhone">+32 2 123 45 67</span>
						<br />
						<a href="mailto:info@restaurantathome.be"><span class="restoEmail">info@restaurantathome.be</span></a>
						<br />
						<a href="http://restaurantathome.be" target="_blank"><span class="restoWebsite">http://restaurantathome.be</span></a>
						<br />
						<span class="hidden_info_mobile">
							<span class="restoSpecialty">Specialiteit: Ribbetjes</span><br />
							<span class="restoKitchentype">Keuken: Belgisch</span><br /><br />
							<span class="socials">
					   	<a href="#" target="_blank" class="restoFacebook hidden"><span class="fa fa-facebook-square fa-2x pull-right"></span></a>
						<a href="#" target="_blank" class="restoTwitter hidden"><span class="fa fa-twitter-square fa-2x pull-right"></span></a>
						<a href="#" target="_blank" class="restoInstagram hidden"><span class="fa fa-instagram fa-2x pull-right"></span></a>
						<a href="#" target="_blank" class="restoPicture hidden"><span class="fa fa-picture-o fa-2x pull-right"></span></a>
						</span>
						</span>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs text-center">
						<img id="logo_resto" class="restoLogo" src="http://placehold.it/450x210">
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 hidden_info_mobile">
						<p class="restoHours">
							<!--Ma: 15:00 - 23:00
							<br /> Di: 15:00 - 23:00
							<br /> Wo: Gesloten
							<br /> Do: 15:00 - 23:00
							<br />
							<strong>Vr: 15:00 - 00:00</strong>
							<br /> Za: 12:00 - 00:00
							<br /> Zo: 12:00 - 00:00
							<br />
							<br />
							<span class="fa fa-credit-card fa-2x" title="Bancontact/Mister Cash/Maestro"></span>
							<span class="fa fa-cc-visa fa-2x" title="VISA/MasterCard"></span>
							<span class="fa fa-bitcoin fa-2x" title="Bitcoin"></span>
							<span class="fa fa-money fa-2x" title="Cash"></span>-->
						</p>
					</div>

					<a href="#" class="btn_more_resto_info btn btn-primary hidden-lg hidden-md hidden-sm col-xs-8 col-xs-offset-2" style="margin-top: 10px;"><span class="fa fa-chevron-circle-down"></span> Meer info</a>
					<a href="#" class="btn_more_resto_info btn btn-primary hidden-lg hidden-md hidden-sm col-xs-8 col-xs-offset-2" style="margin-top: 10px; display: none;"><span class="fa fa-chevron-circle-up"></span> Minder info</a>
				</li>
			</ul>
		</div>

		<div role="tabpanel" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- PRODUCT TYPE CHOOSER -->
			<div id="product_type_chooser" class="clearfix" role="tablist" style="margin-bottom: 20px;">
				<a href="#voorgerechtenTab" aria-controls="voorgerechten" role="tab" data-toggle="pill" class="col-lg-2 col-md-4 col-sm-4 col-xs-12 text-center active" style="line-height: 40px;"><h4>VOORGERECHTEN</h4></a>
				<a href="#hoofdgerechtenTab" aria-controls="hoofdgerechten" role="tab" data-toggle="pill" class="col-lg-2 col-md-4 col-sm-4 col-xs-12 text-center" style="line-height: 40px;"><h4>HOOFDGERECHTEN</h4></a>
				<a href="#dessertsTab" aria-controls="desserts" role="tab" data-toggle="pill" class="col-lg-2 col-md-4 col-sm-4 col-xs-12 text-center" style="line-height: 40px;"><h4>DESSERTS</h4></a>
				<a href="#drankenTab" aria-controls="dranken" role="tab" data-toggle="pill" class="col-lg-2 col-md-4 col-sm-4 col-xs-12 text-center" style="line-height: 40px;"><h4>DRANKEN</h4></a>
				<a href="#extrasTab" aria-controls="extras" role="tab" data-toggle="pill" class="col-lg-2 col-md-4 col-sm-4 col-xs-12 text-center" style="line-height: 40px;"><h4>EXTRA'S</h4></a>
				<a href="#actiesTab" aria-controls="acties" role="tab" data-toggle="pill" class="col-lg-2 col-md-4 col-sm-4 col-xs-12 text-center" style="line-height: 40px;"><h4>ACTIES</h4></a>
			</div>

			<div class="tab-content">

				<section role="tabpanel" class="tab-pane" id="actiesTab">

					<!--<article class="col-lg-6 col-md-12 menu-item clearfix">
						<div class="col-lg-3 col-sm-3 col-xs-12">
							<img src="http://lorempixel.com/300/300/food" width="100%">
						</div>
						<div class="col-lg-5 col-sm-5 col-xs-12">
							<h3>Actie</h3>
							<h5><span class="label label-warning">Specialiteit</span></h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="col-lg-4 col-sm-4 col-xs-12">
							<div class="input-group">
								<span class="input-group-btn">
<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
<span class="glyphicon glyphicon-minus"></span>
								</button>
								</span>
								<input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
								<span class="input-group-btn">
<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
<span class="glyphicon glyphicon-plus"></span>
								</button>
								</span>
							</div>
							<div class="form-group">
									<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 26px;">Toevoegen</a>
									<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>
								</div>
						</div>
					</article>-->

				</section>
				<section role="tabpanel" class="tab-pane active" id="voorgerechtenTab">

				</section>
				<section role="tabpanel" class="tab-pane" id="hoofdgerechtenTab">

					<?php for ($i=1 ; $i <=11; $i++) { echo '<article class="col-lg-6 col-md-12 menu-item clearfix">
						<div class="col-lg-3 col-sm-3 col-xs-3">
							<img src="http://lorempixel.com/300/300/food" width="100%">
						</div>
						<div class="col-lg-5 col-sm-5 col-xs-5">
							<h3>Hoofdgerecht</h3>
							<h5><span class="label label-warning hidden-sm">Specialiteit</span></h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="col-lg-4 col-sm-4 col-xs-4">
							<div class="input-group">
								<span class="input-group-btn">
<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
<span class="glyphicon glyphicon-minus"></span>
								</button>
								</span>
								<input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
								<span class="input-group-btn">
<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
<span class="glyphicon glyphicon-plus"></span>
								</button>
								</span>
							</div>
							<div class="form-group">
									<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 26px;">Toevoegen</a>
									<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>
								</div>
						</div>
					</article>'; } ?>

				</section>
				<section role="tabpanel" class="tab-pane" id="dessertsTab">

					<?php for ($i=1 ; $i <=11; $i++) { echo '<article class="col-lg-6 col-md-12 menu-item clearfix">
						<div class="col-lg-3 col-sm-3 col-xs-3">
							<img src="http://lorempixel.com/300/300/food" width="100%">
						</div>
						<div class="col-lg-5 col-sm-5 col-xs-5">
							<h3>Dessert</h3>
							<h5><span class="label label-warning hidden-sm">Specialiteit</span></h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="col-lg-4 col-sm-4 col-xs-4">
							<div class="input-group">
								<span class="input-group-btn">
<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
<span class="glyphicon glyphicon-minus"></span>
								</button>
								</span>
								<input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
								<span class="input-group-btn">
<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
<span class="glyphicon glyphicon-plus"></span>
								</button>
								</span>
							</div>
							<div class="form-group">
									<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 26px;">Toevoegen</a>
									<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>
								</div>
						</div>
					</article>'; } ?>

				</section>
				<section role="tabpanel" class="tab-pane" id="drankenTab">
					<article class="col-xs-12 menu-item clearfix">
						<h4 class="text-center">Er zijn helaas geen producten van dit type.</h4>
					</article>
				</section>
				<section role="tabpanel" class="tab-pane" id="extrasTab">
					<article class="col-xs-12 menu-item clearfix">
						<h4 class="text-center">Er zijn helaas geen producten van dit type.</h4>
					</article>
				</section>
			</div>
		</div>
	</div>
</div>

<!-- Basket Modal -->
<div class="modal fade" id="basketModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom: 0;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel">Winkelwagen</h3>
			</div>
			<div class="modal-body clearfix" style="padding-top: 0;">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<?php for ($i=1 ; $i <=11; $i++) { echo '
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading'.$i. '">
								<h4 class="panel-title clearfix">
									<a class="col-lg-11 col-md-11 col-sm-11 col-xs-11 collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i. '" aria-expanded="false" aria-controls="collapse'.$i. '" style="display: block;padding-left: 0;">
										Product #'.$i. ' (1 stuk)
										<span class="pull-right">&euro; 14,99</span>
									</a>
									<a href="#" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right delete_from_cart" title="Verwijder product" alt="Verwijderen" style="padding: 0;"><span class="glyphicon glyphicon-remove" style="color: #d9534f;"></span></a>
								</h4>
							</div>
							<div id="collapse'.$i. '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$i. '">
								<div class="panel-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
								</div>
							</div>
						</div>'; } ?>
				</div>
				<div class="col-lg-9">
					TOTAAL (11 producten)
				</div>
				<div class="col-lg-3 text-right" style="font-weight: bold;">
					&euro; 164,89
				</div>
			</div>
			<div class="modal-footer">
				<a href="/checkout" type="button" class="btn btn-primary">Afrekenen</a>
			</div>
		</div>
	</div>
</div>

<!-- Maps Modal -->
<div class="modal fade" id="mapsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom: 0;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel">Locatie</h3>
			</div>
			<div class="modal-body clearfix" style="padding-top: 0;">
				<div id="mapCanvas" style="width: 100%;"></div>
			</div>
		</div>
	</div>
</div>

<!-- Add product to basket Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom: 0; margin: 0 0 0 15px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel">Voorgerecht 6</h3>
			</div>
			<div class="modal-body clearfix" style="padding-top: 0;">
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding-right: 0;">
					<img src="http://lorempixel.com/300/300/food/1" width="100%">
				</div>
				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
					<span class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix" style="line-height: 34px;padding-left: 0;margin: 0; font-size: 24px;">
					&euro; 14,99
				</span>

					<div class="input-group" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
						<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
							<span class="glyphicon glyphicon-minus"></span>
						</button>
						</span>
						<input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
						<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
							<span class="glyphicon glyphicon-plus"></span>
						</button>
						</span>
					</div>
					<p class="text-justify" style="margin-top: 20px;">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>

				</div>

				<h4 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="padding-top: 25px;">Aanbevolen producten</h4>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 clearfix">
					<img src="http://lorempixel.com/300/300/food/2" width="100%">
					<p class="text-justify" style="margin-top: 15px;">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</p>
					<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="line-height: 34px; margin: 0 0 10px; font-size: 24px;text-align: center;">
					&euro; 14,99
				</span>
					<div class="input-group" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
						<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
							<span class="glyphicon glyphicon-minus"></span>
						</button>
						</span>
						<p class="badge" style="color: #FFF; border: 2px solid white; background: #5cb85c; position: absolute; top: 49px; right: 5px; z-index: 500;">1</p>
						<input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
						<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
							<span class="glyphicon glyphicon-plus"></span>
						</button>
						</span>
					</div>
					<button type="button" class="btn btn-default" style="width: 100%; margin-top: 10px;">Toevoegen</button>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 clearfix">
					<img src="http://lorempixel.com/300/300/food/3" width="100%">
					<p class="text-justify" style="margin-top: 15px;">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</p>
					<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="line-height: 34px; margin: 0 0 10px; font-size: 24px;text-align: center;">
					&euro; 14,99
				</span>
					<div class="input-group" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
						<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
							<span class="glyphicon glyphicon-minus"></span>
						</button>
						</span>
						<input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
						<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
							<span class="glyphicon glyphicon-plus"></span>
						</button>
						</span>
					</div>
					<button type="button" class="btn btn-default" style="width: 100%; margin-top: 10px;">Toevoegen</button>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 clearfix">
					<img src="http://lorempixel.com/300/300/food/4" width="100%">
					<p class="text-justify" style="margin-top: 15px;">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</p>
					<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="line-height: 34px; margin: 0 0 10px; font-size: 24px;text-align: center;">
					&euro; 14,99
				</span>
					<div class="input-group" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
						<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
							<span class="glyphicon glyphicon-minus"></span>
						</button>
						</span>
						<input type="text" name="quant[1]" class="form-control input-number text-center" value="1" min="1" max="10">
						<span class="input-group-btn">
						<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
							<span class="glyphicon glyphicon-plus"></span>
						</button>
						</span>
					</div>
					<button type="button" class="btn btn-default" style="width: 100%; margin-top: 10px;">Toevoegen</button>
				</div>

				<div class="col-lg-3 col-xs-12" style="padding: 0;">

				</div>
			</div>
			<div class="modal-footer" style="padding-right: 30px;">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
				<button type="button" class="btn btn-primary">Toevoegen aan winkelmandje</button>
			</div>
		</div>
	</div>
</div>

<!-- Shop Hours Modal -->
<div class="modal fade" id="shopHoursModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Openingsuren <em><strong>Fleur De Lin</strong></em></h4>
			</div>
			<div class="modal-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Dag</th>
							<th>Openingstijden</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">Maandag</th>
							<td>12u00 - 21u30</td>
						</tr>
						<tr>
							<th scope="row">Dinsdag</th>
							<td>Gesloten</td>
						</tr>
						<tr>
							<th scope="row">Woensdag</th>
							<td>Gesloten</td>
						</tr>
						<tr>
							<th scope="row">Donderdag</th>
							<td>12u00 - 21u30</td>
						</tr>
						<tr>
							<th scope="row">Vrijdag</th>
							<td>12u00 - 21u30</td>
						</tr>
						<tr>
							<th scope="row">Zaterdag</th>
							<td>12u00 - 22u00</td>
						</tr>
						<tr>
							<th scope="row">Zondag</th>
							<td>12u00 - 21u00</td>
						</tr>
						<tr>
							<th scope="row">Feestdagen</th>
							<td>Gesloten</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
