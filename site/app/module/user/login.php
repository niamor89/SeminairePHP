<?php

	//Do not display the view, let's do some checks before
	$request_display = 0;

	//Check if someone tried to log in
	if (isset($_SESSION['pseudo'])) {
		
		//Insert magic here, like starting sessions and shit
		
		//Lets admit someone suscessfully logged in. Create false credentials and call the view "logout"
		$context["successful_login"] = 1;
		$context["user_pseudo"] = $_SESSION['pseudo'];
	
	} else {
	
		//No data from the login view's form. So tell our view that we want it to be displayed.
		$request_display = 1;
	
	}

?>