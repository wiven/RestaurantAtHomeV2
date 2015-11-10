<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo (isset($pretty_page_title) ? $pretty_page_title : '') ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12 hidden" id="new_order_box">
			<div class="panel panel-default">
				<div class="panel-heading pending-orders">
                    <a href="/dashboard/orders" id="new_orders_msg">
                        <h4>U heeft <span id="new_order_count">0</span> nieuwe bestelling<span id="multiple_orders">en</span></h4>
                    </a>
				</div>
			</div>
		</div>

        <!--<div class="alert alert-info text-center clearfix">
            <span class="fa fa-info-circle fa-fw fa-2x"></span><br />
            Bericht aan Kevin: De menu-items aan de linkerkant zitten in fase 1 van uitrol van de test. <br />
            Voorziene datum is (zoals afgesproken) begin week 39.
        </div>-->

		<!-- /.row -->
		<div class="row clearfix">
			<!-- BESTELLINGEN VANDAAG -->
            <div class="col-lg-6">
                <div class="panel panel-default" id="panel_lopende_acties_overview">
                    <div class="panel-heading">
                        <i class="fa fa-tasks fa-fw"></i> Bestellingen vandaag
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="alert alert-info text-center" role="alert" id="no_orders_msg">
                            <span class="fa fa-info-circle fa-fw"></span> Er zijn vandaag geen bestellingen<br />
                            Klik <a href="/dashboard/orders">hier</a> om alle bestellingen te zien.
                        </div>

                        <div class="table-responsive" id="todays_orders">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Afhaal<span class="hidden-xs">tijdstip</span></th>
                                    <th>Naam<span class="hidden-xs"> klant</span></th>
                                    <th>#<span class="hidden-xs"> items</span></th>
                                    <th>Prijs</th>
                                </tr>
                                </thead>
                                <tbody id="todays_orders_div"></tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <a href="/dashboard/orders" class="btn btn-default btn-block">
                                <span class="fa fa-plus-square"></span> Alle bestellingen weergeven ...
                            </a>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <!-- LOPENDE ACTIES -->
            <div class="col-lg-6">
                <div class="panel panel-default" id="panel_lopende_acties_overview">
                    <div class="panel-heading">
                        <i class="fa fa-fire fa-fw"></i> Lopende acties
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="alert alert-info text-center hidden" role="alert" id="no_promos_msg">
                            <span class="fa fa-info-circle fa-fw"></span> Er zijn geen lopende acties<br />
                            Klik <a href="/dashboard/actions">hier</a> om een actie aan te maken.
                        </div>

                        <div class="table-responsive" id="active_promos">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Naam actie</th>
                                    <th>Looptijd</th>
                                    <th>#<span class="hidden-xs"> gebruikt</span></th>
                                </tr>
                                </thead>
                                <tbody id="active_promos_div"></tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <a href="/dashboard/actions" class="btn btn-default btn-block">
                                <span class="fa fa-plus-square"></span> Meer acties weergeven ...
                            </a>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

			<!-- Partners -->
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-link fa-fw"></i> Onze partners
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
                        <div class="alert alert-info text-center hidden" role="alert" id="no_partners_msg">
                            <span class="fa fa-info-circle fa-fw"></span> Er zijn geen partners te vinden<br />
                            <a href="/dashboard/contact">Contacteer ons</a> om een partner toe te voegen.
                        </div>
                        <div id="partners_div"></div>

						<div class="col-lg-12">
							<a href="/dashboard/partners" class="btn btn-default btn-block">Bekijk alle partners</a>
						</div>
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- Partners -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<!-- Modal order info-->
<div class="modal fade" id="orderInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Orderinfo</h4>
            </div>
            <div class="modal-body text-justify clearfix">
                <div class="col-lg-6">
                    Afhaaldatum: <strong><span>19/08/2015</span></strong><br />
                    Afhaaluur: <strong><span>19u30</span></strong>
                </div>
                <div class="col-lg-6 text-right ">
                    Klant: <strong><span>Wim Vandevenne</span></strong><br />
                    Adres: <em><span>Stokstraat 47, Zele</span></em>
                </div>
                <div class="col-lg-12 clear">
                    Opmerkingen klant: <span>De steak moet niet te hard gebakken zijn, en de frietjes mogen nog wat slap zijn!</span>
                </div>
                <div class="col-lg-12">
                    <ul>
                        <?php
                            for($i = 0; $i < 11; $i++) {
                                echo '<li>Product '.($i+1).'</li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-12 text-center clear">
                    <strong>TOTAALBEDRAG: €112,67</strong>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <a href="#" class="btn btn-warning btn-block">
                        <span class="fa fa-check fa-fw"></span>
                        Markeer als bezig
                    </a>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <a href="#" class="btn btn-success btn-block">
                        <span class="fa fa-check fa-fw"></span>
                         Markeer als klaar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal new action -->
<div class="modal fade" id="newActionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Nieuwe actie aanmaken</h4>
            </div>
            <div class="modal-body text-justify">
                <div class="col-lg-12">
                    <form class="form-horizontal" id="promotionForm" type="POST">
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Naam actie<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="PromotionName" name="PromotionName" aria-describedby="inputSuccess2Status" required="required" placeholder="Naam actie">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Type<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span></label>
                            <div class="col-sm-10">
                                <select class="form-control chosen-select" id="PromotionType" name="PromotionType">
                                    <option value=""></option>
                                    <option value="2">OP = OP</option>
                                </select>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Geldig van
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>


                            <div class="col-sm-4">
                                <div class="form-group has-feedback clearfix">
                                    <span class="glyphicon glyphicon-calendar form-control-feedback" aria-hidden="true"></span>
                                    <input type="text" id="PromotionStartDate" name="PromotionStartDate" type="text" class="form-control datepicker">
                                </div>
                            </div>

                            <div class="col-sm-2 text-center">
                                <label class="control-label">
                                    <strong>tot
                                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                                    </strong></label>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group has-feedback clearfix">
                                    <span class="glyphicon glyphicon-calendar form-control-feedback" aria-hidden="true"></span>
                                    <input type="text" id="PromotionEndDate" name="PromotionEndDate" type="text" class="form-control datepicker">
                                </div>
                            </div>
                        </div>

                        <!--<div class="input-group date">
                            <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>-->

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Type korting
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>

                            <div class="col-sm-5 form-group has-feedback">
                                <div class="col-sm-12">
                                    <div class="radio">
                                        <label class="col-xs-6">
                                            <input type="radio" name="reductionType" value="Percentage" id="PromotionReductionType1" checked="checked" required="required"> %
                                        </label>
                                        <label class="col-xs-6">
                                            <input type="radio" name="reductionType" value="Amount" id="PromotionReductionType2" required="required"> €
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Hoeveelheid
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>

                            <div class="col-sm-3 form-group has-feedback">
                                <input type="number" min="0" step="0.1" class="form-control" id="PromotionReductionAmount" name="PromotionReductionAmount" aria-describedby="inputSuccess2Status" placeholder="Hoeveelheid">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">
                                # stempels
                                <a href="#">?</a>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" min="0" step="1" class="form-control" id="PromotionLoyaltyAmount" name="PromotionLoyaltyAmount" aria-describedby="inputSuccess2Status" placeholder="Aantal stempels">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Beschrijving
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="PromotionDescription" name="PromotionDescription"></textarea>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Foto</label>
                            <div class="col-sm-10">
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Foto kiezen</span>
                                    <input type="file" name="PromotionPhoto">
                                </span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Actieproduct
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control chosen-select" id="PromotionProduct" name="PromotionProduct">
                                    <option value=""></option>
                                    <option value="2">OP = OP</option>
                                </select>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <p class="help-block"><span style="color: #a94442; font-weight: bold;">&ast;</span> Verplicht in te vullen</p>
                        <button type="cancel" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                        <input type="submit" class="btn btn-primary btn-lg" id="editPromotionBtn" value="Wijzigingen opslaan" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal loading -->
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content clearfix">
            <div class="modal-header">
            </div>
            <div class="modal-body text-center clearfix">
                <span class="fa fa-spinner fa-5x fa-pulse"></span>
            </div>
        </div>
    </div>
</div>