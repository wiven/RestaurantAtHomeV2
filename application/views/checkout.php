<?php
/**
 * Restaurant At Home
 *
 * Contact page
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

    <h2>Afrekenen</h2>

    <h4 style="margin-bottom: 20px;">Je bent ingelogd als <strong><span id="username_logged_in">Wim Vandevenne</span></strong></h4>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Winkelwagentje</div>
        <div class="panel-body">
            <span>Gekozen restaurant: <a href="#"><strong class="">Fleur De Lin</strong></a></span>
        </div>

        <!-- Table -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Aantal</th>
                <th>Product</th>
                <th>Eenheidsprijs</th>
                <th>Totaalprijs</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>4</th>
                <td scope="row">Product 1</td>
                <td><span class="unit_price">&euro; 14,99</span></td>
                <td><span class="total_product_price">&euro; 59,96</span> <a href="#" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right delete_from_cart pull-right" title="Verwijder product" alt="Verwijderen"><span class="glyphicon glyphicon-remove" style="color: #d9534f;"></span></a></td>
            </tr>
            <tr>
                <th>2</th>
                <td scope="row">Product 2</td>
                <td><span class="unit_price">&euro; 14,99</span></td>
                <td><span class="total_product_price">&euro; 29,98</span> <a href="#" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right delete_from_cart pull-right" title="Verwijder product" alt="Verwijderen"><span class="glyphicon glyphicon-remove" style="color: #d9534f;"></span></a></td>
            </tr>
            <tr>
                <th>1</th>
                <td scope="row">Product 3</td>
                <td><span class="unit_price">&euro; 14,99</span></td>
                <td><span class="total_product_price">&euro; 14,99</span> <a href="#" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right delete_from_cart pull-right" title="Verwijder product" alt="Verwijderen"><span class="glyphicon glyphicon-remove" style="color: #d9534f;"></span></a></td>
            </tr>
            <tr>
                <th><h4><strong>7</strong></h4></th>
                <td scope="row"></td>
                <td><span class="unit_price"></span></td>
                <td><span class="total_product_price"><h4><strong>&euro; 104,93</strong></h4></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Leverdata</div>
        <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Afhaaldatum</label>
                    <div class="col-sm-4">
                        <input type="text" id="orderdate" class="form-control datepicker" placeholder="Datum" aria-describedby="addon1" style="cursor: default; background-color: #fff;">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Afhaaltijdstip</label>
                    <div class="col-sm-4 bootstrap-timepicker">
                        <input id="ordertime" type="text" class="form-control timepicker" name="ordertime">
                    </div>
                </div>

                <!--<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Afhaaltijdstip</label>
                    <div class="col-sm-10">
                        <div class="bootstrap-timepicker">
                            <input id="timepicker" type="text" class="input-small">
                            <i class="icon-time"></i>
                        </div>
                        <input id="timepicker1" type="text" class="form-control timepicker" aria-describedby="addon2" style="width:62px;">
                    </div>
                </div>-->

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Voornaam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Voornaam">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Familienaam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Familienaam">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">E-mailadres</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputPassword3" placeholder="E-mailadres">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Telefoonnummer</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="inputPassword3" placeholder="Telefoonnummer">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Facturatieadres</label>
                    <div class="col-sm-10">
                        <select class="form-control" required="required" placeholder="test">
                            <option>Stokstraat 47, 9240 Zele</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Opmerkingen</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" placeholder="Opmerkingen bij bestelling"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Betaling</div>
        <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Voucher">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Betalingswijze</label>
                    <div class="col-sm-10">
                        <select class="form-control" required="required" placeholder="test">
                            <option value=""></option>
                            <option>Cash</option>
                            <option>Bancontact / Mister Cash</option>
                            <option>VISA / MasterCard</option>
                            <option>Bitcoin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required="required"> Ik heb de <a href="/generalconditions" target="_blank">algemene voorwaarden</a> gelezen en ik aanvaard ze.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="/paymentsuccess" class="btn btn-primary">Verder naar betaling</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php //EOF  -'It all ends here'-   ?>
    
