<?php

	//Setup the rules to know if somone is already logged in. ie $cond = isset($context["login_id"]);
	$cond = (isset($_SESSION["pseudo"]));
	
	if ($cond) {
		//User is logged in, so we call the view "logout" as the content of the div
		echo render_action("user/logout");
	} else {
		//Current user is not logged in, so call the view "login" as the content of the div
		echo render_action("user/login");
	}

?>