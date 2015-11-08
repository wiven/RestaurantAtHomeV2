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
        </div>

        <div class="col-lg-12">
            <form class="form-horizontal" id="loyaltyForm">
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label" style="text-align: left;" for="loyaltyNumber">Stempels</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="loyaltyNumber" name="loyaltyNumber" aria-describedby="inputSuccess2Status" required="required" placeholder="Stempels volle kaart">
                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label" style="text-align: left;" for="loyaltyGift">Cadeau</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" id="loyaltyGift" name="loyaltyGift" required="required" placeholder="Volle klantenkaart geeft de klant recht op..."></textarea>
                        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442;"></span>
                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <p class="help-block pull-right"><span style="color: #a94442; font-weight: bold;">*</span> Verplicht in te vullen</p>
                        <button type="submit" id="loyaltyFormSubmit" class="btn btn-primary">Opslaan</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->