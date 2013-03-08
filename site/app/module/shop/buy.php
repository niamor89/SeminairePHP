<?php
	
	$context["title"] = "Acheter un buff";
	$display_shop_buy_success = 0;
	$display_shop_buy_fail = 0;
	
	/*	Insert code for checking user authentication here.
	**	output required:
	**		$successful_login = 1
	*/
	$successful_login = check_if_connected();
	
	if($successful_login == 1) {
				
		//Determine if we can buy an item
			
		if(isset($_GET["shop_buy_item_id"])) {
			
			/*	Insert code for buying an item
			**	provided input:
			**		$_GET["shop_buy_item_id"]
			**	output required:
			**		$shop_buy_success = 1;
			*/
			
			//Get price
			$row = GetRow('SELECT prix_Produit FROM T_Produit WHERE id_Produit='.$_GET["shop_buy_item_id"].';');
			$price = $row["prix_Produit"];
			
			//Take the SCs from player
			ExecSQL('UPDATE T_Joueur SET survivalCoin = survivalCoin - '.$price.' WHERE id_Joueur = '.$_SESSION["id_user"].' ;');
			
			//Create a command history
			$shop_buy_success = InsertTable('T_Commande',array('T_Produit_id_Produit'=>$_GET["shop_buy_item_id"],'T_Joueur_id_Joueur'=>$_SESSION["id_user"],'date_Commande'=>'CURDATE()'));
						
			var_dump($shop_buy_success);			
			
			if ($shop_buy_success == 1){
				$display_shop_buy_success = 1;
			}else{
				$display_shop_buy_fail = 1;
			}
		
		} else {
		
			$display_shop_buy_fail = 1;
		
		}
		
	} else {
	
		header("Location: /website/index");
		
	}
?>