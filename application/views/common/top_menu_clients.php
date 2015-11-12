<?php /** * Restaurant At Home * * This file contains: * - The top menu * * @package RestoAtHome * @author A collaboration of: WiVen Web Solutions - IneTh - Shout! * @copyright Copyright (c) 2014 - 2015 * @copyright * @license * * @link http://restaurantathome.be * @since Version 1.0.0 */ defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>

<div class="container-fluid">

	<!-- Header desktop -->

	<header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="modal" data-target=".login-modal" data-backdrop="static" aria-expanded="false">
						<span class="sr-only">Menu</span>
						<i class="fa fa-user fa-2x"></i>
					</button>
					<a class="navbar-brand" href="<?php echo base_url(); ?>">
						<img alt="Brand" src="<?php echo public_url(); ?>img/logo_big.png" width="250px">
					</a>
				</div>

				<div id="searchbox-detail" class="form-group has-feedback col-lg-4 col-md-3 col-sm-6 clearfix" style="visibility: hidden;">
					<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
					<input type="search" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" placeholder="Zoeken ...">
					<span id="inputSuccess2Status" class="sr-only">(search)</span>
				</div>

				<div class="collapse navbar-collapse" id="header-menu">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="/login" class="loginLink">Login / registreer</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<?php //EOF - 'It all ends here'- ?>
