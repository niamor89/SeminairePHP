<?php

function add_user($pseudo, $mdp, $prenom, $nom, $mail, $tel, $adresse, $ville, $birthdate)
{
	$nb = InsertTable('T_Joueur',array('pseudo_Joueur'=>$pseudo,'mdp'=>$mdp,'prenom_Joueur'=>$prenom,'nom_Joueur'=>$nom,'mail_Joueur'=>$mail,
	'tel_Joueur'=>$tel,'adresse_Joueur'=>$adresse.$ville,'date_De_Naiss'=>$birthdate, 'T_Etat_Joueur_id_Etat_Joueur'=>1));
	return $nb;
}


function account_exist($pseudo,$mdp)
{
	$row = GetRow('SELECT * FROM t_joueur WHERE pseudo_Joueur="'.$pseudo.'" AND mdp="'.$mdp.'";');
	return $row;
}

?>