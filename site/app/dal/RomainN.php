<?php

/*			login (pseudo, password)
**	Connecte un utilisateur
*/
	
	function login($pseudo, $password) {
		$row = account_exist($_POST['f_login_pseudo'], md5($_POST['f_login_password']));
		if (isset($row['pseudo_Joueur']))
		{
			$_SESSION['pseudo'] = $row["pseudo_Joueur"];
			$_SESSION['id_user'] = $row["id_Joueur"];
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	
	function check_if_connected() {
		return isset($_SESSION["id_user"]);
	}
	
	function check_if_admin() {
		if(check_if_connected()) {
			
			$row = GetRow('SELECT is_admin FROM T_Joueur WHERE id_Joueur = '.$_SESSION["id_user"].';');
			if ($row["is_admin"] == 1) return 1;
			
		} else {
			return 0;
		}
		
		return 0;
		
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
**		Chaine indiquant l'url o� on redirige (ex: /currency/buy)
**	$error_message (string):
**		Chaine du message d'erreur
*/

	function throw_error($error_message, $url) {
		return;
	}

?>