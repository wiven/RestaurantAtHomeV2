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
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
            <p>
                Hebt u een vraag voor ons, of vindt u dat er nog iets ontbreekt om dit project nog beter te maken? <br />
                Aarzel dan niet en contacteer ons!
                Laat het ons weten, en we reageren zo snel mogelijk op uw vraag.
            </p>
        </div>

        <div class="col-lg-12">
            <form class="form-horizontal">
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
                        <button type="submit" class="btn btn-primary">Versturen</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12" id="contact_methods">
            <div class="col-lg-4 text-center">
                <a href="mailto:info@restaurantathome.be">
                    <span class="fa fa-envelope fa-fw"></span> info@restaurantathome.be
                </a>
            </div>

            <div class="col-lg-4 text-center">
                <a href="https://www.facebook.com/restaurantathome.be" target="_blank">
                    <span class="fa fa-facebook fa-fw"></span> restaurantAtHome.be
                </a>
            </div>

            <div class="col-lg-4 text-center">
                <a href="https://twitter.com/restoathome" target="_blank">
                    <span class="fa fa-twitter fa-fw"></span> restoAtHome
                </a>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->