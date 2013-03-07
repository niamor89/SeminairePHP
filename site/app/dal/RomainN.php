<?php

/*			OLDpaypal_display_form
**	
**	Genere un formulaire comprenant des champs a renseigner. Renvoie sur la page
**	indiquee par $url. Cette page aura acces à la variable POST "salestate"
**	qui vaudra 1 afin de simuler la validation de paypal.
**
**	$url (string):
**		Chaine indiquant l'url où paypal redirige (ex: /currency/buy)
*/

	function OLDpaypal_display_form ($url) {
		return "
			<form method='POST' action='".$url."'>
				<input type='hidden' name='salestate' value='1'/>
				<div class='paypal_text'><p>Numero de compte PayPal: <input type='text' name='input1'/></div>
				<div class='paypal_pass'><p>Mot de passe: <input type='password' name='input2'/></div>
				<input type='submit' value='Ok'/>
			</form>
		";
	}
	
	
/*			paypal_display_form
**	
**	Insere un contenu paypal a un formulaire post
*/
	
	function paypal_display_form() {
		return "
		<div class='paypal_pseudo'><p>Numero de compte PayPal: <input type='text' name='input1'/></div>
		<div class='paypal_pass'><p>Mot de passe: <input type='password' name='input2'/></div>
		";
	}
	
	
/*			paypal_validate_form
**	
**	Valide un formulaire paypal
*/	
	
	function paypal_validate_form() {
		return;
	}
	
	
/*			throw_error ($error_message, $url)
**	
**	Renvoie sur une url et y affiche un message d'erreur
**
**	$url (string):
**		Chaine indiquant l'url où on redirige (ex: /currency/buy)
**	$error_message (string):
**		Chaine du message d'erreur
*/

	function throw_error($error_message, $url) {
		return;
	}

?>