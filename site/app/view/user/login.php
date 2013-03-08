<?php if ($display_login_form == 1) { ?>
	<div id="connection_title">
		CONNEXION
	</div>
	<form method="post" action="#">
		<div id ="connection_top">
			<input type="text" name="f_login_pseudo" value="Login"/>
			<input type="password" name="f_login_password" value="Password"/>
		</div>
		<div id ="connection_bottom">
			<input type="submit" name="f_login_submit" value="Envoyer" />
		</div>
	</form>
	<?php if ($display_login_error == 1) { ?>
		<div id="login_fail_error_msg">
			Erreur de login ou de mot de passe
		</div>
	<?php } ?>
<?php } ?>