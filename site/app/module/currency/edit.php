<?php

	$context["title"] = "Editer un pack";

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
	$user_pseudo = "Pseudo(currency/edit)";
	$is_admin = 1;
	
	//Elements from the view to display:
	$display_currency_edit_form = 0;
	$display_currency_edit_success = 0;
	$display_currency_edit_fail = 0;
	
	//Determine the action: show the form edit or do an edit
	if(isset($_POST["f_currency_edit_pack_submit"])) {
		
		//Do an edit of a pack
		
		/*	Form of currency/edit view submited
		**	input provided:
		**		$_POST["f_currency_edit_pack_id"]
		**		$_POST["f_currency_edit_pack_image"]
		**		$_POST["f_currency_edit_pack_price"]
		**		$_POST["f_currency_edit_pack_name"]
		**	output required:
		**		$currency_edit_success = 0 or 1
		*/
		
		//Assume it is a success
		$currency_edit_success = 1;
		
		if($currency_edit_success == 1 )
			$display_currency_edit_success = 1;
		if($currency_edit_success == 0 )
			$display_currency_edit_fail = 1;
	
	} else {
		
		//Display the view with the form
		$display_currency_edit_form = 1;
		
		//Generate some content
		if(isset($_GET["id"])) {
		
			/*	Generate content for the view here
			**	output required:
			**		$currency_edit_id = 	1;
			**		$currency_edit_image = 	"image1.gif";
			**		$currency_edit_price = 	"100";
			**		$currency_edit_name = 	"Pack newbee";
			*/
			
			//Hardcoded values fro debugging purposes:
			$currency_edit_id = 	1;
			$currency_edit_image = 	"image1.gif";
			$currency_edit_price = 	"100";
			$currency_edit_name = 	"Pack newbee";
			
		} else {
			//No id passed to that action, let's send a beautiful error
			$error_message = "Aucun identifiant de pack recu sur la page";
			
			/*	Error: no id in the $_GET variable
			**	input provided:
			**		$error_message
			*/
			
			//Custom display for debugging purposes:
			echo $error_message;
		}
		
	}
	
		
	
	
?>




