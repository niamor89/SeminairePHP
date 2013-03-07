<?php

	$context["title"] = "Acheter un pack";
	$display_currency_buy_success = 0;
	$display_currency_buy_failure = 0;
	$display_currency_buy_paypalform = 0;
	
	/*	Insert code for checking user authentication here.
	**	output required:
	**		$successful_login = 0 or 1
	*/
	
	//Assume we logged in
	$successful_login = 1;
	
	if($successful_login && isset($_GET["id"])) {
	
		$id_pack_to_buy = $_GET["id"];
		
		//Check if we want to display the form of paypal or use it
		if(isset($_POST["salestate"])) {
			
			//Form paypal submited, let's give our client a pack and take his precious SC!
			
			
			/*	Insert code to buy a pack
			**	provided input:
			**		$id_pack_to_buy
			**	required output:
			**		$currency_buy_success = 0 or 1
			*/
			
			//Assume it worked
			$currency_buy_success = 1;
			$display_currency_buy_success = $currency_buy_success;
			
		} else {
		
			//Form paypal not submited, so show it
			$display_currency_buy_paypalform = 1;

			}
		
		} else{
			
			if(!isset($_GET["id"])){
			$error_message = "Identifiant de la transaction non trouve";
			/*	Error message here
			**	provided input:
			**		$error_message
			*/
			echo $error_message;
			
		}
		
	}
	
?>