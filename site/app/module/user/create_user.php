<?php
$context["title"] = "Création de compte";
$nb = add_user($_POST['pseudo'], 
			 md5($_POST['pass']), 
			(isset($_POST['prenom']))? $_POST['prenom'] : "", 
			(isset($_POST['nom']))? $_POST['nom'] : "", 
			 $_POST['mail'], 
			(isset($_POST['phone']))? $_POST['phone'] : "", 
			(isset($_POST['adress']))? $_POST['adress'] : "", 
			(isset($_POST['city']))? $_POST['city'] : "", 
			 $_POST['birthday']);
			


?>