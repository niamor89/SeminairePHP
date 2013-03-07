<?php
	
	$context["title"] = "Ajouter un pack";

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
	$user_pseudo = "Pseudo(currency/add)";
	$is_admin = 1;
	
	//Elements from the view to display:
	$display_currency_add_form = 0;
	$display_currency_add_success = 0;
	$display_currency_add_fail = 0;
	
	//Determine the action: show the form or do an add
	if(isset($_POST["f_currency_add_pack_submit"])) {
		
		//Do an add of a pack
		
		/*	Form of currency/add view submited
		**	input provided:
		**		$_POST["f_currency_add_pack_id"]
		**		$_POST["f_currency_add_pack_image"]
		**		$_POST["f_currency_add_pack_price"]
		**		$_POST["f_currency_add_pack_name"]
		**	output required:
		**		$currency_add_success = 0 or 1
		*/
		
		//Assume it is a success
		$currency_add_success = 1;
		
		//Display success or fail
		if($currency_add_success == 1 )
			$display_currency_add_success = 1;
		if($currency_add_success == 0 )
			$display_currency_add_fail = 1;
	
	} else {
		
		//Display the view with the form
		$display_currency_add_form = 1;
		
	}
	
?>