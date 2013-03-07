<?php
	
	$context["title"] = "Boutique Survival Coins";
	$display_currency_get = 0;
	
	/*	Insert code for checking user authentication here.
	**	output required:
	**		$successful_login
	*/
	
	//Assume current user is logged in.
	$successful_login = 1;
	
	if($successful_login == 1) {
		//Show the requested view.
		if (!isset($_POST["currency_action"])) {
		
			//No action asked, display the "get" view
			$display_currency_get = 1;
			
			//Assume an admin is online
			$is_admin = 1;
			
			//And give it some content (need to be json-ed)
			$currency_get_contentlist = array(
				array("image1.gif","100","Pack newbee"),
				array("image2.gif","500","Pack boloss"),
				array("image3.gif","1000","Pack normal"),
				array("image4.gif","3000","Pack pigeon")
			);
			
		} else {
		
			//A special view has been asked
			echo render_action("currency/".$_POST["currency_action"]);
			
		}
	}
	

?>