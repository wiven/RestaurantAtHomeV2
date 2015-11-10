<?php
/**
 * Restaurant At Home
 *
 * Loyalty page for restaurants
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
    </div>

    <div class="row">
        <div class="col-xs-12 text-justify">
            <p>Hier kan u aangeven wanneer u wil dat de klanten een vol klantenkaartje hebben, de keuze staat volledig vrij. Alsook het cadeau dat de klanten krijgen bij een volle klantenkaart is volledig vrij te kiezen.</p>
            <div class="alert alert-success hidden" id="loyaltySuccessMsg" role="alert">
                <span class="fa fa-info fa-fw"></span> Loyalty werd succesvol bijgewerkt.
            </div>
        </div>

        <div class="col-lg-12">
            <form class="form-horizontal" id="loyaltyForm">
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label" style="text-align: left;" for="loyaltyReductionType">Type korting
                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                    </label>

                    <div class="col-sm-10 form-group has-feedback">
                        <div class="col-sm-12">
                            <div class="radio">
                                <label class="col-xs-6">
                                    <input type="radio" name="loyaltyReductionType" value="Percentage" required="required"> %
                                </label>
                                <label class="col-xs-6">
                                    <input type="radio" name="loyaltyReductionType" value="Amount" required="required"> €
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label" style="text-align: left;" for="loyaltyReductionAmount">Hoeveelheid
                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                    </label>

                    <div class="col-sm-10 form-group has-feedback">
                        <input type="number" min="0" step="1" class="form-control" id="loyaltyReductionAmount" name="loyaltyReductionAmount" aria-describedby="inputSuccess2Status" placeholder="Hoeveelheid korting">
                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label" style="text-align: left;" for="loyaltyNumber">Stempels
                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                    </label>
                    <div class="col-sm-10 form-group has-feedback">
                        <input type="number" class="form-control" id="loyaltyNumber" name="loyaltyNumber" aria-describedby="inputSuccess2Status" required="required" placeholder="Aantal stempels volle kaart">
                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                    </div>
                </div>

                <!--<div class="form-group has-feedback">
                    <label class="col-sm-2 control-label" style="text-align: left;" for="loyaltyProduct">Kortingproduct
                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="loyaltyProduct" name="loyaltyProduct" placeholder="Kortingproducten" required="required">
                            <option value=""></option>
                            <option value="">OP = OP</option>
                            <option value="">Keuze van de chef</option>
                            <option value="">Happy hour</option>
                        </select>

                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                    </div>
                </div>-->

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <p class="help-block"><span style="color: #a94442; font-weight: bold;">&ast;</span> Verplicht in te vullen</p>
                        <button type="submit" class="btn btn-primary btn-lg" id="loyaltyFormSubmit">Loyalty bijwerken</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->