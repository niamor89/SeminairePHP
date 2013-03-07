<?php

	$context["title"] = "Convertir en argent reel";
	$display_currency_revert_success = 0;
	$display_currency_revert_failure = 0;
	$display_currency_revert_form = 0;
	
	/*	Insert code for checking user authentication here.
	**	output required:
	**		$successful_login = 0 or 1
	*/
	
	//Assume we logged in
	$successful_login = 1;
	
	if($successful_login) {

		//Choose wether to show the form or parse it
		
		if(isset($_POST["currency_revert_formsubmit"])) {
			
			//Form submitted
			
			if(isset($_POST["paypal_validate"])) {
				
				//Paypal is ok
				
				/*	Insert code to give money back in exchange for SCs
				**	provided input:
				**		$_POST["f_currency_revert_amount_of_sc"]
				**	required output:
				**		$money_eraned;
				**		$currency_revert_success;
				*/
				
				//Assume it worked:
				$money_earned = "25€";
				$currency_revert_success = 1;
				
				//Display success or failure
				if($currency_revert_success == 0) {
					$display_currency_revert_failure = 1;
				}else{
					$display_currency_revert_success = 1;
				}
			
			}
			
		} else {
		
			//Form not submitted
			$display_currency_revert_form = 1;
			
		}
	
	}
	
?>