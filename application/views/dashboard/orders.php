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

    <div class="row ordersRow hidden">
        <!-- START nieuwe bestellingen -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 newOrdersDiv">
            <div class="panel panel-default panel-red">
                <div class="panel-heading">
                    Nieuwe bestellingen
                </div>
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
                            <tr class="order_detail_tr">
                                <td>{{date}}</td>
                                <td>{{name}}</td>
                                <td>{{items}}</td>
                                <td>{{slots}}</td>
                                <td>{{amount}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="/dashboard/orders/new" class="btn btn-default btn-block">
                            <span class="fa fa-plus-square"></span> Meer bestellingen weergeven ...
                        </a>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- END nieuwe bestellingen -->
        <!-- START  bestellingen in verwerking -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 inprogressOrdersDiv">
            <div class="panel panel-default">
                <div class="panel-heading panel-primary">
                    Bestellingen in verwerking
                </div>
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
                                <tr class="order_detail_tr">
                                    <td>{{date}}</td>
                                    <td>{{name}}</td>
                                    <td>{{items}}</td>
                                    <td>{{slots}}</td>
                                    <td>{{amount}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="/dashboard/orders/busy" class="btn btn-default btn-block">
                            <span class="fa fa-plus-square"></span> Meer bestellingen weergeven ...
                        </a>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- END  bestellingen in verwerking -->

    </div>

    <div class="row ordersRow hidden">
        <!-- START af te leveren bestellingen -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 readyOrdersDiv">
            <div class="panel panel-default panel-yellow">
                <div class="panel-heading">
                    Af te leveren bestellingen
                </div>
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
                            <tr class="order_detail_tr">
                                <td>{{date}}</td>
                                <td>{{name}}</td>
                                <td>{{items}}</td>
                                <td>{{slots}}</td>
                                <td>{{amount}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="/dashboard/orders/completed" class="btn btn-default btn-block">
                            <span class="fa fa-plus-square"></span> Meer bestellingen weergeven ...
                        </a>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- END af te leveren bestellingen -->
        <!-- START afgeleverde bestellingen -->
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 finishedOrdersDiv">
            <div class="panel panel-default panel-green">
                <div class="panel-heading">
                    Afgeleverde bestellingen
                </div>
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
                            <tr class="order_detail_tr">
                                <td>{{date}}</td>
                                <td>{{name}}</td>
                                <td>{{items}}</td>
                                <td>{{slots}}</td>
                                <td>{{amount}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="/dashboard/orders/completed" class="btn btn-default btn-block">
                            <span class="fa fa-plus-square"></span> Meer bestellingen weergeven ...
                        </a>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- END afgeleverde bestellingen -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal order info-->
<div class="modal fade" id="orderInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content clearfix">
            <div class="row" id="orderModalLoaderDiv" style="margin: 80px;">
                <span class="fa fa-spinner fa-spin fa-5x fa-fw" style="width: 100%; z-index: 9999;"></span>
            </div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Orderinfo</h4>
            </div>
            <div class="modal-body text-justify clearfix">
                <div class="col-lg-6">
                    Afhaaldatum: <strong><span id="orderCollectDate">19/08/2015</span></strong><br />
                    Afhaaluur: <strong><span id="orderCollectHour">19u30</span></strong><br />
                    Betalingsstatus: <span class="label label-success" id="orderPaymentMethod">Betaald (BanContact)</span>
                </div>
                <div class="col-lg-6 text-right ">
                    Klant: <strong><span id="orderClientName">Wim Vandevenne</span></strong><br />
                    Adres: <strong><em><span id="orderClientAddress">Stokstraat 47, Zele</span></em></strong><br />
                    Kortingscode: <strong><em><span id="orderCouponCode">-</span></em></strong>
                </div>
                <div class="col-lg-12 clear">
                    Opmerkingen klant: <strong><span id="orderClientMsg">De steak moet niet te hard gebakken zijn, en de frietjes mogen nog wat slap zijn!</span></strong>
                </div>
                <div class="col-lg-12">
                    <ul id="orderProducts">
                        <?php
                        for($i = 0; $i < 11; $i++) {
                            echo '<li>Product '.($i+1).'</li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-12 text-center clear">
                    <strong>TOTAALBEDRAG: €<span id="orderTotalAmount">112,67</span></strong>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <a href="#" class="btn btn-warning btn-block orderMarkBusy">
                        <span class="fa fa-check fa-fw"></span>
                        Markeer als bezig
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <a href="#" class="btn btn-success btn-block orderMarkReady">
                        <span class="fa fa-check fa-fw"></span>
                        Markeer als klaar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>