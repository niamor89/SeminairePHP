<?php
$context["title"] = "Accueil";
$nb = add_user($_POST['pseudo'], $_POST['pass'], $_POST['prenom'], $_POST['nom'], $_POST['mail'], 
			$_POST['phone'], 
			$_POST['adress'], 
			$_POST['city'], 
			$_POST['birthday']);

?>