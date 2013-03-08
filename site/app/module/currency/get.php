<?php
	
	$context["title"] = "Boutique Survival Coins";
	$display_currency_get_form = 0;
	$display_currency_get_success = 0;
	$display_currency_get_fail = 0;
	
	/*	Insert code for checking user authentication here.
	**	output required:
	**		$successful_login
	*/
	
	//Assume current user is logged in.
	$successful_login = check_if_connected();
	
	if ($successful_login){
		
		if(isset($_POST["f_currency_get_submit"])) {
		
			//We suppose the paypal fields have been validated by Paypal 
			
			//Create a command history
			InsertTable('t_achat_sc',array('T_Joueur_id_Joueur'=>$_SESSION["id_user"],'date_Achat_SC'=>'CURDATE()','montant_SC'=>$_POST["f_currency_get_survival_coins"],'montant_Euros'=>5*$_POST["f_currency_get_survival_coins"],'code_Validation'=>0));
			
			//Give the SC
			$nb = ExecSQL("UPDATE `T_Joueur` SET survivalCoin = survivalCoin + ".$_POST["f_currency_get_survival_coins"]." WHERE id_joueur=".$_SESSION['id_user']);
			if($nb != 1){
				$display_currency_get_fail = 1;
			}else{
				$display_currency_get_success = 1;
			}
			
		} else {
		
			//Form not submitted: display it
			$display_currency_get_form = 1;
			
		}
		
	} else {
	
		header("Location: /website/index");
		
	}

?>