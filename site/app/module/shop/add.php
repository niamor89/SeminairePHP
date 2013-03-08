<?php
	
	$context["title"] = "Ajouter un buff";

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
	
	//Elements from the view to display:
	$display_shop_add_form = 0;
	$display_shop_add_success = 0;
	$display_shop_add_fail = 0;
	
	//Whoose what to do: display the for or parse it
	
	if($is_admin && $successful_login) {
	
		if(isset($_POST["f_shop_add_submit"])) {
		
			//Form submited
			
			/*	Insert code to add a new buff
			**	provided input:
			**		$_POST["f_shop_add_name"]
			**		$_POST["f_shop_add_price"]
			**	required output:
			**		$shop_add_success = 0 or 1
			*/
			
			$nb = InsertTable('T_Produit',array('nom_Produit'=>$_POST["f_shop_add_name"],'in_Game'=>'2','prix_Produit'=>$_POST["f_shop_add_price"]));
			
			//Assume it is a success
			$shop_add_success = $nb;
			
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
	
	} else {
	
		header("Location: /website/index");
		
	}

?>