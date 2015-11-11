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
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 row-grid">
            <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target="#editContactModal" data-backdrop="static" title="Bewerk contactgegevens">
                <span class="fa fa-edit fa-fw" data-toggle="tooltip" data-placement="top" title="" data-original-title="Actie bewerken"></span>
                Bewerk contactgegevens</a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 row-grid">
            <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target="#editCoverModal" data-backdrop="static" title="Bewerk coverfoto">
                <span class="fa fa-edit fa-fw" data-toggle="tooltip" data-placement="top" title="" data-original-title="Actie bewerken"></span>
                Bewerk coverfoto</a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 row-grid">
            <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target="#editOpeningHoursModal" data-backdrop="static" title="Bewerk openingsuren">
                <span class="fa fa-edit fa-fw" data-toggle="tooltip" data-placement="top" title="" data-original-title="Actie bewerken"></span>
                Bewerk openingsuren</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target="#editSocialModal" data-backdrop="static" title="Bewerk social media">
                <span class="fa fa-edit fa-fw" data-toggle="tooltip" data-placement="top" title="" data-original-title="Actie bewerken"></span>
                Bewerk social media</a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target="#editRestoPhotosModal" data-backdrop="static" title="Bewerk sfeerfoto's">
                <span class="fa fa-edit fa-fw" data-toggle="tooltip" data-placement="top" title="" data-original-title="Actie bewerken"></span>
                Bewerk sfeerfoto's</a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target="#editPaymentsModal" data-backdrop="static" title="Bewerk betaalmogelijkheden">
                <span class="fa fa-edit fa-fw" data-toggle="tooltip" data-placement="top" title="" data-original-title="Actie bewerken"></span>
                Bewerk betaalmogelijkheden</a>
        </div>
    </div>
    <div class="row" id="loaderDiv" style="margin: 80px;">
        <span class="fa fa-spinner fa-spin fa-5x fa-fw" style="width: 100%; z-index: 9999;"></span>
    </div>

    <div class="row hidden" id="restoInfoDiv">
        <div class="col-lg-12">
            <h3>Preview voor de klanten</h3>

            <ul class="list-group clearfix">
                <li class="list-group-item clearfix" id="info_resto">

                    <div class="hidden-lg hidden-md hidden-sm col-xs-12 text-center" id="restoLogoDiv">
<!--                        <img id="logo_resto" class="img-responsive" src="http://www.restaurantfleurdelin.be/img/1.png">-->
                        <img id="logo_resto" class="img-responsive restoLogo" src="http://wiven.be/logo.png">
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-right" id="important_info_resto">
                        <a href="#" title="Routebeschrijving" data-toggle="modal" data-target="#mapsModal" data-backdrop="static">
                            <span class="fa fa-map-marker fa-fw"></span>
                            <span class="restoAddress">IJzerfrontlaan 13, 8500 Kortrijk</span>
                        </a>
                        <br /><span class="restoPhone">+32 2 123 45 67</span>
                        <br />
                        <span class="restoEmail">info@restaurantathome.be</span>
                        <br />
                        <span class="restoUrl">http://restaurantathome.be</span>
                        <br />
						<span class="hidden_info_mobile">
							<span class="restoSpecialtyDiv">Specialiteit: <span class="restoSpecialty">Ribbetjes</span><br /></span>
							Keuken: <span class="restoKitchen">Belgisch</span><br /><br />
							<span class="socials visible-lg-block">
                                <a id="facebookLogo" class="hidden" title="Facebook" href="" target="_blank"><span class="fa fa-facebook-square fa-2x pull-right"></span></a>
                                <a id="twitterLogo" class="hidden" title="Twitter" href="" target="_blank"><span class="fa fa-twitter-square fa-2x pull-right"></span></a>
                                <a id="instagramLogo" class="hidden" title="Instagram" href="" target="_blank"><span class="fa fa-instagram fa-2x pull-right"></span></a>
                                <a id="photosLogo" class="hidden" title="Sfeerfoto's" href="" target="_blank"><span class="fa fa-picture-o fa-2x pull-right"></span></a>
						    </span>
						</span>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs text-center">
                        <img id="logo_resto" class="img-responsive vcenter restoLogo" src="http://www.restaurantfleurdelin.be/img/1.png">
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 hidden_info_mobile">
                        <p>
                            <span id="RestoOpeningHours">
                                Ma: 15:00 - 23:00
                                <br /> Di: 15:00 - 23:00
                                <br /> Wo: Gesloten
                                <br /> Do: 15:00 - 23:00
                                <br />
                                <strong>Vr: 15:00 - 00:00</strong>
                                <br /> Za: 12:00 - 00:00
                                <br /> Zo: 12:00 - 00:00
                            </span>

                            <br />
                            <br />
                            <span class="fa fa-credit-card fa-2x PaymentBancontact hidden" title="Bancontact/Mister Cash"></span>
                            <span class="fa fa-cc-visa fa-2x PaymentCredit hidden" title="VISA/MasterCard"></span>
                            <span class="fa fa-bitcoin fa-2x PaymentBitcoin hidden" title="Bitcoin"></span>
                            <span class="fa fa-money fa-2x PaymentCash hidden" title="Cash"></span>
                            <span class="PaymentSodexo hidden"><img title="Sodexo" src="../public/img/sodexo_icon.jpg" /></span>
                            <span class="PaymentEMV hidden" title="Maaltijdcheques">EMV</span>
                        </p>
                    </div>

                    <a href="#" class="btn_more_resto_info btn btn-primary hidden-lg hidden-md hidden-sm col-xs-8 col-xs-offset-2" style="margin-top: 10px;"><span class="fa fa-chevron-circle-down"></span> Meer info</a>
                    <a href="#" class="btn_more_resto_info btn btn-primary hidden-lg hidden-md hidden-sm col-xs-8 col-xs-offset-2" style="margin-top: 10px; display: none;"><span class="fa fa-chevron-circle-up"></span> Minder info</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Modal edit cover modal -->
