<?php

	$display_logout_confirm = 0;
	$display_logout_infos = 0;
	
	if(isset($_GET["logoutconfirm"])) {
		unset($_SESSION["pseudo"]);
		unset($_SESSION["id_user"]);
		$display_logout_confirm = 1;
	} else {
		$display_logout_infos = 1;
	}
	
?>