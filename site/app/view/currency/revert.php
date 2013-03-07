	
	<p><b>View currency/revert</b></p>

	<script>
		$(document).ready(function(){
			console.log("ready");
			
		});
	</script>

	<?php if ($display_currency_revert_form == 1) { ?>
		<form method="post" action "/currency/revert" >
			Montant de SC a convertir: <input type="text" name="f_currency_revert_amount_of_sc"/>
			<input type="hidden" name="paypal_validate" value="1"/>
			<input type="submit" name="currency_revert_formsubmit"/>
		</form>
	<?php } ?>

	<?php if ($display_currency_revert_success == 1) { ?>
		<p>Conversion reussie. Vous avez gagne <?php echo $money_earned ?></p>
	<?php } ?>
	
	<?php if ($display_currency_revert_failure == 1) { ?>
		<p>Conversion echouee</p>
	<?php } ?>		