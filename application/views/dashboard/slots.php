<?php
/**
 * Restaurant At Home
 *
 * Contact page for restaurants
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
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo (isset($pretty_page_title) ? $pretty_page_title : '') ?></h1>
        </div>
        <!-- /.col-lg-12 -->
        <!--<div class="col-xs-12 text-right" id="col_new_action">
            <a href="#" data-toggle="modal" data-target="#editSlotSchemeModal" data-backdrop="static" class="btn btn-primary btn-lg" id="btn_new_action">
                <span class="fa fa-plus"></span>
                Weekschema aanpassen
            </a>
        </div>-->
    </div>

    <div class="row">
        <div id="dash_product_search">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="form-group has-feedback clearfix">
                    <span class="glyphicon glyphicon-calendar form-control-feedback" aria-hidden="true"></span>
                    <input type="text" id="slotDate" type="text" class="form-control datepicker" placeholder="Kies een datum" readonly="true">
                    <!--<input type="search" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" placeholder="Product zoeken ...">
                    <span id="inputSuccess2Status" class="sr-only">(date)</span>-->
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <a href="#" class="btn btn-primary form-control" id="set_today_active_btn">
                    <span class="fa fa-calendar-o fa-fw"></span>
                    Vandaag</a>
            </div>
            <!--<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <a href="#" class="btn btn-primary form-control">
                    <span class="fa fa-plus fa-fw"></span>
                     Slot aanmaken</a>
            </div>-->

        </div>
    </div>

    <div class="row" id="slotsDiv">
        <!-- START LOPENDE ACTIES -->
<!--        --><?php //for($i = 0; $i < 10; $i++) {
//            echo '
//        <div class="col-lg-3">
//            <div class="panel panel-default">
//                <div class="panel-body">
//                    <form class="form-horizontal">
//                        <div class="form-group has-feedback">
//                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Van</label>
//                            <div class="col-sm-10">
//                                <input type="text" />
//                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
//                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
//                            </div>
//                        </div>
//
//                        <div class="form-group has-feedback">
//                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Tot</label>
//                            <div class="col-sm-10">
//                                <input type="text" />
//                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
//                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
//                            </div>
//                        </div>
//
//                        <div class="form-group has-feedback">
//                            <div class="col-sm-5">
//                                <select class="form-control">
//                                    <option value="">0</option>
//                                    <option value="">5</option>
//                                    <option value="">10</option>
//                                    <option value="">15</option>
//                                    <option value="">20</option>
//                                    <option value="">25</option>
//                                </select>
//                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
//                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
//                            </div>
//                            <label class="col-sm-6 control-label" for="inputSuccess2"># slots</label>
//                            <div class="col-sm-12">
//                                <a href="#" class="btn_slot_zero btn btn-warning btn-block clearfix">
//                                    <span class="fa fa-eraser fa-fw"></span> 0 zetten
//                                </a>
//                            </div>
//                        </div>
//                    </form>
//                </div>
//                <!-- /.panel-body -->
//            </div>
//            <!-- /.panel -->
//        </div>'; } ?>

        <!--<div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-body">
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel --
        </div>
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-body">
                </div>
                <!-- /.panel-body --
            </div>-->
            <!-- /.panel --
        </div>--
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-body">
                </div>
                <!-- /.panel-body --
            </div>
            <!-- /.panel --
        </div>-->
        <!-- END LOPENDE ACTIES -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal new action -->
<div class="modal fade" id="editSlotSchemeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Weekschema aanpassen</h4>
            </div>
            <div class="modal-body text-justify">
                <p>
                    Dit schema is een richtlijn voor het aantal slots in een gewone week.
                    Hierin worden je openingsuren dynamisch ingeladen van je profielpagina.
                    Indien je de openingsuren van het restaurant wilt wijzigen, kan je dit <a href="/dashboard/profile">hier</a> doen.
                </p>
                <div class="col-lg-12">
                    <form class="form-horizontal">
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Naam actie</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Naam actie">
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
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
                        <button type="submit" class="btn btn-primary btn-lg">Wijzigingen opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>