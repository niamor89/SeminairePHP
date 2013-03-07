<?php       
// DOC :  http://www.commentcamarche.net/faq/27489-pdo-une-autre-facon-d-acceder-a-vos-bases-de-donnees
/*
	EXEMPLES :
	- INSERT : $nb = InsertTable('t_carte',array('id_carte'=>1,'nom_Carte'=>'name','url_Carte'=>'url'));
	- UPDATE : $nb = UpdateTable('t_carte',array('nom_Carte'=>'NEW_NAME'),'id_carte=1');
	- DELETE : ExecSQL('DELETE FROM t_carte WHERE id_carte=5;');
	- SELECT Row : $row = GetRow('SELECT * FROM t_carte WHERE id_carte=1;'); foreach($row as $k=>$v) echo $k.'=>'.$v.'<br/>';
	- SELECT RowS : $rows = GetArray('SELECT * FROM t_carte;'); foreach($rows as $row) foreach($row as $k=>$v) echo $k.'=>'.$v.'<br/>';
	
	- PDO_Err() AFFICHE LES ERREURS
	- PDO_Qry() AFFICHE LES REQUETES
*/echo 'DAL';

// CREATION DE LA CONNEXION
$pdo=null;
$pdo_err = array();
$pdo_qry = array();

try {
	$pdo = new PDO('mysql:host=localhost;dbname=survivalcamp', 'root', ''); 
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec("SET CHARACTER SET utf8");     
}
catch(PDOException $e)
{
	$pdo_err[]=$e->getMessage();
}

// AFFICHAGE DES ERREURS
function PDO_Err() {
	global $pdo_err;
	echo '<h2>Errors :</h2><ul>';
	foreach ($pdo_err as $var) echo '<li>'.$var.'</li>';
	echo '</ul>';
}

// AFFICHAGE DES REQUETES
function PDO_Qry() {
	global $pdo_qry;
	echo '<h2>Query :</h2><ul>';
	foreach ($pdo_qry as $var) echo '<li>'.$var.'</li>';
	echo '</ul>';
}

// EXECUTER UNE REQUETE (retourne le nombre de lignes affectés ou -1 en cas d'erreur)
function ExecSQL($sql) {
	global $pdo;
	global $pdo_err;
	global $pdo_qry;
	$pdo_qry[]=$sql;
	
	try {
		$nb = $pdo->exec($sql); 
		return $nb;	 
	}
	catch(PDOException $e)
	{
		$pdo_err[]=$sql.'|==>'.$e->getMessage();
		return -1;
	}
}

// RECUPERE UN ENREGISTREMENT (retourne un tableau associatif, clé=>valeur, ou -1 en cas d'erreur)
function GetRow($sql) {
	global $pdo;
	global $pdo_err;
	global $pdo_qry;
	$pdo_qry[]=$sql;
	
	try {
		$req = $pdo->query($sql);    
		return $req->fetch();
	}
	catch(PDOException $e)
	{
		$pdo_err[]=$sql.'|==>'.$e->getMessage();
		return -1;
	}
}

// RECUPERE PLUSIEURS ENREGISTREMENTS (retourne un tableau des tableaux associatif, clé=>valeur, ou -1 en cas d'erreur)
function GetArray($sql) {
	global $pdo;
	global $pdo_err;
	global $pdo_qry;
	$pdo_qry[]=$sql;
	
	try {
		$req = $pdo->query($sql); 
		$ar = array();
		while($row = $req->fetch()) { 
			$ar[]=$row;
		}
		return $ar;
	}
	catch(PDOException $e)
	{
		$pdo_err[]=$sql.'|==>'.$e->getMessage();
		return -1;
	}
}

// INSERTION ($tables = string, $t=array($champs1=>$val1,$champs2=>$val2,...)
function InsertTable($table,$t)
{
	$sql = 'INSERT INTO `'.$table.'` (';
	$sql2 ='VALUES (';
	
	if(count($t>0))
	{
		foreach($t as $col=>$val)
		{
			$sql .= ''.$col.',';
			$sql2 .= '"'.$val.'",';
		}
		$sql=substr($sql,0,strlen($sql)-1);
		$sql2=substr($sql2,0,strlen($sql2)-1);
	}
	else
		return false;
		
	$sql .= ') '.$sql2.')';
    return ExecSQL($sql); 
}

// UPDATE ($tables = string, $t=array($champs1=>$val1,$champs2=>$val2,...), $condition = les conditions qui se colleront APRES le WHERE
function UpdateTable($table,$t,$condition) 
{
	$sql = 'UPDATE `'.$table.'` SET ';
	
	if(count($t>0))
	{
		foreach($t as $col=>$val)
		{
			$sql .= ''.$col.'='.'"'.$val.'",';
		}
		$sql=substr($sql,0,strlen($sql)-1);
	}
	else
		return false;
	
	$sql .= ' WHERE '.$condition;

    return ExecSQL($sql); 
}

include 'Antoine.php';
include 'RomainN.php';
include 'RomainT.php';
include 'Ousmane.php';
include 'Ruslan.php';
include 'Farah.php';