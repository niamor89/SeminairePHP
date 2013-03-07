<?php 
	//Va vérifier depuis les PID de la BDD que les serveurs tournent
	$servers = GetArray('SELECT * FROM t_server;');
	foreach($servers as $serv)
	{
		$cmd='';
		echo 'Checking : '.$serv['pid_server'].'<br/>';
		echo 'CMD : '.
			($cmd=__DIR__.'\..\..\game_server\tasklist.exe /nh /fo csv ')
			.'<br/>';
			
		$h=popen($cmd,"r");
		$read='';
		while (!feof($h))$read .= fread($h, 2096);
		
		//STOOCKER LES SERVEURS DANS UN TABLEAU (fait) ne parcourir les processus qu'ne fois !
		
		$output = preg_split("/\n/", $read);
		
		$found=false;
		foreach($output as $line) 
		{
			$l=preg_split("/,/",$line);
			if(count($l)>1 && substr($l[1],1,-1)==$serv['pid_server']) 
				{$found=true; break;}
		}
		if($found) echo 'foud';
		else echo 'not found';	
		pclose($h);
	}
