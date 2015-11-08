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
            <h1 class="page-header">Aankomende acties</h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-xs-12 text-right" id="col_new_action">
            <a href="#" data-toggle="modal" data-title="Nieuwe actie aanmaken" data-target="#newActionModal" data-backdrop="static" class="btn btn-primary btn-lg" id="btn_new_action">
                <span class="fa fa-plus"></span>
                Nieuwe actie
            </a>
        </div>
    </div>

    <div class="row">
        <!-- START LOPENDE ACTIES -->
        <div class="col-lg-12">
            <div class="panel panel-default panel-yellow">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="futureactions">
                            <thead>
                            <tr>
                                <th>Naam actie</th>
                                <th>Looptijd</th>
                                <th># gebruikt</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>OP = OP</td>
                                <td><span class="hidden-xs">T.e.m. </span>31/12/2015</td>
                                <td>
                                    31
                                    <a href="#" data-toggle="modal" data-title="Actie bewerken" data-target="#newActionModal" data-backdrop="static" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Weg is pech</td>
                                <td><span class="hidden-xs">T.e.m. </span>30/09/2015</td>
                                <td>
                                    23
                                    <a href="#" data-toggle="modal" data-title="Actie bewerken" data-target="#newActionModal" data-backdrop="static" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Suggestie van de chef</td>
                                <td><span class="hidden-xs">T.e.m. </span>15/10/2015</td>
                                <td>
                                    7
                                    <a href="#" data-toggle="modal" data-title="Actie bewerken" data-target="#newActionModal" data-backdrop="static" title="Actie bewerken"><span class="fa fa-edit pull-right edit-action-icon"></span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- END LOPENDE ACTIES -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

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
                    <form class="form-horizontal">
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Naam actie</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Naam actie">
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Lijkt op</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option value=""></option>
                                    <option value="">Voorgerechten</option>
                                    <option value="">Hoofdgerechten</option>
                                    <option value="">Desserts</option>
                                    <option value="">Dranken</option>
                                    <option value="">Extra's</option>
                                </select>
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Geldig van</label>


                            <div class="col-sm-4">
                                <div class="form-group has-feedback clearfix">
                                    <span class="glyphicon glyphicon-calendar form-control-feedback" aria-hidden="true"></span>
                                    <input type="text" id="action_start_date" type="text" class="form-control datepicker">
                                </div>
                            </div>

                            <div class="col-sm-2 text-center">
                                <label class="control-label"><strong>tot</strong></label>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group has-feedback clearfix">
                                    <span class="glyphicon glyphicon-calendar form-control-feedback" aria-hidden="true"></span>
                                    <input type="text" id="action_end_date" type="text" class="form-control datepicker">
                                </div>
                            </div>
                        </div>

                        <!--<div class="input-group date">
                            <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>-->

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Type korting</label>

                            <div class="col-sm-5 form-group has-feedback">
                                <div class="col-sm-12">
                                    <div class="radio">
                                        <label class="col-xs-6">
                                            <input type="radio" name="reductionType" value="percentage" checked="checked" required="required"> %
                                        </label>
                                        <label class="col-xs-6">
                                            <input type="radio" name="reductionType" value="euro" required="required"> €
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Hoeveelheid</label>

                            <div class="col-sm-3 form-group has-feedback">
                                <input type="number" min="0" step="1" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" placeholder="Hoeveelheid">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">
                                # stempels
                                <a href="#">?</a>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" min="0" step="1" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" placeholder="Aantal stempels">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Beschrijving</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5"></textarea>
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Foto</label>
                            <div class="col-sm-10">
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Foto kiezen</span>
                                    <input type="file" name="files[]">
                                </span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Actieproducten</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Actieproducten">
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                            <a href="#" class="btn btn-primary btn-sm col-sm-3">Producten selecteren</a>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Capaciteit</label>
                            <div class="col-sm-10">


                                <div class="col-sm-6 form-group has-feedback">
                                    <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Ma</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Capaciteit">
                                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group has-feedback">
                                    <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Vr</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Capaciteit">
                                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group has-feedback">
                                    <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Di</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Capaciteit">
                                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group has-feedback">
                                    <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Za</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Capaciteit">
                                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group has-feedback">
                                    <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Wo</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Capaciteit">
                                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group has-feedback">
                                    <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Zo</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Capaciteit">
                                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group has-feedback">
                                    <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Do</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" required="required" placeholder="Capaciteit">
                                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                </div>




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
                        <button type="submit" class="btn btn-primary btn-lg">Actie cre&euml;eren</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>