<div class="modal fade" id="editCoverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Coverfoto bijwerken</h4>
            </div>
            <div class="modal-body text-center clearfix">
                <div class="col-lg-12">
                    <p>
                        <strong>Opgelet:</strong> Enkel JPG- en PNG-bestanden zijn toegelaten. Dit tot maximum 3MB.
                    </p>
                </div>
                <div class="col-lg-12">
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Selecteer coverfoto</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" type="file" name="files[]">
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit resto photos modal -->
<div class="modal fade" id="editRestoPhotosModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Coverfoto bijwerken</h4>
            </div>
            <div class="modal-body text-justify clearfix">
                <form id="restoFileupload" action="http://playground.restaurantathome.be/api/photo/restaurant/5" method="POST" enctype="multipart/form-data">
                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                    <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                    <div class="row fileupload-buttonbar">
                        <div class="col-lg-12">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn btn-success fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Toevoegen</span>
                                <input type="file" name="files[]" multiple>
                            </span>
                            <button type="submit" class="btn btn-primary start">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>Start upload</span>
                            </button>
                            <button type="reset" class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Annuleren</span>
                            </button>
                            <button type="button" class="btn btn-danger delete">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Verwijderen</span>
                            </button>
                            <input type="checkbox" class="toggle">
                            <!-- The global file processing state -->
                            <span class="fileupload-process"></span>
                        </div>
                        <!-- The global progress state -->
                        <div class="col-lg-5 fileupload-progress fade">
                            <!-- The global progress bar -->
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                            </div>
                            <!-- The extended global progress state -->
                            <div class="progress-extended">&nbsp;</div>
                        </div>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit payments info -->
<div class="modal fade" id="editPaymentsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Betaalmogelijkheden bewerken</h4>
            </div>
            <div class="modal-body text-justify">
                <div class="col-lg-12">
                    <form id="paymentsForm"></form>
                </div>
            </div>

            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="cancel" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                        <button type="submit" class="btn btn-primary btn-lg" id="paymentsFormSubmit">Gegevens opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit social info -->
<div class="modal fade" id="editSocialModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Social media bewerken</h4>
            </div>
            <div class="modal-body text-justify">
                <div class="col-lg-12">
                    <p>
                        Hier kan je overal de link toevoegen naar de sociale media.
                    </p>
                </div>
                <div class="col-lg-12">
                    <form class="form-horizontal" id="SocialForm">
                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="SocialFacebook">Facebook</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="SocialFacebook" name="SocialFacebook" aria-describedby="inputSuccess2Status" placeholder="https://facebook.com/naamRestaurant">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="SocialTwitter">Twitter</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="SocialTwitter" name="SocialTwitter" aria-describedby="inputSuccess2Status" placeholder="https://twitter.com/naamRestaurant">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="SocialInstagram">Instagram</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="SocialInstagram" name="SocialInstagram" aria-describedby="inputSuccess2Status" placeholder="https://instagram.com/naamRestaurant">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="cancel" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                        <button type="submit" class="btn btn-primary btn-lg" id="SocialFormSubmit">Gegevens opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit contact info -->
<div class="modal fade" id="editContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row" id="contactModalLoaderDiv" style="margin: 80px;">
                <span class="fa fa-spinner fa-spin fa-5x fa-fw" style="width: 100%; z-index: 9999;"></span>
            </div>
            <div class="modal-header hidden">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Contactgegevens bewerken</h4>
            </div>
            <div class="modal-body text-justify hidden">
                <div class="col-lg-12">
                    <form class="form-horizontal" id="contactInfoForm">
                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="restoName">
                                Naam
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="restoName" name="restoName" aria-describedby="inputSuccess2Status" required="required" placeholder="Adres">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="restoAddress">
                                Adres
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="restoAddress" name="restoAddress" aria-describedby="inputSuccess2Status" required="required" placeholder="Adres">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="restoPhone">
                                Telefoon
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="restoPhone" name="restoPhone" aria-describedby="inputSuccess2Status" required="required" placeholder="Telefoon">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="restoEmail">
                                E-mail
                                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true" style="color: #a94442; right: 0;"></span>
                            </label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="restoEmail" name="restoEmail" aria-describedby="inputSuccess2Status" required="required" placeholder="E-mail">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="restoWebsite">Website</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="restoWebsite" name="restoWebsite" aria-describedby="inputSuccess2Status" placeholder="Website">
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="restoSpecialty">Specialiteit</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="restoSpecialty" name="restoSpecialty" required="required">
                                    <option></option>
                                </select>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="restoKitchenType">Type keuken</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="restoKitchenType" name="restoKitchenType" required="required">
                                    <option></option>
                                </select>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-3 control-label" style="text-align: left;" for="restoComment">Commentaar</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5" id="restoComment" name="restoComment" tabindex="5" data-fv-field="ProductDescription"></textarea>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer hidden">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <p class="help-block"><span style="color: #a94442; font-weight: bold;">&ast;</span> Verplicht in te vullen</p>
                        <button type="cancel" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                        <button type="submit" class="btn btn-primary btn-lg" id="contactInfoFormSubmit">Gegevens opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit opening hours -->
