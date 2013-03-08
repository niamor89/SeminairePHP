<?php if ($display_currency_revert_form == 1) { ?>

	<p><a href="/currency/get">Achat de SC</a> - </b>Conversion de SC</b></p>
		<form method="post" action="/currency/revert">
			Montant de SC a rendre: <input type="text" id="currency_revert_survival_coins" name="f_currency_revert_survival_coins"/>
			<br/>Vous allez recuperer: <span id="currency_revert_calculated_amount"></span>
			<br/><button id="currency_continue_button" type="button">Continuer</button>
			<div id="paypal_form">
				<img src="/assets/img/paypal_logo.png"/>
				<br/>Compte Paypal: <input type="text" name="PAYPAL_text1" />
				<br/>Mot de passe: <input type="password" name="PAYPAL_text2" />
				<br/><button type="submit" name="f_currency_revert_submit" >Ok</button>
			</div>
		</form>
	</table>
	
	<script language="javascript">
		
		var amountDiv = document.getElementById("currency_revert_calculated_amount");
		var survivalCoinsDiv = document.getElementById("currency_revert_survival_coins");
		var paypalDiv = document.getElementById("paypal_form");
		var continueButton = document.getElementById("currency_continue_button");
		
		survivalCoinsDiv.addEventListener("keyup", calculateAmount, false);
		continueButton.addEventListener("click", showPaypal, false);
		
		function calculateAmount(){
			var calc = survivalCoinsDiv.value / 5;
			amountDiv.innerHTML = calc + " &#8364;";
		}
		
		function showPaypal() {
			paypalDiv.style.display = "inline";
		}
		
		function hidePaypal() {
			paypalDiv.style.display = "none";
		}
		
	</script>
	
	
<?php } ?>

<?php if ($display_currency_revert_fail == 1) { ?>
	<p>Conversion de vos SC echouee</p>
<?php } ?>

<?php if ($display_currency_revert_success == 1) { ?>
	<p>Conversion de vos SC effectuee</p>
<?php } ?>
