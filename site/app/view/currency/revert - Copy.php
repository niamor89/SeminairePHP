	
	<p><b>View currency/revert</b></p>

	<?php if ($display_currency_revert_form == 1) { ?>
		<form method="post" action "/currency/revert" >
			Montant de SC a convertir: <input type="text" name="f_currency_revert_amount_of_sc"/>
			<input type="hidden" name="paypal_validate" value="1"/>
			<button id="currency_continue_button" type="button">Continuer</button>
			<div id="paypal_form">
				<img src="/assets/img/paypal_logo.png"/>
				<br/>Compte Paypal: <input type="text" name="PAYPAL_text1" />
				<br/>Mot de passe: <input type="password" name="PAYPAL_text2" />
				<br/><button type="submit" name="currency_revert_formsubmit" >Ok</button>
			</div>
		</form>
		
		<script language="javascript">
		
		var amountDiv = document.getElementById("currency_get_calculated_amount");
		var survivalCoinsDiv = document.getElementById("currency_get_survival_coins");
		var paypalDiv = document.getElementById("paypal_form");
		var continueButton = document.getElementById("currency_continue_button");
		
		survivalCoinsDiv.addEventListener("keyup", calculateAmount, false);
		continueButton.addEventListener("click", showPaypal, false);
		
		function calculateAmount(){
			var calc = survivalCoinsDiv.value * 5;
			amountDiv.innerHTML = "<p>" + calc + "</p>";
		}
		
		function showPaypal() {
			paypalDiv.style.display = "inline";
		}
		
		function hidePaypal() {
			paypalDiv.style.display = "none";
		}
		
	</script>
		
		
	<?php } ?>

	<?php if ($display_currency_revert_success == 1) { ?>
		<p>Conversion reussie. Vous avez gagne <?php echo $money_earned ?></p>
	<?php } ?>
	
	<?php if ($display_currency_revert_failure == 1) { ?>
		<p>Conversion echouee</p>
	<?php } ?>		