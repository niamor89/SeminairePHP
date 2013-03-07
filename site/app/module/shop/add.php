<?php
	
	$context["title"] = "Ajouter un objet/buff";

	/*	Insert code for checking user authentication here.
	**	output required:
	**		$successful_login = 1
	**		$user_pseudo
	*/
	
	/*	Insert code for checking administration privileges here
	**	output required:
	**		$is_admin = 1
	*/
	
	//Assume we are ok
	$successful_login = 1;
	$user_pseudo = "Pseudo(shop/add)";
	$is_admin = 1;
	
	//Elements from the view to display:
	$display_shop_add_form = 0;
	$display_shop_add_success = 0;
	$display_shop_add_fail = 0;
	
	//Whoose what to do: display the for or parse it
	
	if($is_admin && $successful_login) {
	
		if(isset($_POST["f_shop_add_submit"])) {
		
			//Form submited
			
			/*	Insert code to add a new item or buff in the shop
			**	provided input:
			**		$_POST["f_shop_add_type"] = "item" or "buff"
			**		$_POST["f_shop_add_name"]
			**		$_POST["f_shop_add_price"]
			**		$_POST["f_shop_add_image"]
			**	required output:
			**		$shop_add_success = 0 or 1
			*/
			
			//Assume it is a success
			$shop_add_success = 1;
			
			//Display success or fail
			if($shop_add_success == 1){
				$display_shop_add_success = 1;
			}else{
				$display_shop_add_fail = 1;
			}
			
		} else {
		
			//Form not submitted, display it
			$display_shop_add_form = 1;
			
		}
	
	}
	
?>