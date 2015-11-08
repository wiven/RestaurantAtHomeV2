<?php
/**
 * Restaurant At Home
 *
 * This file contains:
 * - The top menu
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

<div class="admin">
	<div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
	  <a class="navmenu-brand" href="#">Restaurant At Home</a>
	  <ul class="nav navmenu-nav">
		<li><a href="<?php echo admin_url(); ?>">&nbsp;&nbsp;Overzicht</a></li>

		<li><a href="<?php echo admin_url(); ?>profile"><i class="fa fa-user"></i>&nbsp;&nbsp;Profiel</a></li>

		<li class="active"><a href="<?php echo admin_url(); ?>myrecipes"><i class="fa fa-cutlery"></i>&nbsp;&nbsp;Mijn Gerechten</a></li>

	  </ul>
	  <ul class="nav navmenu-nav">
		  <li style="height: 10px; margin-left: 10px; margin-right:10px;   border-top:1px solid #E7E7E7;"></li>
		<li><a href="<?php echo admin_url(); ?>orders"><i class="fa fa-bars"></i>&nbsp;&nbsp;Bestellingen</a></li>
		<li><a href="<?php echo admin_url(); ?>slotedit"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Slots beheren</a></li>
		<li><a href="<?php echo admin_url(); ?>actions"><i class="fa fa-fire"></i>&nbsp;&nbsp;Acties</a></li>
	  </ul>
	<ul class="nav navmenu-nav">
		<li style="height: 10px; margin-left: 10px; margin-right:10px;   border-top:1px solid #E7E7E7;"></li>
		<li><a href="<?php echo base_url(); ?>contact"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;Contact</a></li>
	  </ul>
	</div>
</div><!--/admin -->

<div class="container-fluid admin" style="padding:0px">

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>


			<div class="navbar-header" style="margin-left:50px;">
				<a class="navbar-brand" href="#" style="padding:7px;">
					<img alt="Restaurant at Home" src="<?php echo public_url() ; ?>/img/logo_small.png" height="35px">
				</a>
				<p class="navbar-text">Ingelogd als  Mark Otto</p>
			</div>




			<div class="nav navbar-form navbar-right">
				<div class="btn btn-success">Uitloggen</div>
				<!--<li class="active"><a href="#">Menu's & Gerechten <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Link</a></li>-->
			</div>


		</div>
	</nav>
	<div style='width:100%;min-height:50px;'><!--this is just a content pusher--></div>


<?php //EOF  -'It all ends here'-   ?>
