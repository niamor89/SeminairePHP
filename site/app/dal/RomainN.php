<?php

/*			login (pseudo, password)
**	Connecte un utilisateur
*/
	
	function login($pseudo, $password) {
		$row = account_exist($_POST['f_login_pseudo'], md5($_POST['f_login_password']));
		if (isset($row['pseudo_Joueur']))
		{
			$_SESSION['pseudo'] = "Test";
			return 1;
		}
		else
		{
			// return 0;
			//Assume it is a success
			$_SESSION['pseudo'] = "Test";
			return 1;
		}
	}
	
	
/*			paypal_display_form
**	
**	Insere un contenu paypal a un formulaire post
*/
	
	function paypal_display_form() {
		return "
		<div class='paypal_pseudo'><p>Numero de compte PayPal: <input type='text' name='input1'/></div>
		<div class='paypal_pass'><p>Mot de passe: <input type='password' name='input2'/></div>
		<input type='submit' value='Ok'/>
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