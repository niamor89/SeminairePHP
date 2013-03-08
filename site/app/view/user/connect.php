<?php

$row = account_exsit($_POST['f_login_pseudo'], md5($_POST['f_login_password']));

if (isset($row['pseudo_Joueur']))
{
$msg='YAOOUUU';
echo '<script>alert(\"$msg\");history.go(-1);</script>'; 
	session_start();
	$_SESSION['pseudo'] = $row['pseudo_Joueur'];
	echo render_action("website/index");
}
else
{
	$msg='Login ou mot de passe incorrect';
	echo '<script>alert(\"$msg\");history.go(-1);</script>'; 
}


?>