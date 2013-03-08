<?php
$context["title"] = "Création de compte";
$nb = add_user($_POST['pseudo'], md5($_POST['pass']), $_POST['prenom'], $_POST['nom'], $_POST['mail'], 
			$_POST['phone'], 
			$_POST['adress'], 
			$_POST['city'], 
			$_POST['birthday']);

?>