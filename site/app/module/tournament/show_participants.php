<?php

$conx = mysql_connect('localhost', 'root', 'root')
	or die('Could not connect to DB');
	mysql_select_db("SurvivalCamp") or die ("hello");

$tour_id=1; // To be replaced by value given

$check = mysql_query("SELECT j1,j2,j3,j4,j5 
						FROM  T_Equipe 
						WHERE id_Equipe IN (SELECT T_Equipe_id_Equipe 
											FROM T_Inscription 
											WHERE T_Tournois_id_Tournois='$tour_id')")
or die('could not get Team name');
?>