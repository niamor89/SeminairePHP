<?php
	
	$context["title"] = "Boutique des buffs";
	$display_shop_get = 0;
	
	/*	Insert code for checking user authentication here.
	**	output required:
	**		$successful_login = 1
	*/
	$successful_login = check_if_connected();
	
	/*	Insert code for checking administration privileges here
	**	output required:
	**		$is_admin = 1
	*/
	
	$is_admin = check_if_admin();
	
	if($successful_login == 1) {
		//Show the requested view.

			//No action asked, display the "get" view
			$display_shop_get = 1;
			
			//Generate the list
			
			$shop_get_bufflist = GetArray('SELECT id_Produit,nom_Produit,prix_Produit FROM T_Produit WHERE in_Game = 2 ');
			
			// $shop_get_bufflist = array(
				// array("image5.gif","400","buff1"),
				// array("image6.gif","530","buff2"),
				// array("image7.gif","600","buff3"),
				// array("image8.gif","900","buff4")
			// );
	} else {
	
		header("Location: /website/index");
		
	}

?>