<?php

$conx = mysql_connect('localhost', 'root', 'root')
	or die('Could not connect to DB');
	mysql_select_db("SurvivalCamp") or die ("hello");

if(isset($_POST['leave']))
{
$tour_equipe_id=1; // To be replaced by value of the team that wants to qui via GET
$tour_id=1; // To be replaced by value of the tournamenet that the team wants to quit via GET


	$check = mysql_query("DELETE FROM T_Inscription WHERE T_Equipe_id_Equipe='$tour_equipe_id' AND T_Tournois_id_Tournois='$tour_id'")
		or die('could not get Team name');
	$left=1;
}
?>