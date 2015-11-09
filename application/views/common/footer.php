<?php /** * Restaurant At Home * * This file contains: * - The footer tags and main js * * @package RestoAtHome * @author A collaboration of: WiVen Web Solutions - IneTh - Shout! * @copyright Copyright (c) 2014 - 2015 * @copyright * @license * * @link http://restaurantathome.be * @since Version 1.0.0 */ defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>
</div>
<!-- close container fluid -->
</div>
<!-- end wrap -->

<footer class="footer">
	<div class="container">
		<p class="pull-left">
			&COPY; Restaurant At Home &mdash;
			<a href="<?php echo base_url(); ?>contact">Contact</a> &mdash;
			<a href="<?php echo base_url(); ?>privacy">Privacy Charter</a>
		</p>
		<p class="pull-right" id="lang-choice">
			<a href="<?php echo 'http://nl.'.(isset($current_url) ? $current_url : ''); ?>" title="Nederlands">NL</a> &mdash;
			<a href="<?php echo 'http://fr.'.(isset($current_url) ? $current_url : ''); ?>" title="Fran&ccedil;ais">FR</a> &mdash;
			<a href="<?php echo 'http://en.'.(isset($current_url) ? $current_url : ''); ?>" title="English">EN</a>
		</p>
		<!--<p class="pull-right" id="lang-choice">
			<a href="<?php /*echo 'http://nl.'.$current_url; */?>" title="Nederlands - België"><img src="<?php /*echo public_url(); */?>img/flags/4x3/be.svg" width="24" alt="Nederlands - België"></a> &mdash;
			<a href="<?php /*echo 'http://fr.'.$current_url; */?>" title="Frans - België"><img src="<?php /*echo public_url(); */?>img/flags/4x3/be.svg" width="24" alt="Frans - België"></a>
			<a href="<?php /*echo 'http://en.'.$current_url; */?>" title="Nederlands - Nederland"><img src="<?php /*echo public_url(); */?>img/flags/4x3/nl.svg" width="24" alt="Nederlands - Nederland"></a>
			<a href="#" title="Frans - Frankrijk"><img src="<?php /*echo public_url(); */?>img/flags/4x3/fr.svg" width="24" alt="Frans - Frankrijk"></a>
		</p>-->
	</div>
</footer>

<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="border: 0; padding: 15px 15px 0 15px">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Login via</h4>
			</div>
			<div class="modal-body">
				<div class="social-buttons clearfix">
					<a href="#" class="btn btn-fb col-xs-5"><i class="fa fa-facebook"></i> Facebook</a>
					<a href="#" class="btn btn-tw col-xs-5 col-xs-offset-2"><i class="fa fa-twitter"></i> Twitter</a>
				</div>
				<span style="margin: 15px 0 15px;display: block;">OF</span>
				<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
					<div class="form-group">
						<label class="sr-only" for="exampleInputEmail2">E-mail</label>
						<input type="email" class="form-control" id="exampleInputEmail2" placeholder="E-mail" required>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputPassword2">Paswoord</label>
						<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Paswoord" required>
						<div class="help-block text-right"><a href="<?php echo base_url(); ?>user/passwordrecovery">Paswoord vergeten?</a>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Log in</button>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> Hou me ingelogd
						</label>
					</div>
				</form>

				<div class="bottom text-center">
					Nieuw hier? <a href="<?php echo base_url(); ?>register"><b>Registreer nu</b></a>
				</div>

			</div>
		</div>
	</div>
</div>

<script src="<?php echo public_url(); ?>js/jquery-1.11.3.js"></script>
<script src="<?php echo public_url(); ?>js/bootstrap-3.3.2.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-backstretch-2.0.4.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-placeholder.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-password-check.js"></script>
<script src="<?php echo public_url(); ?>js/base64.js"></script>
<script src="<?php echo public_url(); ?>js/cookie.js"></script>
<script src="<?php echo public_url(); ?>js/jquery.cookiebar.js"></script>
<script src="<?php echo public_url(); ?>js/script.js"></script>

<?php echo (isset($additional_scripts) ? $additional_scripts : '') ?>
</body>

</html>

<?php //EOF - 'It all ends here'- ?>
