<?php 
	//Va vérifier depuis les PID de la BDD que les serveurs tournent
	
	$cmd=__DIR__.'\..\..\game_server\tasklist.exe /nh /fo csv ';
	$h=popen($cmd,"r");
	$read='';
	while (!feof($h))$read .= fread($h, 2096);
	$output = preg_split("/\n/", $read);
	
	$servers = GetArray('SELECT * FROM t_server;');
	
	$found=0;
	foreach($servers as $serv)
	{
		$alive=0;
		foreach($output as $line)
		{
			$l=preg_split("/,/",$line);
			if(count($l)>1 && substr($l[1],1,-1)==$serv['pid_server']) {
				//echo substr($l[1],1,-1).'==';
				$alive=1; 
				if(isset($_GET['alive']) && $_GET['alive']==$serv['id_partie'] && $found=1) { echo $alive; break; }
			}
		}
		if(!$alive) ExecSQL('DELETE FROM t_server WHERE pid_server='.$serv['pid_server'].';');
		
		//echo $serv['pid_server'].':'.$alive.'<br/>';
	}
	if(isset($_GET['alive']) && !$found) { echo $found; }
	
	pclose($h);
	
	