<?php
	if (isset($_POST['mail']))
		$nb = update_mail($_POST['mail']);
	
	if (isset($_POST['pass']))
		$nb = update_mdp($_POST['pass']);

	if ($nb == 1)
	{
		echo 'Profil mis à jour';
		header("Status: 303 See Other", false, 303);
		header('Location : /user/profil');
		exit();
	}
	else
	{
		PDO_Err();
		PDO_Qry();
		echo "erreur de mise à jour du profil";
	}
	

?>