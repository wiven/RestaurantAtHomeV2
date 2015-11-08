<?php /** * Restaurant At Home * * * This file contains: * - Header tags with css and pre-js * * @package RestoAtHome * @author A collaboration of: WiVen Web Solutions - IneTh - Shout! * @copyright Copyright (c) 2014 - 2015 * @copyright * @link http://restaurantathome.be * @since Version 1.0.0 */ defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>
<!DOCTYPE html>
<html class="no-js" lang="nl">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<title>Restaurant At Home <?php echo (isset($page_title) ? $page_title : '') ?>
	</title>

	<meta name="description" content="" />
	<meta name="theme-color" content="#3F81B5" />

	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="1 days" />

	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">

	<link rel="shortcut icon" href="http://restaurantathome.be/assets/img/favicon.ico">

	<meta property="og:title" content="Restaurant at home" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://restaurantathome.be/" />
	<meta property="og:image" content="http://restaurantathome.be/img/logo-marginaalst-facebook.jpg" />

	<meta name="twitter:card" content="Restaurant at home">
	<meta name="twitter:site" content="http://restaurantathome.be/">
	<meta name="twitter:creator" content="@Restaurant at home">
	<meta name="twitter:title" content="Restaurant at home">
	<meta name="twitter:description" content="">
	<meta name="twitter:image" content="http://restaurantathome.be/img/logo-marginaalst.jpg">

	<?php echo (isset($additional_styles) ? $additional_styles : '') ?>
	<link rel="stylesheet" href="<?php echo public_url(); ?>css/font-awesome-4.3.0.css">
	<link rel="stylesheet" href="<?php echo public_url(); ?>css/jquery.cookiebar.css">
	<link rel="stylesheet" href="<?php echo public_url(); ?>css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo public_url(); ?>css/restaurant-at-home-theme.css">
	</script>

	<script src="<?php echo public_url(); ?>js/modernizr.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div id="wrap">
		<?php //EOF - 'It all ends here'- ?>
