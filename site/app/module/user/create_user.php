<?php
$context["title"] = "Création de compte";
$nb = add_user($_POST['pseudo'], 
			 md5($_POST['pass']), 
			$_POST['prenom'], 
			$_POST['nom'], 
			 $_POST['mail'], 
			((!empty($_POST['phone']))? $_POST['phone'] : "0000000000"), 
			$_POST['adress'], 
			$_POST['city'], 
			 $_POST['birthday']);
			


?>