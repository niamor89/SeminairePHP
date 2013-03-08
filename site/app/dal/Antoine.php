<?php

function add_user($pseudo, $mdp, $prenom, $nom, $mail, $tel, $adresse, $ville, $birthdate)
{
	$nb = InsertTable('T_Joueur',array('pseudo_Joueur'=>$pseudo,'mdp'=>$mdp,'prenom_Joueur'=>$prenom,'nom_Joueur'=>$nom,'mail_Joueur'=>$mail,
	'tel_Joueur'=>$tel,'adresse_Joueur'=>$adresse.$ville,'date_De_Naiss'=>$birthdate));
	return $nb;
}


function account_exist($pseudo,$mdp)
{
	$row = GetRow('SELECT * FROM t_joueur WHERE pseudo_Joueur="'.$pseudo.'" AND mdp="'.$mdp.'";');
	return $row;
}

function update_avatar($file_path)
{
	$nb = UpdateTable('t_joueur',array('file_path'=>$file_path),'pseudo_Joueur="'.$_SESSION["pseudo"].'"');
	return $nb;
}

function get_info()
{
	$row = GetRow('SELECT * FROM t_joueur WHERE pseudo_Joueur="'.$_SESSION["pseudo"].'";');
	return $row;
}

function update_mail($mail)
{
	$nb = UpdateTable('t_joueur',array('mail_Joueur'=>$mail),'pseudo_Joueur="'.$_SESSION["pseudo"].'"');
	return $nb;
}

function update_mdp($mdp)
{
	$nb = UpdateTable('t_joueur',array('mdp'=>md5($mdp)),'pseudo_Joueur="'.$_SESSION["pseudo"].'"');
	return $nb;
}

?>