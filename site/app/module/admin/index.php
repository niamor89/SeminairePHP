<?php
	if(count($_GET)>1) $context['no_render']=true;
	if(!isset($_SESSION["id_user"]) || !isAdmin()) {
		header("Status: 303 See Other", false, 303);
		header('Location : /website/index');
		exit();
	}
	
	
	if(isset($_GET['liste_j'])) {
		echo json_encode(GetArray('SELECT * FROM t_joueur'));
	}
	else if(isset($_GET['liste_c'])) {
		echo json_encode(GetArray('SELECT * FROM t_carte'));
	}
	else if(isset($_GET['liste_s'])) {
		echo json_encode(GetArray('SELECT * FROM t_serveur'));
	}
	else if(isset($_GET['liste_p'])) {
		echo json_encode(GetArray('SELECT * FROM t_produit'));
	}
	else if(isset($_GET['liste_sc'])) {
		echo json_encode(GetArray('select sc.id_achat_sc, sc.date_achat_sc, sc.montant_sc, sc.montant_euros, sc.code_validation, j.pseudo_joueur from t_achat_sc as sc, t_joueur as j where sc.t_joueur_id_joueur = j.id_joueur order by j.pseudo_joueur'));
	}
	else if(isset($_GET['liste_com'])) {
		echo json_encode(GetArray('select c.date_commande, j.pseudo_joueur, p.nom_produit from t_commande as c, t_joueur as j, t_produit as p where j.id_joueur = c.t_joueur_id_joueur and p.id_produit = c.t_produit_id_produit order by j.pseudo_joueur'));
	}