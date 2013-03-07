<?php
	
	$context["title"] = "Supprimer un pack";
	$display_currency_delete_success = 0;
	$display_currency_delete_fail = 0;
	
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
	$user_pseudo = "Pseudo(currency/delete)";
	$is_admin = 1;
	
	if ($is_admin && $successful_login && isset($_GET["id"])) {
		
		//Try to delete
		
		/*	Insert code to delete the pack here
		**	provided input:
		**		$_GET["id"]
		**	required output:
		**		$successful_delete = 0 or 1
		*/
		
		//Assume deletion:
		$successful_delete = 1;
		
		if($successful_delete == 1){
			// header('Location: /currency/get');
			$display_currency_delete_success = 1;
		}else{
			$display_currency_delete_fail = 1;
		}
			
	} else {
		
		//Parameter error: not logged in/ admin / $_GET["id"]
		$display_currency_delete_fail = 1;	
		
	}

	
?>