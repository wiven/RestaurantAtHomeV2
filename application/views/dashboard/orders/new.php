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
            <h1 class="page-header">Nieuwe bestellingen</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <!-- START LOPENDE ACTIES -->
        <div class="col-lg-12">
            <div class="panel panel-default panel-red">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Afhaaltijdstip</th>
                                <th>Naam klant</th>
                                <th># items</th>
                                <th># slots</th>
                                <th>Prijs</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($i = 0; $i < 3; $i++) {
                                echo '<tr class="order_detail_tr">
                                <td>17/'.($i+10).'/2015 '.($i+10).'u00</td>
                                <td>Wim Vandevenne</td>
                                <td>4</td>
                                <td>31</td>
                                <td>&euro; 24,85</td>
                            </tr>';
                            }

                            ?>
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
                    Afhaaluur: <strong><span>19u30</span></strong><br />
                    Betalingsstatus: <span class="label label-danger">Niet betaald (cash)</span>
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
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <a href="#" class="btn btn-warning btn-block">
                        <span class="fa fa-check fa-fw"></span>
                        Markeer als bezig
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <a href="#" class="btn btn-success btn-block">
                        <span class="fa fa-check fa-fw"></span>
                        Markeer als klaar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

