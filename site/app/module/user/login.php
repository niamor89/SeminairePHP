<?php

	//Do not display the view, let's do some checks before
	$display_login_form = 0;
	$display_login_error = 0;

	//Check if error or not
	if(!isset($_SESSION["id_user"]) && isset($_POST["f_login_submit"])) {
		if(login($_POST["f_login_pseudo"],$_POST["f_login_password"]) == 1) {
			echo render_action("user/logout");
		} else {
			$display_login_form = 1;
			$display_login_error = 1;
		}
	}else if(!isset($_SESSION["id_user"]) && !isset($_POST["f_login_submit"])) {
		$display_login_form = 1;
	}else if(isset($_SESSION["id_user"])) {
		echo render_action("user/logout");
	}else{
		$display_login_form = 1;
	}

?>