<p><b>View currency/buy</b></p>

<?php if ($display_currency_buy_success == 1) { ?>
	<p>Achat reussi</p>
<?php } ?>

<?php if ($display_currency_buy_failure == 1) { ?>
	<p>Achat echoue</p>
<?php } ?>

<?php if ($display_currency_buy_paypalform) {
	echo paypal_display_form("/currency/buy&id=".$id_pack_to_buy);
} ?>