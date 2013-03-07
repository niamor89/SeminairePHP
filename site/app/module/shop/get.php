<?php
	
	$context["title"] = "Boutique en ligne";
	$display_shop_get = 0;
	
	/*	Insert code for checking user authentication here.
	**	output required:
	**		$successful_login
	*/
	
	/*	Insert code for checking administration privileges here
	**	output required:
	**		$is_admin = 1
	*/
	
	//Assume current user is logged in.
	$successful_login = 1;
	//Assume we are admins
	$is_admin = 1;
	
	if($successful_login == 1) {
		//Show the requested view.
		if (!isset($_POST["shop_action"])) {
		
			//No action asked, display the "get" view
			$display_shop_get = 1;
			
			//And give it some content (need to be json-ed)
			$shop_get_itemlist = array(
				array("image1.gif","120","objet1"),
				array("image2.gif","350","objet2"),
				array("image3.gif","200","objet3"),
				array("image4.gif","800","objet4")
			);
			
			$shop_get_bufflist = array(
				array("image5.gif","400","buff1"),
				array("image6.gif","530","buff2"),
				array("image7.gif","600","buff3"),
				array("image8.gif","900","buff4")
			);
			
		} else {
		
			//A special view has been asked
			header("Location: /shop/".$_POST["shop_action"]);
			
		}
	}
	

?>