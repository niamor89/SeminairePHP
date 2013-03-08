<?php if ($request_display == 1) { ?>

	<div id="connection_title">
		CONNEXION
	</div>
	<form method="post" action="connect">
		<div id ="connection_top">
			<input type="text" name="f_login_pseudo" value="Login"/>
			<input type="password" name="f_login_password" value="Password"/>
		</div>
		<div id ="connection_bottom">
			<input type="submit" value="Envoyer" />
		</div>

	</form>
<?php } ?>