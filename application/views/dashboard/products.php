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
        <div class="col-xs-12 text-right" id="col_new_action">
            <a href="#" data-toggle="modal" data-title="Nieuw product aanmaken" data-target="#newProductModal" data-backdrop="static" class="btn btn-primary btn-lg" id="btn_new_product">
                <span class="fa fa-plus"></span>
                Nieuw product
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12" id="dash_product_search">
            <div class="col-lg-6">
                <div class="form-group has-feedback clearfix">
                    <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
                    <input type="search" class="form-control" id="productSearch" aria-describedby="inputSuccess2Status" placeholder="Product zoeken ...">
                    <span id="inputSuccess2Status" class="sr-only">(search)</span>
                </div>
            </div>
            <div class="col-lg-6">
                <select class="form-control" id="productCategorieSearch">
                    <option value="">Kies de productcategorie</option>
                    <option value="1">Voorgerechten</option>
                    <option value="2">Hoofdgerechten</option>
                    <option value="3">Desserts</option>
                    <option value="4">Dranken</option>
                    <option value="5">Extra's</option>
                </select>
            </div>

        </div>
    </div>

    <div class="row">
        <!-- START VERLOPEN ACTIES -->
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mijn producten
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" id="resto_products">
                    <div class="row" id="loaderDiv" style="margin: 80px;">
                        <span class="fa fa-spinner fa-spin fa-5x fa-fw" style="width: 100%; z-index: 9999;"></span>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- END VERLOPEN ACTIES -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal new product -->
<div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Nieuw product aanmaken</h4>
            </div>
            <div class="modal-body text-justify">
                <div class="col-lg-12">
                    <form class="form-horizontal" id="productForm">
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="ProductName">Naam product
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ProductName" name="ProductName" aria-describedby="prodNameStatus" tabindex="1" required="required" placeholder="Naam product">
                                <span id="prodNameStatus" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="ProductType">Categorie
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control chosen-select" id="ProductType" name="ProductType" tabindex="2">
                                    <option value=""></option>
                                </select>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="ProductPrice">
                                Prijs
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" aria-describedby="inputSuccess2Status" tabindex="3" required="required" placeholder="Prijs">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="ProductLoyalty">
                                # stempels
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="ProductLoyalty" name="ProductLoyalty" aria-describedby="inputSuccess2Status" tabindex="4" required="required" placeholder="Aantal stempels">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="ProductDescription">Beschrijving
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="ProductDescription" name="ProductDescription" tabindex="5"></textarea>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="ProductPhoto">Foto</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ProductPhoto" name="ProductPhoto" disabled="disabled" aria-describedby="inputSuccess2Status" tabindex="6" placeholder="Foto">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-sm btn-danger pull-right" title="Foto verwijderen" id="ProductPhotoDelete">
                                    <span class="fa fa-trash-o fa-2x fa-fw"></span>
                                </button>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="ProductSlots"># slots
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="ProductSlots" name="ProductSlots" aria-describedby="inputSuccess2Status" tabindex="7"  required="required" placeholder="Aantal slots">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="ProductRelatedProducts">Gerelateerd<br /><span id="ProductRelatedProductsError">(max. 3)</span>
                                <!--<span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>-->
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="ProductRelatedProducts" name="ProductRelatedProducts" tabindex="8" multiple></select>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-sm-12">
                        <p class="help-block"><span style="color: #a94442; font-weight: bold;">&ast;</span> Verplicht in te vullen</p>
                        <button type="cancel" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                        <button class="btn btn-sm btn-danger pull-left" id="ProductDelete">
                            <span class="fa fa-trash-o fa-2x fa-fw"></span>
                        </button>
                        <span class="btn btn-sm btn-success fileinput-button pull-left" style="margin-top: 4px;" id="PhotoBtn">
                            <i class="fa fa-camera fa-fw"></i>
                            <span>Foto toevoegen</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="updatedProductPhotoUpload" type="file" name="files[]">
                        </span>
                        <button type="submit" class="btn btn-primary btn-lg" id="productModalSubmit">Product aanmaken</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal new product -->
<div class="modal fade" id="addProductPhotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Foto nieuw product</h4>
            </div>
            <div class="modal-body text-center clearfix">
                <div class="col-lg-12">
                    <span class="btn btn-lg btn-success fileinput-button">
                        <i class="fa fa-camera fa-fw"></i>
                        <span>Selecteer productfoto</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="newProductPhotoUpload" type="file" name="files[]">
                    </span>
                </div>
            </div>

            <!--<div class="modal-footer">
                <div class="form-group">
                    <div class="col-sm-12">
                        <p class="help-block"><span style="color: #a94442; font-weight: bold;">&ast;</span> Verplicht in te vullen</p>
                        <button type="cancel" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                        <button class="btn btn-sm btn-danger pull-left" id="ProductDelete">
                            <span class="fa fa-trash-o fa-2x fa-fw"></span>
                        </button>
                        <span class="btn btn-sm btn-success fileinput-button pull-left" style="margin-top: 4px;">
                            <i class="fa fa-camera fa-fw"></i>
                            <span>Selecteer productfoto</span>
                            <!-- The file input field used as target for the file upload widget --
                            <input id="productPhotoUpload" type="file" name="files[]">
                        </span>
                        <button type="submit" class="btn btn-primary btn-lg" id="productModalSubmit">Product aanmaken</button>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>