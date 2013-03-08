<?php 
	//Va vérifier depuis les PID de la BDD que les serveurs tournent
	
	$cmd=__DIR__.'\..\..\game_server\tasklist.exe /nh /fo csv ';
	$h=popen($cmd,"r");
	$read='';
	while (!feof($h))$read .= fread($h, 2096);
	$output = preg_split("/\n/", $read);
	
	$servers = GetArray('SELECT * FROM t_serveur;');
	
	$found=0;
	foreach($servers as $serv)
	{
		$alive=0;
		foreach($output as $line)
		{
			$l=preg_split("/,/",$line);
			if(count($l)>1 && substr($l[1],1,-1)==$serv['pid_Server']) {
				$alive=1; 
				break;
			}
		}
		if($found) pclose(popen(__DIR__.'\..\..\game_server\taskkill.exe /pid '.$serv['pid_Server'].' /f',"r"));
	}
	if(isset($_GET['alive']) && !$found) { echo $found; }
	
	pclose($h);
	
	