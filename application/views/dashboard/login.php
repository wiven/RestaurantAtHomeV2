<?php
    /**
     * Restaurant At Home
     *
     * Login page for restaurants
     *
     * @package	RestaurantAtHome
     * @author	A collaboration of: WiVen Web Solutions - IneTh - Shout!
     * @copyright	Copyright (c) 2014 - 2015
     * @copyright
     * @license	*
     * @link	http://restaurantathome.be
     * @since	Version 1.0.0
     */
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Inloggen aub</h3>
                    </div>
                    <div class="panel-body">
                        <!--<div class="social-buttons clearfix">
                            <a href="#" id="fb_login_btn" class="btn btn-fb btn-block" onclick="fb_login();"><i class="fa fa-facebook"></i> Facebook</a>
                        </div>
                        <span style="margin: 15px 0 15px;display: block;">OF</span>-->
                        <form class="form" role="form" method="post" action="/dashboard/login" accept-charset="UTF-8" id="dashboard_login">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">E-mail</label>
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword2">Paswoord</label>
                                <input class="form-control" placeholder="Paswoord" name="password" type="password" value=""><div class="progress"><div class="progress-bar"><span class="password-verdict"></span></div></div>
                                <div class="help-block text-right"><a href="<?php echo base_url(); ?>user/passwordrecovery">Paswoord vergeten?</a>
                                </div>
                            </div>
                            <div class="form-group hidden" id="login_danger">
                                <div class="alert alert-danger text-center" role="alert">Ongeldige email of ongeldig paswoord</div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Log in" />
                            </div>
                            <!--<div class="checkbox">
                                <label>
                                    <input type="checkbox"> Hou me ingelogd
                                </label>
                            </div>-->
                        </form>

                        <div class="bottom text-center">
                            Nieuw hier? <a href="<?php echo base_url(); ?>register"><b>Registreer nu</b></a>
                        </div>
                        <div id="fb-root"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>