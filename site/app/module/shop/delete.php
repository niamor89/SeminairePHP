<?php
	
	$context["title"] = "Supprimer un buff";
	$display_shop_delete_success = 0;
	$display_shop_delete_fail = 0;
	
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
	
	if($successful_login == 1 && $is_admin == 1) {
				
		//Determine if we can delete an item
			
		if(isset($_GET["shop_delete_item_id"])) {
			
			/*	Insert code for deleteing an item
			**	provided input:
			**		$_GET["shop_delete_item_id"]
			**	output required:
			**		$shop_delete_success = 1;
			*/
			
			$shop_delete_success = ExecSQL('DELETE FROM T_Produit WHERE id_Produit='.$_GET["shop_delete_item_id"].';');
			
			if ($shop_delete_success == 1){
				$display_shop_delete_success = 1;
			}else{
				$display_shop_delete_fail = 1;
			}
			
		
		} else {
		
			$display_shop_delete_fail = 1;
		
		}
		
	} else {
	
		header("Location: /website/index");
		
	}

?>