<div class="modal fade" id="editOpeningHoursModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Openingsuren bewerken</h4>
            </div>
            <div class="modal-body text-justify">
                <div class="col-lg-12">
                    <p>Wanneer uw zaak open is, vult u de openingsuren in bij de juiste dag. Laat u het veld leeg, wordt dit automatisch gezien als een sluitingsdag.</p>
                </div>
                <div>
                    <form class="form-horizontal" id="openingHoursForm">
                        <div class="form-group has-feedback col-lg-6 clearfix">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Ma</label>
                            <div class="col-sm-10">
<!--                                <input type="checkbox" name="openMonday" id="openMonday" class="day_openings">-->
<!--                                <a href="#" class="edit_hours_link" id="changeMonday" title="Openingsuren maandag aanpassen"><span class="fa fa-edit fa-fw vcenter"></span></a>-->
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input id="hoursMonday" type="text" class="form-control text-center" placeholder="11:00-22:00" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback col-lg-6 pull-right">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Vr</label>
                            <div class="col-sm-10">
<!--                                <input type="checkbox" name="openFriday" id="openFriday" class="day_openings">-->
<!--                                <a href="#" class="edit_hours_link" id="changeFriday" title="Openingsuren vrijdag aanpassen"><span class="fa fa-edit fa-fw vcenter"></span></a>-->
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input id="hoursFriday" type="text" class="form-control text-center" placeholder="11:00-22:00" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group has-feedback col-lg-6 clearfix">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Di</label>
                            <div class="col-sm-10">
<!--                                <input type="checkbox" name="openTuesday" id="openTuesday" class="day_openings">-->
<!--                                <a href="#" class="edit_hours_link" id="changeTuesday" title="Openingsuren dinsdag aanpassen"><span class="fa fa-edit fa-fw vcenter"></span></a>-->
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input id="hoursTuesday" type="text" class="form-control text-center" placeholder="11:00-22:00" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback col-lg-6 pull-right">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Za</label>
                            <div class="col-sm-10">
<!--                                <input type="checkbox" name="openSaturday" id="openSaturday" class="day_openings">-->
<!--                                <a href="#" class="edit_hours_link" id="changeSaturday" title="Openingsuren zaterdag aanpassen"><span class="fa fa-edit fa-fw vcenter"></span></a>-->
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input id="hoursSaturday" type="text" class="form-control text-center" placeholder="11:00-22:00" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group has-feedback col-lg-6 clearfix">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Wo</label>
                            <div class="col-sm-10">
<!--                                <input type="checkbox" name="openWednesday" id="openWednesday" class="day_openings">-->
<!--                                <a href="#" class="edit_hours_link" id="changeWednesday" title="Openingsuren woensdag aanpassen"><span class="fa fa-edit fa-fw vcenter"></span></a>-->
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input id="hoursWednesday" type="text" class="form-control text-center" placeholder="11:00-22:00" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback col-lg-6 pull-right">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Zo</label>
                            <div class="col-sm-10">
<!--                                <input type="checkbox" name="openSunday" id="openSunday" class="day_openings">-->
<!--                                <a href="#" class="edit_hours_link" id="changeSunday" title="Openingsuren zondag aanpassen"><span class="fa fa-edit fa-fw vcenter"></span></a>-->
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input id="hoursSunday" type="text" class="form-control text-center" placeholder="11:00-22:00" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group has-feedback col-lg-6 clearfix">
                            <label class="col-sm-2 control-label" style="text-align: left;" for="inputSuccess2">Do</label>
                            <div class="col-sm-10">
<!--                                <input type="checkbox" name="openThursday" id="openThursday" class="day_openings">-->
<!--                                <a href="#" class="edit_hours_link" id="changeThursday" title="Openingsuren donderdag aanpassen"><span class="fa fa-edit fa-fw vcenter"></span></a>-->
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input id="hoursThursday" type="text" class="form-control text-center" placeholder="11:00-22:00" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="cancel" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                        <button type="submit" class="btn btn-primary btn-lg" id="openingHoursFormSubmit">Gegevens opslaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Maps Modal -->
<div class="modal fade" id="mapsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Locatie</h3>
            </div>
            <div class="modal-body clearfix" style="padding-top: 0;">
                <div id="mapCanvas" style="height: 500px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>