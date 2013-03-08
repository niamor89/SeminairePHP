<?php

	//Do not display the view, let's do some checks before
	$display_login_form = 0;
	$display_login_fail = 0;

	//Check if someone is trying to log in
	if(isset($context["connection_attempt"])) {
			$_SESSION["pseudo"] = "Test";
	}else{
		$display_login_form = 1;
	}

?>