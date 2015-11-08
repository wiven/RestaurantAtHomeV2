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

    <h2 class="payed">Betaling voltooid!</h2>
    <h2 class="pending hidden">Bestelling voltooid!</h2>

    <div class="text-center">
        <span class="fa fa-check-circle-o fa-5x"></span>
        <span class="fa fa-cutlery fa-5x" style="margin-left: 20px;"></span>
    </div>
    <br><br>
    <h4 class="payed">We hebben u betaling ontvangen.</h4>
    <h4 id="readyMessage"></h4>
    <h4 id="awaitingPayment"></h4>

    <p>
        Uw bestelling:
    </p>

    <ul id="orderDetails">
    </ul>


    <h3>
        Smakelijk!
    </h3>
    <p style="margin-bottom: 175px;">
        Het <em>RestaurantAtHome</em>-team
    </p>
</div>

<?php //EOF  -'It all ends here'-   ?>
    
