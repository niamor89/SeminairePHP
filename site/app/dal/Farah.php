<?php
	function farah_register_function()
	{
		$rows = GetArray('SELECT pseudo_Joueur FROM t_joueur;');
		
		return $rows;
	}

	/*function player_farah_function()
	{
		InsertTable('t_joueur',array('id_joueur'=>1,'T_Etat_Joueur_id_Etat_Joueur'=>'0','pseudo_Joueur'=>'fafa', 'survivalCoin'=>300,'mdp'=>'banane','mail_Joueur'=>'farah@hotmail.fr','prenom_Joueur'=>'farah','nom_Joueur'=>'villard', 'date_De_Naiss'=>'20-Jan-1989','adresse_Joueur'=>'1 rue du mont','tel_Joueur'=>'0612131415'));
	}*/
?>