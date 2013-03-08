<?php

	if ($row == 1)
	{
		echo 'avatar uploadé';
		header("Status: 303 See Other", false, 303);
		header('Location : /user/profil');
		exit();
	}
	else
	{
		PDO_Err();
		PDO_Qry();
		echo "erreur de mise à jour de l'avatar";
	}
	

?>